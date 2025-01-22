<?php

// Handles displaying financial data, including transactions, categories, and charts in the dashboard.
class FinanceDashboard
{
    private $userID;
    private $year;
    private $type;
    private $transactionYears = array();
    private $categoryTypes = array();
    private $chartLabels = array();
    private $chartData = array();

    // Initializes the class properties
    public function __construct($userID)
    {
        $this->userID = $userID;
        $this->year = isset($_GET['year']) ? $_GET['year'] : date("Y");
        $this->type = isset($_GET['type']) ? $_GET['type'] : 'income';

        $this->loadTransactionYears();
        $this->loadCategoryTypes();
        $this->loadChartData();
    }

    // Function to load transaction years
    private function loadTransactionYears()
    {
        $transactionYearQuery = "SELECT DISTINCT YEAR(transactionDate) AS transactionYear FROM transactions WHERE userID = $this->userID ORDER BY transactionYear";
        $transactionYearResult = executeQuery($transactionYearQuery);
        while ($transactionYearRow = mysqli_fetch_assoc($transactionYearResult)) {
            $this->transactionYears[] = $transactionYearRow['transactionYear'];
        }
    }

    // Function to load category types
    private function loadCategoryTypes()
    {
        $categoryTypeQuery = "SELECT DISTINCT defaultCategoryType FROM defaultcategories";
        $categoryTypeResult = executeQuery($categoryTypeQuery);
        while ($categoryTypeRow = mysqli_fetch_assoc($categoryTypeResult)) {
            $this->categoryTypes[] = $categoryTypeRow['defaultCategoryType'];
        }
    }

    // Get and process chart data
    private function loadChartData()
    {
        $yearlyReportQuery = "
            SELECT 
                MONTH(t.transactionDate) AS month,
                SUM(t.amount) AS totals
            FROM 
                transactions t
            LEFT JOIN 
                categories c ON t.categoryID = c.categoryID
            LEFT JOIN 
                defaultcategories dc ON t.defaultCategoryID = dc.defaultCategoryID  
            WHERE 
                t.userID = $this->userID
                AND YEAR(t.transactionDate) = $this->year
                AND (
                    (c.categoryType = '$this->type' AND t.categoryID IS NOT NULL) 
                    OR 
                    (dc.defaultCategoryType = '$this->type' AND t.defaultCategoryID IS NOT NULL)  
                )
            GROUP BY 
                MONTH(t.transactionDate)
            ORDER BY 
                month";
        $yearlyReportResult = executeQuery($yearlyReportQuery);

        // Initialize arrays for chart data
        $chartLabels = array();
        $chartData = array();

        while ($yearlyReportRow = mysqli_fetch_assoc($yearlyReportResult)) {
            $monthName = DateTime::createFromFormat('!m', $yearlyReportRow['month'])->format('F');
            array_push($chartLabels, $monthName); // Add month name to chartLabels array
            array_push($chartData, $yearlyReportRow['totals']); // Add totals to chartData array
        }

        // Get transaction years
        $this->chartLabels = $chartLabels;
        $this->chartData = $chartData;
    }

    // Function to display year dropdown
    public function displayYearDropdown()
    {
        $dropdownItems = '';

        if (!empty($this->transactionYears)) {
            foreach ($this->transactionYears as $year) {
                $dropdownItems .= '
                  <li>
                    <a class="dropdown-item" href="?year=' . $year . '&type=' . $this->type . '">' . $year . '</a>
                  </li>
                ';
            }
        } else {
            $dropdownItems = '
              <li><a class="dropdown-item">No transactions yet</a></li>
            ';
        }

        return '
          <div class="subheading">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              YEAR
            </button>
            <ul class="dropdown-menu">
              ' . $dropdownItems . '
            </ul>
          </div>
        ';
    }

    // Function to display category type dropdown
    public function displayCategoryTypeDropdown()
    {
        $dropdownItems = '';

        if (!empty($this->categoryTypes)) {
            foreach ($this->categoryTypes as $type) {
                $dropdownItems .= '
                  <li>
                    <a class="dropdown-item" href="?year=' . $this->year . '&type=' . $type . '">' . $type . '</a>
                  </li>
                ';
            }
        } else {
            $dropdownItems = '
              <li><a class="dropdown-item">No category found</a></li>
            ';
        }

        return '
          <div class="subheading">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              CATEGORY TYPE
            </button>
            <ul class="dropdown-menu">
              ' . $dropdownItems . '
            </ul>
          </div>
        ';
    }

    // Function to get chart data
    public function getChartData()
    {
        return $this->chartData;
    }

    // Function to get chart labels
    public function getChartLabels()
    {
        return $this->chartLabels;
    }
}

class TransactionsHistory
{
    public $transactionsQuery;
    public $transactionID;
    public $transactionType;
    public $transactionCategory;
    public $transactionAmount;
    public $transactionDate;
    public $transactionDescription;

    public function __construct($transactionsQuery)
    {
        $this->transactionsQuery = $transactionsQuery;
    }

    public function filterTransactions($transactionsQuery)
    {
        if (isset($_GET['transactionType'])) {
            $type = $_GET['transactionType'];
            $this->transactionType = $type;
            $transactionsQuery .= " AND (categories.categoryType LIKE '%$type%' OR defaultcategories.defaultCategoryType LIKE '%$type%')";
        }

        if (isset($_GET['transactionCategory'])) {
            $category = $_GET['transactionCategory'];
            $this->transactionCategory = $category;
            $transactionsQuery .= " AND (categories.categoryName LIKE '%$category%' OR defaultcategories.defaultCategoryName LIKE '%$category%')";
        }

        return $transactionsQuery;
    }

