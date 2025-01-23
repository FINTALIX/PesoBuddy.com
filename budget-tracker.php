<?php
$userID = $_SESSION['userID'];
$defaultYear = getDefaultYear($userID);
$defaultMonth = getDefaultMonth($userID, $defaultYear);

$_SESSION['budgetTrackerYear'] = isset($_POST['budgetTrackerYear']) ? $_POST['budgetTrackerYear'] : $defaultYear;
$_SESSION['budgetTrackerMonth'] = isset($_POST['budgetTrackerMonth']) ? $_POST['budgetTrackerMonth'] : $defaultMonth;
$_SESSION['transactionType'] = isset($_POST['transactionType']) ? $_POST['transactionType'] : "income";

$budgetTrackerYear = $_SESSION['budgetTrackerYear'];
$budgetTrackerMonth = $_SESSION['budgetTrackerMonth'];
$transactionType = $_SESSION['transactionType'];

function loadTransactionYears($userID)
{
    $getYearsQuery = "SELECT DISTINCT YEAR(transactionDate) AS transactionYears FROM `transactions` WHERE userID = $userID;";
    $yearsResult = executeQuery($getYearsQuery);

    if (mysqli_num_rows($yearsResult) > 0) {
        while ($yearsRow = mysqli_fetch_assoc($yearsResult)) {
            echo '
            <li>
                <form method="POST" action="#budget-tracker">
                    <input type="hidden" name="budgetTrackerYear" value="' . $yearsRow['transactionYears'] . '">
                    <button type="submit" class="dropdown-item" style="border: none; background: none;">' . $yearsRow['transactionYears'] . '</button>
                </form>
            </li>';
        }
    }else{
        echo '<button class="dropdown-item" style="border: none; background: none;" disabled>NO BUDGET TRACKER YET</button>';
    }
}

function loadTransactionMonths($userID, $budgetTrackerYear)
{
    $getMonthsQuery = "SELECT DISTINCT MONTH(transactionDate) AS transactionMonths FROM `transactions` WHERE userID = $userID AND YEAR(transactionDate) = $budgetTrackerYear ORDER BY MONTH(transactionDate) ASC;";
    $monthsResult = executeQuery($getMonthsQuery);
    $btnMonths = '';
    if (mysqli_num_rows($monthsResult) > 0) {
        while ($monthsRow = mysqli_fetch_assoc($monthsResult)) {
            $month = strtoupper(date("F", mktime(0, 0, 0, $monthsRow['transactionMonths'], 1)));
            echo '<div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                <form method="POST" action="#budget-tracker">
                <input type="hidden" name="budgetTrackerYear" value="' . $budgetTrackerYear . '">
                <input type="hidden" name="budgetTrackerMonth" value="' . $month . '">
                <button type="submit"
                    class="btn btn-primary w-100 p-3">' . $month . '</button>
                </form>
            </div>';

        }
    } else {
        echo '<div class="subheading text-center">No Monthly Tracker. Choose Another Year or Add a Transaction</div>';
    }
}
?>

<div class="container" id="budget-tracker">
    <div class="row align-items-center mb-4 px-2">
        <div class="col-12">
            <hr>
            <div class="row justify-content-md-between align-items-center">

                <div class="col-12 col-md-auto d-flex flex-row align-items-center mb-2">
                    <div class="me-3" style="width: 15px; background-color: var(--darkColor); height: 40px;"></div>
                    <span class="heading">BUDGET TRACKER</span>
                </div>

                <div class="col-12 col-md-auto d-flex mb-2">
                    <div class="subheading">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            YEAR
                        </button>
                        <ul class="dropdown-menu dropdown-menu-sm-end">
                            <?php loadTransactionYears($userID); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Monthly Buttons -->
<div class="container">
    <div class="row px-2">
        <div class="col-12 pt-3">
            <div class="row g-3 pb-3 justify-content-center">
                <?php loadTransactionMonths($userID, $budgetTrackerYear); ?>
            </div>
        </div>
    </div>
</div>

<!-- FOR THE MONTH OF -->
<div class="container mt-5" id="monthly-breakdown">
    <div class="row text-center">
        <div class="col-12">
            <div class="divider"></div>
            <h4>For the month of <?php echo $budgetTrackerMonth; ?></h4>
            <div class="divider"></div>
        </div>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-4">
            <h5>
                <?php if (!empty($budgetTrackerMonth)) {
                    $monthlyIncome = computeMonthlyIncome($userID, $budgetTrackerYear, $budgetTrackerMonth);
                    echo '₱' . number_format($monthlyIncome, 2, ".", ",");
                } else {
                    echo "₱ 0.00";
                } ?>
            </h5>
            <form method="POST" action="#monthly-breakdown">
                <input type="hidden" name="budgetTrackerYear" value="<?php echo $budgetTrackerYear; ?>">
                <input type="hidden" name="budgetTrackerMonth" value="<?php echo $budgetTrackerMonth; ?>">
                <input type="hidden" value="income" name="transactionType">
                <button class="btn btn-primary" type="submit">TOTAL INCOME</button>
            </form>
        </div>
        <div class="col-md-4">
            <h5>
                <?php if (!empty($budgetTrackerMonth)) {
                    $monthlySavings = computeMonthlySavings($userID, $budgetTrackerYear, $budgetTrackerMonth);
                    echo '₱' . number_format($monthlySavings, 2, ".", ",");
                } else {
                    echo "₱ 0.00";
                } ?>
            </h5>
            <form method="POST" action="#monthly-breakdown">
                <input type="hidden" name="budgetTrackerYear" value="<?php echo $budgetTrackerYear; ?>">
                <input type="hidden" name="budgetTrackerMonth" value="<?php echo $budgetTrackerMonth; ?>">
                <input type="hidden" value="savings" name="transactionType">
                <button class="btn btn-primary" type="submit">TOTAL SAVINGS</button>
            </form>
        </div>
        <div class="col-md-4">
            <h5>
                <?php if (!empty($budgetTrackerMonth)) {
                    $monthlyExpense = computeMonthlyExpense($userID, $budgetTrackerYear, $budgetTrackerMonth);
                    echo '₱' . number_format($monthlyExpense, 2, ".", ",");
                } else {
                    echo "₱ 0.00";
                } ?>
            </h5>
            <form method="POST" action="#monthly-breakdown">
                <input type="hidden" name="budgetTrackerYear" value="<?php echo $budgetTrackerYear; ?>">
                <input type="hidden" name="budgetTrackerMonth" value="<?php echo $budgetTrackerMonth; ?>">
                <input type="hidden" value="expense" name="transactionType">
                <button class="btn btn-primary" type="submit">TOTAL EXPENSE</button>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 d-flex align-items-center">
            <div class="chart-container">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-container">
                <h5 style="text-align: center;">Categories</h5>
                <ul class="list-unstyled">
                    <?php if (!empty($budgetTrackerMonth) && !empty($transactionType)) {
                        listMonthlyBreakdown($userID, $budgetTrackerYear, $budgetTrackerMonth, $transactionType);
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>