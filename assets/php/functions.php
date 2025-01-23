<?php
function adminAuth()
{
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

function userAuth()
{
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

function computeAnnualIncome($id, $year)
{
    $totalIncomeQuery = "SELECT SUM(amount) AS totalIncome FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'income' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'income'));";

    $annualIncome = executeQuery($totalIncomeQuery);

    if (mysqli_num_rows($annualIncome) > 0) {
        while ($annualIncomeRow = mysqli_fetch_assoc($annualIncome)) {
            return $annualIncomeRow['totalIncome'];
        }
    }
}

function computeAnnualSavings($id, $year)
{
    $totalSavingsQuery = "SELECT SUM(amount) AS totalSavings FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'savings' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'savings'));";

    $annualSavings = executeQuery($totalSavingsQuery);

    if (mysqli_num_rows($annualSavings) > 0) {
        while ($annualSavingsRow = mysqli_fetch_assoc($annualSavings)) {
            return $annualSavingsRow['totalSavings'];
        }
    }
}

function computeAnnualExpense($id, $year)
{
    $totalExpenseQuery = "SELECT SUM(amount) AS totalExpense FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'expense' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'expense'));";

    $annualExpense = executeQuery($totalExpenseQuery);

    if (mysqli_num_rows($annualExpense) > 0) {
        while ($annualExpenseRow = mysqli_fetch_assoc($annualExpense)) {
            return $annualExpenseRow['totalExpense'];
        }
    }
}

function computeRemainingBalance($annualTotalIncome, $annualTotalSavings, $annualTotalExpense)
{
    $annualRemainingBalance = (($annualTotalIncome + $annualTotalSavings) - $annualTotalExpense);
    return $annualRemainingBalance;
}

function computeMonthlyIncome($id, $year, $month)
{
    $transactionMonth = DateTime::createFromFormat('F', ucfirst(strtolower($month)))->format('m');
    $totalMonthlyIncomeQuery = "SELECT SUM(amount) AS totalMonthlyIncome FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year-$transactionMonth%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'income' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'income'));";

    $monthlyIncome = executeQuery($totalMonthlyIncomeQuery);

    if (mysqli_num_rows($monthlyIncome) > 0) {
        while ($monthlyIncomeRow = mysqli_fetch_assoc($monthlyIncome)) {
            return $monthlyIncomeRow['totalMonthlyIncome'];
        }
    }
}

function computeMonthlySavings($id, $year, $month)
{
    $transactionMonth = DateTime::createFromFormat('F', ucfirst(strtolower($month)))->format('m');
    $totalMonthlySavingsQuery = "SELECT SUM(amount) AS totalMonthlySavings FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year-$transactionMonth%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'savings' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'savings'));";

    $monthlySavings = executeQuery($totalMonthlySavingsQuery);

    if (mysqli_num_rows($monthlySavings) > 0) {
        while ($monthlySavingsRow = mysqli_fetch_assoc($monthlySavings)) {
            return $monthlySavingsRow['totalMonthlySavings'];
        }
    }
}

function computeMonthlyExpense($id, $year, $month)
{
    $transactionMonth = DateTime::createFromFormat('F', ucfirst(strtolower($month)))->format('m');
    $totalMonthlyExpenseQuery = "SELECT SUM(amount) AS totalMonthlyExpense FROM `transactions` 
    WHERE userID = $id AND 
    transactionDate LIKE '$year-$transactionMonth%' AND 
    (categoryID IN (SELECT categoryID FROM categories WHERE categoryType = 'expense' and userID = $id) OR 
    defaultCategoryID IN (SELECT defaultCategoryID FROM defaultcategories WHERE defaultCategoryType = 'expense'));";

    $monthlyExpense = executeQuery($totalMonthlyExpenseQuery);

    if (mysqli_num_rows($monthlyExpense) > 0) {
        while ($monthlyExpenseRow = mysqli_fetch_assoc($monthlyExpense)) {
            return $monthlyExpenseRow['totalMonthlyExpense'];
        }
    }
}

function getDefaultYear($userID)
{

    $defaultYearQuery = "SELECT MAX(YEAR(transactionDate)) AS defaultYear FROM `transactions` WHERE userID = $userID";
    $defaultYearResult = executeQuery($defaultYearQuery);

    if (mysqli_num_rows($defaultYearResult) > 0) {
        while ($defaultYearRow = mysqli_fetch_assoc($defaultYearResult)) {
            if($defaultYearRow['defaultYear'] !=  NULL){
                return $defaultYearRow['defaultYear'];
            }
        }
    }

    return date("Y");
}

function getDefaultMonth($userID, $defaultYear)
{

    $defaultMonthQuery = "SELECT MIN(MONTH(transactionDate)) AS defaultMonth FROM `transactions` WHERE userID = $userID AND YEAR(transactionDate) = $defaultYear";
    $defaultMonthResult = executeQuery($defaultMonthQuery);

    if (mysqli_num_rows($defaultMonthResult) > 0) {
        while ($defaultMonthRow = mysqli_fetch_assoc($defaultMonthResult)) {
            $defaultMonth = strtoupper(date("F", mktime(0, 0, 0, $defaultMonthRow['defaultMonth'], 1))); // Get first month name
            return $defaultMonth;
        }
    }
}
function listMonthlyBreakdown($userID, $year, $month, $type)
{
    $colors = array('#FF6384', '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB', '#9966FF', '#C9CBCE', '#00FFFF', '#FF69B4', '#008000', '#FFA500', '#87CEEB');

    $transactionMonth = DateTime::createFromFormat('F', ucfirst(strtolower($month)))->format('m');
    $listCategoryBreakdown = array();

    $categoryTotalQuery = "SELECT c.categoryName, SUM(t.amount) AS totalAmount FROM transactions AS t LEFT JOIN categories AS c ON c.userID = t.userID AND c.categoryID = t.categoryID WHERE t.userID = $userID AND c.categoryType = '$type' AND t.transactionDate LIKE '$year-$transactionMonth%' GROUP BY c.categoryName;";
    $defaultCategoryTotalQuery = "SELECT d.defaultCategoryName, SUM(t.amount) AS totalAmount FROM transactions AS t LEFT JOIN defaultcategories AS d ON d.defaultCategoryID = t.defaultCategoryID WHERE t.userID = $userID AND d.defaultCategoryType = '$type' AND t.transactionDate LIKE '$year-$transactionMonth%' GROUP BY d.defaultCategoryName;";

    $categoryTotal = executeQuery($categoryTotalQuery);
    $defaultCategoryTotal = executeQuery($defaultCategoryTotalQuery);

    if (mysqli_num_rows($categoryTotal) > 0) {
        while ($categoryTotalRow = mysqli_fetch_assoc($categoryTotal)) {
            $category = array($categoryTotalRow['categoryName'], $categoryTotalRow['totalAmount']);
            array_push($listCategoryBreakdown, $category);
        }
    }

    if (mysqli_num_rows($defaultCategoryTotal) > 0) {
        while ($defaultCategoryTotalRow = mysqli_fetch_assoc($defaultCategoryTotal)) {
            $defaultCategory = array($defaultCategoryTotalRow['defaultCategoryName'], $defaultCategoryTotalRow['totalAmount']);
            array_push($listCategoryBreakdown, $defaultCategory);
        }
    }

    if (!empty($listCategoryBreakdown)) {
        $colorIndex = 0;
        foreach ($listCategoryBreakdown as $categoryBreakdown) {
            echo '<li class="d-flex justify-content-between align-items-center">
                <span><span class="color-box" style="background-color: ' . $colors[$colorIndex] . ';"></span>' . $categoryBreakdown[0] . '</span>
                <span>₱ ' . $categoryBreakdown[1] . '.00</span>
            </li>';

            if (count($listCategoryBreakdown) < count($colors))
                $colorIndex += 1;
        }
    }else{
        echo '<li class="d-flex justify-content-center align-items-center">
                <h4 class="text-black text-center mt-5 paragraph">No data available for display.</h4?>
            </li>';
    }

}

function loadChart($userID, $year, $month, $type)
{
    $colors = array('#FF6384', '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB', '#9966FF', '#C9CBCE', '#00FFFF', '#FF69B4', '#008000', '#FFA500', '#87CEEB');
    $transactionMonth = DateTime::createFromFormat('F', ucfirst(strtolower($month)))->format('m');
    $listCategory = array();
    $listPercentage = array();
    $total = '';

    if ($type == 'income') {
        $total = computeMonthlyIncome($userID, $year, $month);
    } else if ($type == 'savings') {
        $total = computeMonthlySavings($userID, $year, $month);
    } else {
        $total = computeMonthlyExpense($userID, $year, $month);
    }

    $categoryTotalQuery = "SELECT c.categoryName, SUM(t.amount) AS totalAmount FROM transactions AS t LEFT JOIN categories AS c ON c.userID = t.userID AND c.categoryID = t.categoryID WHERE t.userID = $userID AND c.categoryType = '$type' AND t.transactionDate LIKE '$year-$transactionMonth%' GROUP BY c.categoryName;";
    $defaultCategoryTotalQuery = "SELECT d.defaultCategoryName, SUM(t.amount) AS totalAmount FROM transactions AS t LEFT JOIN defaultcategories AS d ON d.defaultCategoryID = t.defaultCategoryID WHERE t.userID = $userID AND d.defaultCategoryType = '$type' AND t.transactionDate LIKE '$year-$transactionMonth%' GROUP BY d.defaultCategoryName;";

    $categoryTotal = executeQuery($categoryTotalQuery);
    $defaultCategoryTotal = executeQuery($defaultCategoryTotalQuery);

    if (mysqli_num_rows($categoryTotal) > 0) {
        while ($categoryTotalRow = mysqli_fetch_assoc($categoryTotal)) {
            $categoryPercentage = $categoryTotalRow['totalAmount'] / $total * 100;
            array_push($listCategory, $categoryTotalRow['categoryName']);
            array_push($listPercentage, $categoryPercentage);
        }
    }

    if (mysqli_num_rows($defaultCategoryTotal) > 0) {
        while ($defaultCategoryTotalRow = mysqli_fetch_assoc($defaultCategoryTotal)) {
            $defaultCategoryPercentage = ($defaultCategoryTotalRow['totalAmount'] / $total) * 100;
            array_push($listCategory, $defaultCategoryTotalRow['defaultCategoryName']);
            array_push($listPercentage, $defaultCategoryPercentage);
        }
    }

    $labels = $total != 0 ? implode("','", $listCategory) : "No Category Available";
    $data = $total != 0 ? implode("','", $listPercentage) : "100";
    $color = $total != 0 ? implode("','", $colors) : "#CECECE";

    return "const ctx2 = document.getElementById('doughnutChart').getContext('2d');
        const doughnutChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['" . $labels . "'],
                datasets: [{
                    data: ['" . $data . "'],
                    backgroundColor: ['" . $color . "']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });";

}

function queryTransactionTypes() {
    $transactionTypeQuery = "SELECT DISTINCT(defaultCategoryType) FROM `defaultCategories` ORDER BY defaultCategoryType ASC";
    $transactionsTypeResults = executeQuery($transactionTypeQuery);

    return $transactionsTypeResults;
}

function queryDefaultCategories() {
    $defaultCategoriesQuery = "SELECT * FROM defaultCategories ORDER BY defaultCategoryName ASC";
    $defaultCategoriesResults = executeQuery($defaultCategoriesQuery);

    return $defaultCategoriesResults;
}

function queryCategories() {
    $categoriesQuery = "SELECT * FROM categories WHERE userID = {$_SESSION['userID']} ORDER BY categoryName ASC";
    $categoriesResults = executeQuery($categoriesQuery);

    return $categoriesResults;
}

function deleteTracker($userID){
    if(isset($_POST['btnDeleteTracker'])){
        $month = DateTime::createFromFormat('F', ucfirst(strtolower($_POST['month'])))->format('m');
        $year = $_POST['year'];

        $deleteTrackerQuery = "DELETE FROM transactions WHERE userID = $userID AND transactionDate LIKE '%$year-$month%';";
        executeQuery($deleteTrackerQuery);
    }
}
?>