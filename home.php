<?php

include("connect.php");
include("assets/php/processes/functions.php");
include("assets/php/classes/transactions-history.php");
include("assets/php/classes/finance-dashboard.php");
include("assets/php/classes/biggest-transaction.php");

session_start();
userAuth();

$userID = $_SESSION['userID'];
include("assets/php/processes/imageProcessLogo.php");
include("assets/php/processes/imageProcessProfile.php");

$year = isset($_GET['year']) ? $_GET['year'] : '2025';

deleteTracker($userID);
$annualTotalIncome = computeAnnualIncome($userID, $year);
$annualTotalSavings = computeAnnualSavings($userID, $year);
$annualTotalExpense = computeAnnualExpense($userID, $year);
$annualRemainingBalance = computeRemainingBalance($annualTotalIncome, $annualTotalSavings, $annualTotalExpense);

$userTransactionCategory = new FinanceDashboard($_SESSION['userID']);
$transaction = new BiggestTransaction($_SESSION['userID']);

include("assets/php/processes/category-processes.php");
include("assets/php/processes/transaction-processes.php");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy</title>
    <link rel="icon" href="assets/images/websiteLogo/<?php echo $websiteLogo ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include('assets/shared/navbar.php'); ?>

    <!-- Greetings and Date -->
    <div class="container" style="padding-top: 5rem;">
        <div class="row align-items-center justify-content-between px-2">
            <div class="col-12 col-md-6 pt-3 pt-md-4 heading order-2 order-md-1">
                Hello, <span style="color:#1A7431"><?php echo $_SESSION['firstName'] ?></span>!
            </div>
            <div
                class="col-12 col-md-auto paragraph d-flex flex-row align-items-center pt-3 pt-md-4 order-1 order-md-2">
                <!-- Date -->
                <div class="col-auto text-md-end">
                    <span class="subheading"
                        style="color:#1A7431;"><?php echo strtoupper(date('l')); ?></span><br><?php echo date("F d, Y"); ?>
                </div>
                <!-- Vertical Line -->
                <div class="col-auto px-3 d-none d-md-block">
                    <div style="width: 1px; background-color: black; height: 40px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Annual Report -->
    <div class="container">
        <div class="row align-items-center px-2">
            <div class="col-12 col-md-8 py-md-4">
                <div class="card stat-card rounded-5">
                    <div class="row text-center">
                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                            <div class="paragraph pt-3"><b>Annual Totals</b></div>
                        </div>
                    </div>
                    <div class="row text-center align-items-center m-2">
                        
                        <!-- Total Income -->
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="subheading"><b>TOTAL INCOME</b></div>
                            <p class="paragraph pt-2">₱ <?php echo number_format($annualTotalIncome, 2, ".", ",") ?></p>
                        </div>

                        <!-- Total Savings -->
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="subheading"><b>TOTAL SAVINGS</b></div>
                            <p class="paragraph pt-2">₱ <?php echo number_format($annualTotalSavings, 2, ".", ",") ?>
                            </p>
                        </div>

                        <!-- Total Expense -->
                        <div class="col-12 col-md-4">
                            <div class="subheading"><b>TOTAL EXPENSE</b></div>
                            <p class="paragraph pt-2">₱ <?php echo number_format($annualTotalExpense, 2, ".", ",") ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Remaining Balance Section -->
            <div class="col-12 col-md-4 py-md-4">
                <div class="card stat-card rounded-5">
                    <div class="row text-center">
                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                            <div class="paragraph pt-1"><b>Annual</b></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="subheading text-center pb-2"><b>REMAINING BALANCE</b></div>
                    </div>
                    <div class="text-center">
                        <p class="heading">₱ <?php echo number_format($annualRemainingBalance, 2, ".", ",") ?></p>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-4">
                <hr>
            </div>

            <!-- Year Dropdown Button -->
            <form method="get">
                <div class="row py-4">
                    <div class="col-auto pb-2">
                        <div class="subheading">
                            <?= $userTransactionCategory->displayYearDropdown(); ?>
                        </div>
                    </div>
                    <div class="col-auto pb-2">
                        <div class="subheading">
                            <?= $userTransactionCategory->displayCategoryTypeDropdown(); ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Report Section -->
    <div class="container">
        <div class="row justify-content-center align-items-center px-2">

            <!-- Yearly Report -->
            <div class="col-12 col-lg-10 col-xl-8">
                <div>
                    <canvas id="yearlyChart" style="overflow: visible;"></canvas>
                </div>
            </div>

            <!-- Biggest Transactions -->
            <?php echo $transaction->displayTransactionCard(); ?>
        </div>
    </div>

    <!-- User Budget Tracker Section -->
    <?php include('budget-tracker.php'); ?>

    <!-- Manage Categories Section -->
    <div class="container mt-5" id="manage-categories">
        <div class="row category-section mt-5">
            <div class="col-12">
                <div class="divider"></div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto d-flex flex-row align-items-center mb-2">
                        <div class="me-3" style="width: 15px; background-color: var(--darkColor); height: 40px;"></div>
                        <span class="heading">MANAGE YOUR CATEGORIES</span>
                    </div>
                    <div class="col-auto mb-2">
                        <button button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">+ ADD CATEGORY</button>
                    </div>
                </div>

                <!-- Add Category Modal -->
                <?php include("assets/php/modals/add-category-modal.php"); ?>

                <!-- Category-List -->
                <div class="row mt-4 my-5">
                    <div class="col-md-6">
                        <h6 class="mt-4">Category List</h6>
                        <div class="header-divider"></div>
                        <div id="category-list">
                            <form method="POST" action="#manage-categories">
                                <?php
                                if (mysqli_num_rows($customCategoryResult) > 0) {
                                    while ($customCategoryRow = mysqli_fetch_assoc($customCategoryResult)) {
                                        $categoryID = $customCategoryRow['categoryID'];
                                        $categoryName = $customCategoryRow['categoryName'];
                                        ?>
                                        <button type="submit" name="categoryID" value="<?php echo $categoryID ?>"
                                            class="btn text-start w-100 my-1">
                                            <?php echo $categoryName ?>
                                        </button>
                                        <?php
                                    }
                                } else { ?>
                                    <p class="paragraph my-1">You have not added any categories yet.</p>
                                    <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>

                    <!-- Edit Category Card -->
                    <div class="col-md-6">
                        <div class="card card-container">
                            <h6>Edit Category</h6>
                            <form id="edit-category-form" method="POST" action="#manage-categories">
                                <?php
                                $categoryType = $categoryName = '';
                                if (isset($_POST['categoryID'])) {
                                    $categoryID = $_POST['categoryID'];
                                    $userCategoryQuery = "SELECT * FROM categories WHERE categoryID = $categoryID";
                                    $userCategoryResult = executeQuery($userCategoryQuery);
                                    $category = mysqli_fetch_assoc($userCategoryResult);

                                    $categoryName = $category['categoryName'] ?? '';
                                    $categoryType = $category['categoryType'] ?? '';
                                }
                                ?>

                                <!-- Category Type Dropdown -->
                                <div class="form-group my-3">
                                    <label for="categoryType">Category Type</label>
                                    <select class="form-control" id="categoryType" name="categoryType">
                                        <option value="Expense" <?php echo ($categoryType == 'Expense') ? 'selected' : ''; ?>>Expense</option>
                                        <option value="Income" <?php echo ($categoryType == 'Income') ? 'selected' : ''; ?>>Income</option>
                                        <option value="Savings" <?php echo ($categoryType == 'Savings') ? 'selected' : ''; ?>>Savings</option>
                                    </select>
                                </div>

                                <!-- Category Name Input Field -->
                                <div class="form-group my-3">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName"
                                        value="<?php echo htmlspecialchars($categoryName); ?>" placeholder="Enter name">
                                </div>

                                <input type="hidden" name="categoryID" value="<?php echo $categoryID ?? ''; ?>">

                                <div class="button-container d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteCategoryModal">DELETE</button>

                                    <!-- Delete Category Modal -->
                                    <?php include("assets/php/modals/delete-category-modal.php"); ?>

                                    <button type="button" name="btnEditCategory" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#saveModal">SAVE</button>

                                    <!-- Save Modal -->
                                    <div class="modal fade" id="saveModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                                                <div class="modal-body p-4">
                                                    <h5>The edited category has been successfully saved!</h5>
                                                    <button type="submit" class="btn mt-3" name="btnEditCategory"
                                                        style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction History Heading -->
    <div class="container" id="transaction-history">
        <div class="row mb-4 px-2">
            <!-- HEADING -->
            <div class="col-12 mb-4">
                <hr>
                <div class="row align-items-center justify-content-md-between">
                    <!-- Heading -->
                    <div class="col-auto d-flex flex-row align-items-center mb-2">
                        <div class="me-3" style="width: 15px; background-color: var(--darkColor); height: 40px;"></div>
                        <span class="heading">TRANSACTION HISTORY</span>
                    </div>

                    <!-- Add Transaction Button -->
                    <div class="col-auto mb-2">
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                            + ADD TRANSACTION
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Transaction Modal -->
    <form method="POST">
        <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4" style="border-radius: 15px; background-color: white; border: none;">
                    <div class="modal-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="heading" style="margin: 0; font-size: 1.8rem;">Add New Transaction
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="mb-3">
                            <div class="row g-3">
                                <!-- Transaction Type Dropdown -->
                                <div class="col-md-7">
                                    <select class="form-select" name="categoryType" id="addtransactionType"
                                        onchange="filterCategoryOptions()">
                                        <option selected disabled>Transaction Type</option>
                                        <?php
                                        if (mysqli_num_rows($transactionsTypeResults) > 0) {
                                            while ($transactionsTypeRows = mysqli_fetch_assoc($transactionsTypeResults)) {
                                                ?>
                                                <option value="<?php echo $transactionsTypeRows['defaultCategoryType']; ?>">
                                                    <?php echo ucfirst($transactionsTypeRows['defaultCategoryType']); ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Category Dropdown -->
                                <div class="col-md-5">
                                    <select class="form-select" name="categoryName" id="addcategoryType"
                                        onchange="selectType()">
                                        <option selected disabled>Category</option>
                                        <?php
                                        if (mysqli_num_rows($defaultCategoriesResults) > 0) {
                                            while ($defaultCategoriesRows = mysqli_fetch_assoc($defaultCategoriesResults)) {
                                                ?>
                                                <option
                                                    value="default_<?php echo ($defaultCategoriesRows['defaultCategoryID']); ?>"
                                                    data-type="<?php echo ($defaultCategoriesRows['defaultCategoryType']); ?>">
                                                    <?php echo ($defaultCategoriesRows['defaultCategoryName']); ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (mysqli_num_rows($categoriesResults) > 0) {
                                            while ($categoriesRows = mysqli_fetch_assoc($categoriesResults)) {
                                                ?>
                                                <option value="custom_<?php echo ($categoriesRows['categoryID']); ?>"
                                                    data-type="<?php echo ($categoriesRows['categoryType']); ?>">
                                                    <?php echo ($categoriesRows['categoryName']); ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <input class="form-control" type="text" name="date" placeholder="Date"
                                onfocus="(this.type='date')" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <textarea class="form-control" name="descriptionMesssage" id="descriptionMesssage"
                                placeholder="Description"></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="row g-3 align-items-center">
                                <!-- Amount -->
                                <div class="col-12 col-md-9">
                                    <input type="number" min="1" class="form-control" name="amount" id="amount"
                                        placeholder="Amount">
                                </div>

                                <!-- Add Button -->
                                <div class="col-12 col-md-3">
                                    <button type="button" class="btn btn-primary"
                                        style="background-color: var(--primaryColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1.9rem;"
                                        data-bs-target="#transactionSuccessModal" data-bs-toggle="modal"
                                        data-bs-dismiss="modal">
                                        ADD
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Transaction Success Modal -->
        <div class="modal fade" id="transactionSuccessModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"
                    style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                    <div class="modal-body p-4">
                        <h5 class="text-uppercase"><b>Transaction successfully added!</b></h5>
                        <a href=home.php>
                            <button type="submit" class="btn mt-3" name="btnAddTransaction"
                                style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                                data-bs-dismiss="modal">Close</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Transaction History Table -->
    <div class="container">
        <div class="row mb-4 px-2">
            <div class="col-12">
                <div class="card card-container p-4">
                    <!-- FILTER TRANSACTIONS -->
                    <div class="row my-3">

                        <form class="d-flex flex-row flex-wrap justify-content-center align-items-center" method="GET"
                            action="#transaction-history">
                            <!-- Label -->
                            <div class="col-12 col-md-auto text-center text-md-start mb-1">
                                <div class="h6 mx-1">
                                    Filter By:
                                </div>
                            </div>

                            <!-- Filter Form -->
                            <div class="col col-md-auto d-flex flex-row mb-2">
                                <!-- Type -->
                                <input class="form-control mx-1" type="text" name="transactionType"
                                    value="<?php echo ($transactionHistory->transactionType) ? $transactionHistory->transactionType : "" ?>"
                                    placeholder="Type">

                                <!-- Category -->
                                <input class="form-control mx-1" type="text" name="transactionCategory"
                                    value="<?php echo ($transactionHistory->transactionCategory) ? $transactionHistory->transactionCategory : "" ?>"
                                    placeholder="Category">
                            </div>

                            <div class="col-12 col-md-auto text-center text-md-end mb-2">
                                <!-- Search Button -->
                                <button class="btn btn-primary rounded-pill mx-1" type="submit">
                                    SEARCH
                                </button>

                                <!-- Clear Button -->
                                <a href="home.php#transaction-history" class="btn btn-primary rounded-pill"
                                    type="button">
                                    CLEAR
                                </a>
                            </div>
                        </form>

                    </div>

                    <!-- TRANSACTION TABLE -->
                    <div class="row" style="overflow-y: auto;">
                        <div class="table-responsive" style="max-height: 650px; overflow-y: auto;">
                            <table class="table table-striped table-borderless m-0">

                                <!-- Column Heading -->
                                <thead class="align-middle">
                                    <tr>
                                        <th scope="col">NO.</th>
                                        <th scope="col">TYPE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">AMOUNT</th>
                                        <th scope="col">DATE</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <!-- Data -->
                                <tbody>
                                    <?php
                                    $transactionNo = 1;

                                    if (mysqli_num_rows($transactionsResult) > 0) {
                                        while ($transactionRow = mysqli_fetch_array($transactionsResult)) {

                                            echo $transactionHistory->createRow($transactionRow, $transactionNo);

                                            include("assets/php/modals/transaction-table-modals.php");
                                            $transactionNo++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan='100%' class='text-center py-3'>No data available.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="container">
        <div class="row my-4 px-2">
            <div class="col-12">
                <!-- HEADING -->
                <hr>
                <div class="col-auto d-flex flex-row align-items-center mb-4">
                    <div class="me-3" style="width: 15px; background-color: #dc3545; height: 40px;"></div>
                    <span class="heading" style="color: #dc3545;">DANGER ZONE</span>
                </div>

                <div class="row justify-content-between">
                    <!-- Warning -->
                    <div class="col-12 col-md-10">
                        <p>
                            Deleting this month will permanently erase all tracked data, insights, and linked records,
                            and this action cannot be undone.
                        </p>
                    </div>

                    <!-- Delete Button -->
                    <div class="col-12 col-md-2 text-start text-md-end">
                        <button
                            class="btn btn-danger rounded-pill <?php echo $isEmpty = $_SESSION['isEmpty'] == true ? "disabled" : ""; ?>"
                            data-bs-toggle="modal" data-bs-target="#deleteData">
                            DELETE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Monthly Tracker Modal -->
    <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="deleteDataModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; background-color: white;">
                <div style="position: relative; padding: 1rem;">
                    <!-- Title -->
                    <h4 class="modal-title heading text-black" id="deleteCategoryModalLabel"
                        style="margin: 0; font-size: 26px;">
                        Delete Monthly Tracker
                    </h4>

                    <!-- Close button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 26px; right: 40px; transform: translateX(26px);">
                    </button>

                    <!-- Card content -->
                    <div class="card"
                        style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                        <p class="paragraph" style="margin: 0;">LAST WARNING!</p>
                        <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                            If you decided to delete this month’s
                            <b>(<?php echo $budgetTrackerMonth . ' ' . $budgetTrackerYear; ?>)</b> budget tracker, all
                            data
                            related to it will also be deleted.
                        </p>
                    </div>

                    <!-- Footer buttons -->
                    <div class="modal-footer d-flex justify-content-end" style="border: none;">
                        <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                            style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-danger paragraph" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteDataModal" style="color: white; margin-left: 0.5rem;">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Monthly Tracker the deletion -->
    <div class="modal fade" id="confirmDeleteDataModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                <div class="modal-header" style="border: none;">
                    <h4 class="modal-title heading text-center w-100" id="confirmDeleteModalLabel" style="margin: 0;">
                        Monthly Tracker Deleted</h4>
                </div>
                <div class="modal-body text-center">
                    The monthly tracker has been successfully deleted.
                </div>
                <div class="modal-footer d-flex justify-content-center" style="border: none;">
                    <form method="POST">
                        <input type="hidden" value="<?php echo $budgetTrackerYear; ?>" name="year">
                        <input type="hidden" value="<?php echo $budgetTrackerMonth; ?>" name="month">
                        <button type="submit" class="btn btn-light paragraph" data-bs-dismiss="modal"
                            name="btnDeleteTracker">
                            Close
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('yearlyChart');
        const labels = [<?php echo '"' . implode('","', $userTransactionCategory->getChartLabels()) . '"' ?>];

        const data = {
            labels: labels,
            datasets: [{
                axis: 'y',
                label: 'Yearly Finance Report',
                data: [<?php echo implode(',', $userTransactionCategory->getChartData()) ?>],
                fill: false,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 205, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(201, 203, 207, 0.6)',
                    'rgba(0, 255, 255, 0.6)',
                    'rgba(255, 105, 180, 0.6)',
                    'rgba(0, 128, 0, 0.6)',
                    'rgba(255, 165, 0, 0.6)',
                    'rgba(135, 206, 235, 0.6)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)',
                    'rgb(0, 255, 255)',
                    'rgb(255, 105, 180)',
                    'rgb(0, 128, 0)',
                    'rgb(255, 165, 0)',
                    'rgb(135, 206, 235)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {
                indexAxis: 'y',
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                family: 'Lexend Exa',
                                size: 14
                            },
                            color: '#333'
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                family: 'Lexend Exa',
                                size: 12
                            },
                            color: '#444'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'Lexend Exa',
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            family: 'Lexend Exa',
                            size: 16
                        },
                        bodyFont: {
                            family: 'Lexend Exa',
                            size: 14
                        },
                    }
                }
            }
        };
        new Chart(ctx, config);
    </script>

    <script>
        <?php echo loadChart($userID, $budgetTrackerYear, $budgetTrackerMonth, $transactionType); ?>
    </script>

    <script src="assets/js/transaction-functions.js"></script>
</body>

</html>