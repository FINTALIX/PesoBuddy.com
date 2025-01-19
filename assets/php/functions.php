<?php
function adminAuth(){
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['role'] != 'admin') {
            header("Location: ../home.php");
            exit();
        }
    } else {
        header("Location: .././");
        exit();
    }
}

function userAuth(){
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['role'] != 'user') {
            header("Location: admin/");
            exit();
        }
    } else {
        header("Location: ./");
        exit();
    }
}

function computeAnnualIncome($id, $year){
    $totalIncomeQuery = "SELECT SUM(amount) AS totalIncome FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'income' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'income'));";

    $annualIncome = executeQuery($totalIncomeQuery);

    if (mysqli_num_rows($annualIncome) > 0){
        while($annualIncomeRow = mysqli_fetch_assoc($annualIncome)){
            return $annualIncomeRow['totalIncome'];
        }
    }
}

function computeAnnualSavings($id, $year){
    $totalSavingsQuery = "SELECT SUM(amount) AS totalSavings FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'savings' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'savings'));";

    $annualSavings = executeQuery($totalSavingsQuery);

    if (mysqli_num_rows($annualSavings) > 0){
        while($annualSavingsRow = mysqli_fetch_assoc($annualSavings)){
            return $annualSavingsRow['totalSavings'];
        }
    }
}

function computeAnnualExpense($id, $year){
    $totalExpenseQuery = "SELECT SUM(amount) AS totalExpense FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'expense' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'expense'));";

    $annualExpense = executeQuery($totalExpenseQuery);

    if (mysqli_num_rows($annualExpense) > 0){
        while($annualExpenseRow = mysqli_fetch_assoc($annualExpense)){
            return $annualExpenseRow['totalExpense'];
        }
    }
}

function computeRemainingBalance($annualTotalIncome, $annualTotalSavings, $annualTotalExpense){
    $annualRemainingBalance = (($annualTotalIncome + $annualTotalSavings) - $annualTotalExpense);
    return $annualRemainingBalance;
}

function filterTransactions($transactionsQuery) {
    if (isset($_GET['transactionType'])) {
        $type = $_GET['transactionType'];
        $transactionsQuery .= " AND (categories.categoryType LIKE '%$type%' OR defaultcategories.defaultCategoryType LIKE '%$type%')";
    }

    if (isset($_GET['transactionCategory'])) {
        $category = $_GET['transactionCategory'];
        $transactionsQuery .= " AND (categories.categoryName LIKE '%$category%' OR defaultcategories.defaultCategoryName LIKE '%$category%')";
    }

    return $transactionsQuery;
}

function createTransactionRow($transactionRow, $transactionNo) {
    // Format Data
    $transactionType = ($transactionRow['defaultCategoryType']) ? $transactionRow['defaultCategoryType'] : $transactionRow['categoryType'];
    $transactionType = ucfirst($transactionType);

    $transactionCategory = ($transactionRow['defaultCategoryName']) ? $transactionRow['defaultCategoryName'] : $transactionRow['categoryName'];

    $transactionAmount = number_format($transactionRow['amount'], 2, ".", ",");
    $transactionDate = date('F j, Y', strtotime($transactionRow['transactionDate']));
    $transactionDescription = $transactionRow['description'];

    // Create Row
    return 
    '
        <tr>
            <td scope="row" class="text-center">'.$transactionNo.'</td>
            <td>'.$transactionType.'</td>
            <td>'.$transactionCategory.'</td>
            <td>₱ '.$transactionAmount.'</td>
            <td>'.$transactionDate.'</td>
            <td>'.$transactionDescription.'</td>

            <td>
                <div class="dropdown dropstart">
                    <button class="btn options-btn p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item option-dropdown" data-bs-toggle="modal" data-bs-target="#editTransaction">
                                <i class="bi bi-pencil-square px-1"></i> Edit
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item option-dropdown" data-bs-toggle="modal" data-bs-target="#deleteTransaction">
                                <i class="bi bi-trash3 px-1"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    ';
}
?>