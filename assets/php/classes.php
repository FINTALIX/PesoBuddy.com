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

class TransactionsHistory {
    public $transactionsQuery;
    public $transactionType;
    public $transactionCategory;
    public $transactionAmount;
    public $transactionDate;
    public $transactionDescription;

    public function __construct($transactionsQuery){
        $this->transactionsQuery = $transactionsQuery;
    }

    public function filterTransactions($transactionsQuery) {
        if(isset($_GET['transactionType'])) {
            $type = $_GET['transactionType'];
            $this->transactionType = $type;
            $transactionsQuery .= " AND (categories.categoryType LIKE '%$type%' OR defaultcategories.defaultCategoryType LIKE '%$type%')";
        }
        
        if(isset($_GET['transactionCategory'])) {
            $category = $_GET['transactionCategory'];
            $this->transactionCategory = $category;
            $transactionsQuery .= " AND (categories.categoryName LIKE '%$category%' OR defaultcategories.defaultCategoryName LIKE '%$category%')";
        }

        return $transactionsQuery;
    }

    public function setRowVariables($transactionRow) {
        // Set Type
        $this->transactionType = ($transactionRow['defaultCategoryType']) ? $transactionRow['defaultCategoryType'] : $transactionRow['categoryType'];
        $this->transactionType = ucfirst($this->transactionType);

        // Set Category
        $this->transactionCategory = ($transactionRow['defaultCategoryName']) ? $transactionRow['defaultCategoryName'] : $transactionRow['categoryName'];
        
        // Format Amount and Date
        $this->transactionAmount = number_format($transactionRow['amount'], 2);
        $this->transactionDate = date('F j, Y', strtotime($transactionRow['transactionDate']));

        $this->transactionDescription = $transactionRow['description'];
    }

    public function createRow($transactionRow, $transactionNo) {
        $this->setRowVariables($transactionRow);

        return
        '
            <tr>
                <td scope="row" class="text-center">'.$transactionNo.'</td>
                <td>'.$this->transactionType.'</td>
                <td>'.$this->transactionCategory.'</td>
                <td>'.$this->transactionAmount.'</td>
                <td>'.$this->transactionDate.'</td>
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
                                    data-bs-target="#editTransaction"
                                    style="text-decoration: none;">
                                    <i class="bi bi-pencil-square px-1"></i> Edit
                                </a>
                            </li>

                            <!-- Delete Button -->
                            <li>
                                <a class="dropdown-item option-dropdown" data-bs-toggle="modal"
                                    data-bs-target="#deleteTransaction"
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
}

?>