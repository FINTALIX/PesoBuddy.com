<?php
// Query for getting transaction history
$transactionsQuery = "SELECT * FROM transactions 
LEFT JOIN categories ON transactions.categoryID = categories.categoryID 
LEFT JOIN defaultcategories ON transactions.defaultCategoryID = defaultcategories.defaultCategoryID 
WHERE transactions.userID = '$userID'";

$transactionHistory = new TransactionsHistory($transactionsQuery);

// Filter transactions
$transactionsQuery = $transactionHistory->filterTransactions($transactionsQuery);
$transactionsQuery .= "ORDER BY transactions.transactionDate";

// Queries for add transaction dropdowns
$transactionTypeQuery = "SELECT DISTINCT(defaultCategoryType) FROM `defaultCategories` ORDER BY defaultCategoryType ASC";
$transactionsTypeResults = executeQuery($transactionTypeQuery);

$defaultCategoriesQuery = "SELECT * FROM defaultCategories ORDER BY defaultCategoryName ASC";
$defaultCategoriesResults = executeQuery($defaultCategoriesQuery);

$categoriesQuery = "SELECT * FROM categories WHERE userID = $userID ORDER BY categoryName ASC";
$categoriesResults = executeQuery($categoriesQuery);

// Add Transactions
if (isset($_POST['btnAddTransaction'])) {
    $userID = $_SESSION['userID'];
    $amount = $_POST['amount'];
    $transactionDate = $_POST['date'];
    $description = htmlspecialchars($_POST['descriptionMesssage']);

    $categoryInput = explode("_", $_POST['categoryName']);

    $categoryKind = $categoryInput[0];
    $categoryID = $categoryInput[1];

    // Getting ID's From Category and Default Category
    if ($categoryKind == 'default') {
        $defaultCategoryID = $categoryID;
        $categoryID = null;
    } elseif ($categoryKind == 'custom') {
        $customCategoryID = $categoryID;
        $defaultCategoryID = null;
    }

    //Inserting To Database
    $insertTransactionQuery = "INSERT INTO transactions (userID, categoryID, amount, transactionDate, description, defaultCategoryID) VALUES ('$userID', '$customCategoryID', '$amount', '$transactionDate', '$description', '$defaultCategoryID') ";
    executeQuery($insertTransactionQuery);

    //To prevent resubmission
    $_SESSION['transaction_added'] = true;
    header("Location: " . $_SERVER['PHP_SELF'] . "#transaction-history");
    exit();
}
unset($_SESSION['transaction_added']);

// Delete Transaction
$transactionHistory->deleteTransaction();

// Edit Transaction
$transactionHistory->editTransaction();

// Display Transactions
$transactionsResult = executeQuery($transactionsQuery);
?>