    public function setRowVariables($transactionRow)
    {
        // Set Type
        $this->transactionType = ($transactionRow['defaultCategoryType']) ? $transactionRow['defaultCategoryType'] : $transactionRow['categoryType'];
        $this->transactionType = ucfirst($this->transactionType);

        // Set Category
        $this->transactionCategory = ($transactionRow['defaultCategoryName']) ? $transactionRow['defaultCategoryName'] : $transactionRow['categoryName'];

        // Set other attributes
        $this->transactionID = $transactionRow['transactionID'];
        $this->transactionDate = $transactionRow['transactionDate'];
        $this->transactionDescription = $transactionRow['description'];
        $this->transactionAmount = $transactionRow['amount'];
    }

    public function createRow($transactionRow, $transactionNo)
    {
        $this->setRowVariables($transactionRow);

        return
            '
            <tr>
                <td scope="row" class="text-center">' . $transactionNo . '</td>
                <td>'.$this->transactionType.'</td>
                <td>'.$this->transactionCategory.'</td>
                <td>'.number_format($this->transactionAmount, 2).'</td>
                <td>'.date('F j, Y', strtotime($this->transactionDate)).'</td>
                <td>'.$this->transactionDescription.'</td>

                <td>
                    <div class="dropdown dropstart">
                        <button class="btn options-btn p-1" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <!-- Edit Button -->
                            <li>
                                <a class="dropdown-item option-dropdown" data-bs-toggle="modal"
                                    data-bs-target="#editTransaction'.$this->transactionID.'"
                                    style="text-decoration: none;">
                                    <i class="bi bi-pencil-square px-1"></i> Edit
                                </a>
                            </li>

                            <!-- Delete Button -->
                            <li>
                                <a class="dropdown-item option-dropdown" data-bs-toggle="modal"
                                    data-bs-target="#deleteTransaction'.$this->transactionID.'"
                                    style="color: red; text-decoration: none;">
                                    <i class="bi bi-trash3 px-1"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        ';
    }

    public function editTransaction()
    {
        if(isset($_POST['btnEditTransaction'])) {
            // Set Category
            $categoryInput = explode("_", $_POST['transactionCategory']);

            $categoryKind = $categoryInput[0]; 
            $categoryID = $categoryInput[1];

            $defaultCategoryID = null;
            $customCategoryID = null;

            if ($categoryKind == 'default') {
                $defaultCategoryID = $categoryID;
                $categoryID = null;
            } elseif ($categoryKind == 'custom') {
                $customCategoryID = $categoryID;
                $defaultCategoryID = null;
            }

            // Set Other Values 
            $transactionID = $_POST['transactionID'];
            $date = $_POST['transactionDate'];
            $description = htmlspecialchars($_POST['transactionDescription']);
            $amount = $_POST['transactionAmount'];

            $editTransactionQuery = "UPDATE transactions SET categoryID = '$customCategoryID', amount = '$amount', transactionDate = '$date', description = '$description', defaultCategoryID = '$defaultCategoryID' WHERE transactionID = '$transactionID'";

            return executeQuery($editTransactionQuery);
        }
    }

    public function deleteTransaction()
    {
        if(isset($_POST['btnDeleteTransaction'])) {
            $transactionID = $_POST['transactionID'];

            $deleteTransactionQuery = "DELETE FROM transactions WHERE transactionID = '$transactionID' AND userID = '{$_SESSION['userID']}'";

            return executeQuery($deleteTransactionQuery);
        }
    }
}


class BiggestTransaction
{
    public $userID;
    public $categoryName;
    public $categoryType;
    public $maxTransactionAmount;

    public function __construct($userID)
    {
        $this->userID = $userID;
        $this->getBiggestTransaction();
    }

    public function getBiggestTransaction()
    {
        $maxTransactionAmountQuery = "
        SELECT 
            transactions.amount AS maxTransactionAmount,
            COALESCE(categories.categoryType, defaultcategories.defaultCategoryType) AS categoryType,
            COALESCE(categories.categoryName, defaultcategories.defaultCategoryName) AS categoryName
        FROM 
            transactions 
        LEFT JOIN 
            categories ON transactions.categoryID = categories.categoryID 
        LEFT JOIN 
            defaultcategories ON transactions.defaultCategoryID = defaultcategories.defaultCategoryID 
        WHERE 
            transactions.amount = (SELECT MAX(amount) FROM transactions WHERE userID = $this->userID)  
            AND transactions.userID = $this->userID
        ORDER BY 
            transactions.transactionDate DESC
        LIMIT 1";

        $maxTransactionAmountResult = executeQuery($maxTransactionAmountQuery);

        if (mysqli_num_rows($maxTransactionAmountResult) > 0) {
            $maxTransactionAmountRow = mysqli_fetch_assoc($maxTransactionAmountResult);

            $this->maxTransactionAmount = $maxTransactionAmountRow['maxTransactionAmount'];
            $this->categoryName = $maxTransactionAmountRow['categoryName'];
            $this->categoryType = $maxTransactionAmountRow['categoryType'];
        }
    }

    public function displayTransactionCard()
    {
        return '
        <div class="col-12 col-lg-4 px-lg-5 py-4">
                <div class="card stat-card rounded-5">
                    <div class="d-flex flex-column align-items-end">
                        <div class="subheading pt-4 pb-4 pe-3 text-end">
                            <b>YOUR <span style="color: #1A7431;">BIGGEST TRANSACTIONS</span>, YET!</b>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="heading pt-3" style="text-transform: capitalize"> ' . $this->categoryName . '</p>
                        <p class="heading pb-3">₱ ' . number_format($this->maxTransactionAmount, 2, ".", ",") . '</p>
                        <p class="subheading ps-3 text-start" style="text-transform: uppercase"> ' . $this->categoryType . '</p>
                    </div>
                </div>
            </div>';
    }
}

?>