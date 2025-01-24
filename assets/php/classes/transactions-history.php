<?php
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
                <td>' . $this->transactionType . '</td>
                <td>' . $this->transactionCategory . '</td>
                <td>' . number_format($this->transactionAmount, 2) . '</td>
                <td>' . date('F j, Y', strtotime($this->transactionDate)) . '</td>
                <td>' . $this->transactionDescription . '</td>

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
                                    data-bs-target="#editTransaction' . $this->transactionID . '"
                                    style="text-decoration: none;">
                                    <i class="bi bi-pencil-square px-1"></i> Edit
                                </a>
                            </li>

                            <!-- Delete Button -->
                            <li>
                                <a class="dropdown-item option-dropdown" data-bs-toggle="modal"
                                    data-bs-target="#deleteTransaction' . $this->transactionID . '"
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
        if (isset($_POST['btnEditTransaction'])) {
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
        if (isset($_POST['btnDeleteTransaction'])) {
            $transactionID = $_POST['transactionID'];

            $deleteTransactionQuery = "DELETE FROM transactions WHERE transactionID = '$transactionID' AND userID = '{$_SESSION['userID']}'";

            return executeQuery($deleteTransactionQuery);
        }
    }
}
?>