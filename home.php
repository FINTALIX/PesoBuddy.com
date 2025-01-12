<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy</title>
    <link rel="icon" href="assets/images/pesobuddy_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid px-0 fixed-top">
        <nav class="navbar navbar-expand-lg px-3">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/pesobuddy_logoW.png" width="230" height="50" alt="Logo">
            </a>

            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link px-2" href="#">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2" href="#">Tracker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2" href="#">Transaction</a>
                    </li>

                    <!-- User Profile Image -->
                    <li class="nav-item">
                        <div class="px-2 ms-lg-3">
                            <!-- Show profile picture on screens wider than lg and hide on screens smaller than lg -->
                            <a href="#" class="d-none d-lg-block">
                                <img src="assets/images/pesobuddy_icon.png" alt="mdo" width="32" height="32"
                                    class="rounded-circle">
                            </a>
                            <!-- Show profile as text on on screens smaller than lg and hide on screens wider than lg -->
                            <a href="#" class="nav-link d-block d-lg-none">Profile</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Greetings and Date -->
    <div class="container" style="padding-top: 5rem;">
        <div class="row align-items-center justify-content-between px-2">
            <div class="col-12 col-md-6 pt-3 pt-md-4 heading order-2 order-md-1">
                Hello, <span style="color:#1A7431">Name!</span>
            </div>
            <div
                class="col-12 col-md-auto paragraph d-flex flex-row align-items-center pt-3 pt-md-4 order-1 order-md-2">
                <!-- Date -->
                <div class="col-auto text-md-end">
                    <span class="subheading" style="color:#1A7431;">FRIDAY</span><br>January 10, 2024
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
        <div class="row px-2">
            <div class="col-12 col-md-8 py-4">
                <div class="card stat-card rounded-5">
                    <div class="row text-center">
                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                            <div class="paragraph pt-3"><b>Annual Totals</b></div>
                        </div>
                    </div>
                    <div class="row text-center m-2">
                        <!-- Total Income -->
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="subheading"><b>TOTAL INCOME</b></div>
                            <p class="paragraph pt-2">₱ 100,000.00</p>
                        </div>
                        <!-- Total Savings -->
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="subheading"><b>TOTAL SAVINGS</b></div>
                            <p class="paragraph pt-2">₱ 100,000.00</p>
                        </div>
                        <!-- Total Expense -->
                        <div class="col-12 col-md-4">
                            <div class="subheading"><b>TOTAL EXPENSE</b></div>
                            <p class="paragraph pt-2">₱ 100,000.00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Remaining Balance Section -->
            <div class="col-12 col-md-4 py-4">
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
                        <p class="heading">₱ 100,000.00</p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <hr>
            </div>

            <!-- Year Dropdown Button -->
            <div class="w-25 pt-4">
                <div class="subheading">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        YEAR
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">2025</a></li>
                        <li><a class="dropdown-item" href="#">2024</a></li>
                        <li><a class="dropdown-item" href="#">2023</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Section -->
    <div class="container">
        <div class="row align-items-center px-2">

            <!-- Yearly Report -->
            <div class="col-12 col-lg-8">
                <div>
                    <canvas id="yearlyChart" style="overflow: visible;"></canvas>
                </div>
            </div>

            <!-- Biggest Transactions -->
            <div class="col-12 col-lg-4 px-lg-5 py-4">
                <div class="card stat-card rounded-5">
                    <div class="d-flex flex-column align-items-end">
                        <div class="subheading pt-4 pb-4 pe-3 text-end">
                            <b>YOUR <span style="color: #1A7431;">BIGGEST TRANSACTIONS</span>, YET!</b>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="heading pt-3">EMERGENCY FUND</p>
                        <p class="heading pb-3">₱ 100,000.00</p>
                        <p class="subheading ps-3 text-start">SAVINGS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Budget Tracker Section -->
    <div class="container">
        <div class="row align-items-center mb-4 px-2">
            <div class="col-12">
                <hr>
            </div>

            <div
                class="col-12 col-md-11 d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                <div class="me-3" style="width: 15px; background-color: var(--darkColor); height: 40px;"></div>
                <span class="heading">BUDGET TRACKER</span>
            </div>

            <div class="col-12 col-md-1 d-flex justify-content-center justify-content-sm-end mb-2">
                <div class="btn-group subheading mx-auto">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        YEAR
                    </button>
                    <ul class="dropdown-menu dropdown-menu-sm-end">
                        <li><a class="dropdown-item" href="#">2025</a></li>
                        <li><a class="dropdown-item" href="#">2024</a></li>
                        <li><a class="dropdown-item" href="#">2023</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Buttons -->
    <div class="container">
        <div class="row px-2">
            <div class="col-12 pt-3">
                <div class="row g-3 pb-3 justify-content-center">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">JANUARY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">FEBRUARY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">MARCH</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">APRIL</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">MAY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">JUNE</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">JULY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">AUGUST</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">SEPTEMBER</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">OCTOBER</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">NOVEMBER</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-primary w-100 p-3">DECEMBER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Tracker Section -->
    <div class="container">
        <div class="row px-2">
            <div class="col-12 py-md-4 p-3">
                <div class="card card-container">
                    <div class="row align-items-center text-start p-4">
                        <div class="col-md-3 col-12 mb-3 mb-md-0">
                            <div class="subheading">Add New Tracker</div>
                        </div>

                        <!-- Year Input -->
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <input type="text" class="form-control rounded-3 paragraph" placeholder="YEAR">
                        </div>

                        <!-- Month Input -->
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <select class="form-select rounded-3 paragraph">
                                <option selected disabled>MONTH</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>...</option>
                            </select>
                        </div>

                        <!-- Create Button -->
                        <div class="col-md-3 col-12 text-md-end text-center subheading">
                            <button class="btn btn-primary rounded-pill px-4 py-2">CREATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOR THE MONTH OF -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-12">
                <div class="divider"></div>
                <h4>For the month of XXXXXXX</h4>
                <div class="divider"></div>
            </div>
        </div>

        <div class="row text-center mt-4">
            <div class="col-md-4">
                <h5>₱ 100,000.00</h5>
                <p>Total Income</p>
            </div>
            <div class="col-md-4">
                <h5>₱ 100,000.00</h5>
                <p>Total Savings</p>
            </div>
            <div class="col-md-4">
                <h5>₱ 100,000.00</h5>
                <p>Total Expense</p>
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
                        <li class="d-flex justify-content-between align-items-center">
                            <span><span class="color-box" style="background-color: #FF6384;"></span> Salary</span>
                            <span>₱XX,XXX.XX</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span><span class="color-box" style="background-color: #36A2EB;"></span> Part-time</span>
                            <span>₱XX,XXX.XX</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span><span class="color-box" style="background-color: #FFCE56;"></span> Freelance</span>
                            <span>₱XX,XXX.XX</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span><span class="color-box" style="background-color: #FF9F40;"></span> Allowance</span>
                            <span>₱XX,XXX.XX</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span><span class="color-box" style="background-color: #4BC0C0;"></span> Stipend</span>
                            <span>₱XX,XXX.XX</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span><span class="color-box" style="background-color: #9966FF;"></span> Others</span>
                            <span>₱XX,XXX.XX</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row category-section mt-5">
            <div class="col-12">
                <div class="divider"></div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto d-flex flex-row align-items-center mb-2">
                        <div class="me-3" style="width: 15px; background-color: var(--darkColor); height: 40px;"></div>
                        <span class="heading">MANAGE YOUR CATEGORIES</span>
                    </div>
                    <div class="col-auto mb-2">
                        <button button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">+ ADD CATEGORY</button>
                    </div>
                </div>

                <!-- Add Category Modal -->
                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-4"
                            style="border-radius: 15px; background-color: white; border: none;">
                            <div class="modal-body">
                                <h1 class="text-center mb-4 heading">Add New Category</h1>
                                <div class="mb-3">
                                    <label for="categoryType" class="form-label paragraph">
                                        Category Type
                                    </label>
                                    <select class="form-select" id="categoryType">
                                        <option selected>Choose type...</option>
                                        <option value="1">Type 1</option>
                                        <option value="2">Type 2</option>
                                        <option value="3">Type 3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label paragraph">
                                        Category Name
                                    </label>
                                    <input type="text" class="form-control" id="categoryName" placeholder="Enter name">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-success"
                                        style="background-color: var(--primaryColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1.5rem;"
                                        data-bs-target="#successModal" data-bs-toggle="modal" data-bs-dismiss="modal">
                                        SAVE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success Modal -->
                <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"
                            style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                            <div class="modal-body p-4">
                                <h5>Category successfully added!</h5>
                                <button type="button" class="btn mt-3"
                                    style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- category-list -->
                <div class="row mt-4 my-5">
                    <div class="col-md-6">
                        <h6 class="mt-4">Category List</h6>
                        <div class="header-divider"></div>
                        <div id="category-list">
                            <button class="btn text-start w-100 my-1">Salary</button>
                            <button class="btn text-start w-100 my-1">Part-Time Job</button>
                            <button class="btn text-start w-100 my-1">Freelance</button>
                            <button class="btn text-start w-100 my-1">Groceries</button>
                            <button class="btn text-start w-100 my-1">Transpo</button>
                            <button class="btn text-start w-100 my-1">Rent</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-container">
                            <h6>Edit Category</h6>
                            <form id="edit-category-form">
                                <div class="form-group my-3">
                                    <label for="categoryType">Category Type</label>
                                    <input type="text" class="form-control" id="categoryType" placeholder="Enter type">
                                </div>
                                <div class="form-group my-3">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" placeholder="Enter name">
                                </div>
                            </form>
                            <div class="button-container d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal">DELETE</button>

                                <!-- Delete Category Modal -->
                                <div class="modal fade" id="deleteCategoryModal" tabindex="-1"
                                    aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content"
                                            style="border-radius: 15px; border: 2px solid var(--primaryColor); background-color: var(--primaryColor);">
                                            <div class="modal-header" style="border: none; padding-bottom: 0.5rem;">
                                                <h4 class="modal-title heading flex-start w-100"
                                                    id="deleteCategoryModalLabel" style="margin: 0;">
                                                    Delete Category
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="padding-top: 0.5rem;">
                                                <div class="card"
                                                    style="border: 1px solid var(--borderColor); border-radius: 10px; padding: 1rem;">
                                                    <p class="paragraph">Are you sure you want to delete this category?
                                                    </p>
                                                    <p class="paragraph" style="color: var(--borderColor);">
                                                        Once deleted, it cannot be retrieved anymore.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-end" style="border: none;">
                                                <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                                                    style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-danger paragraph"
                                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                    style="color: white; margin-left: 0.5rem;">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm the deletion -->
                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content"
                                            style="border-radius: 15px; background-color: #aa202e; color: white; border: none;">
                                            <div class="modal-header" style="border: none;">
                                                <h4 class="modal-title heading flex-start w-100"
                                                    id="confirmDeleteModalLabel" style="margin: 0;">Category
                                                    Deleted</h4>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                The category has been successfully deleted.
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center"
                                                style="border: none;">
                                                <button type="button" class="btn btn-light paragraph"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction History Heading -->
    <div class="container">
        <div class="row mb-4 px-2">
            <!-- HEADING -->
            <div class="col-12 mb-4">
                <hr>
                <div class="row align-items-center justify-content-center justify-content-lg-between">
                    <!-- Heading -->
                    <div class="col-auto d-flex flex-row align-items-center mb-2">
                        <div class="me-3" style="width: 15px; background-color: var(--darkColor); height: 40px;"></div>
                        <span class="heading">TRANSACTION HISTORY</span>
                    </div>

                    <!-- Add Transaction Button -->
                    <div class="col-auto mb-2">
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransaction">
                            + ADD TRANSACTION
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction History Table -->
    <div class="container">
        <div class="row mb-4 px-2">
            <div class="col-12">
                <div class="card card-container p-4">
                    <!-- FILTER TRANSACTIONS -->
                    <div class="row my-3">

                        <form class="d-flex flex-row flex-wrap justify-content-center align-items-center" method="">
                            <!-- Label -->
                            <div class="col-12 col-md-auto text-center text-md-start mb-1">
                                <div class="h6 mx-1">
                                    Filter By:
                                </div>
                            </div>

                            <!-- Filter Form -->
                            <div class="col col-md-auto d-flex flex-row mb-2">
                                <!-- Type -->
                                <input class="form-control mx-1" type="text" name="" placeholder="Type">

                                <!-- Category -->
                                <input class="form-control mx-1" type="text" name="" placeholder="Category">
                            </div>

                            <!-- Search Button -->
                            <div class="col-12 col-md-auto text-center text-md-end mb-2">
                                <button class="btn btn-primary rounded-pill mx-1" name="">SEARCH</button>
                            </div>
                        </form>

                    </div>

                    <!-- TRANSACTION TABLE -->
                    <div class="row">
                        <div class="table-responsive">
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
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Type</td>
                                        <td>Category</td>
                                        <td>Amount</td>
                                        <td>Date</td>
                                        <td>Description</td>

                                        <!-- Options -->
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

                                    <!-- SAMPLE Data ONLY -->
                                    <tr>
                                        <td scope="row">2</td>
                                        <td>Income</td>
                                        <td>Salary</td>
                                        <td>1000</td>
                                        <td>02 January 2024</td>
                                        <td>Income from the salary</td>
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
                <div
                    class="col-auto d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-4">
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
                        <button class="btn btn-danger rounded-pill">
                            DELETE
                        </button>
                    </div>
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
        const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        const data = {
            labels: labels,
            datasets: [{
                axis: 'y',
                label: 'Yearly Budget Report',
                data: [65, 59, 80, 81, 56, 55, 40, 70, 85, 90, 72, 60],
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

        const ctx2 = document.getElementById('doughnutChart').getContext('2d');
        const doughnutChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Salary', 'Part-time', 'Freelance', 'Allowance', 'Stipend', 'Others'],
                datasets: [{
                    data: [30, 20, 15, 10, 15, 10],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#FF9F40', '#4BC0C0', '#9966FF']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>

</html>