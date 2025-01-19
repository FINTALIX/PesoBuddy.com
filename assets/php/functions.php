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
?>