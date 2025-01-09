<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy</title>
    <link rel="icon" href="assets/images/pesobuddy_icon.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="p-1 mb-3 border-bottom bg-white">
        <div class="container-fluid px-0">
            <nav class="navbar navbar-expand-lg navbar-light px-3">
                <!-- Logo -->
                <a class="navbar-brand" href="index.php" style="margin-left: -25px;">
                    <img src="assets/images/pesobuddy_logo.png" width="230" height="50" alt="Logo">
                </a>

                <!-- Toggler Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis subheading" href="#">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis subheading" href="#">Tracker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis subheading" href="#">Transaction</a>
                        </li>
                    </ul>

                    <!-- User Profile Image -->
                    <div class="px-2 ms-lg-3">
                        <a href="#">
                            <img src="assets/images/pesobuddy_icon.png" alt="mdo" width="32" height="32"
                                class="rounded-circle">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Greetings and Finance Tips -->
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 px-3 px-md-5 pt-3 pt-md-4 heading">
                Hello, <span style="color:#1A7431">Name!</span>
            </div>
            <div class="col-12 col-md-6 text-md-end px-3 px-md-5 pt-3 pt-md-4 paragraph">
                <span class="subheading" style="color:#1A7431;">FINANCE TIP </span><br> Never invest
                in things you don’t understand.
            </div>
        </div>
    </div>

    <!-- Annual Report -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 ps-md-5 py-md-4 p-3">
                <div class="card rounded-5">
                    <div class="row text-center">
                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                            <div class="paragraph pt-3"><b>Annual Totals</b></div>
                        </div>
                    </div>
                    <div class="row text-center m-2">
                        <!-- Total Income -->
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="subheading"><b>TOTAL INCOME</b></div>
                            <p class="paragraph pt-3">₱ 100,000.00</p>
                        </div>
                        <!-- Total Savings -->
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="subheading"><b>TOTAL SAVINGS</b></div>
                            <p class="paragraph pt-3">₱ 100,000.00</p>
                        </div>
                        <!-- Total Expense -->
                        <div class="col-12 col-md-4">
                            <div class="subheading"><b>TOTAL EXPENSE</b></div>
                            <p class="paragraph pt-3">₱ 100,000.00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Remaining Balance Section -->
            <div class="col-12 col-md-4 pe-md-5 ps-md-2 py-md-4">
                <div class="card rounded-5">
                    <div class="row text-center">
                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                            <div class="paragraph pt-1"><b>Annual</b></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="subheading text-center pb-3"><b>REMAINING BALANCE</b></div>
                    </div>
                    <div class="text-center">
                        <p class="heading">₱ 100,000.00</p>
                    </div>
                </div>
            </div>

            <!-- Year Dropdown Button -->
            <div class="w-25 ps-md-5 py-md-4 p-3">
                <div class="subheading">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
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
    <div class="container-fluid">
        <div class="row">

            <!-- Yearly Report -->
            <div class="col-12 col-lg-8 px-lg-5 py-3">
                <div>
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>

            <!-- Biggest Transactions -->
            <div class="col-12 col-lg-4 px-lg-5 py-4">
                <div class="card rounded-5">
                    <div class="d-flex flex-column align-items-end">
                        <div class="heading pt-4 pb-4 pe-3 text-end">
                            <b>YOUR <span style="color: #1A7431;">BIGGEST TRANSACTIONS</span>, YET!</b>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="heading pt-5">EMERGENCY<br> FUND</p>
                        <p class="heading pb-5">₱ 100,000.00</p>
                        <p class="subheading ps-3 text-start">SAVINGS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="line-breaker mb-5"></div>

    <!-- User Budget Tracker Section -->
    <div class="container-fluid">
        <div class="row align-items-center">
            <div
                class="col-12 col-md-10 ps-md-5 p-3 d-flex align-items-center justify-content-center justify-content-md-start">
                <div class="me-3" style="width: 20px; background-color: #1A7431; height: 40px;"></div>
                <span class="heading">BUDGET TRACKER</span>
            </div>

            <div class="col-12 col-md-2 p-3 d-flex justify-content-center justify-content-md-end">
                <div class="btn-group subheading  mx-auto">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
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

    <!-- Monthly Buttons -->
    <div class="container-fluid px-md-5">
        <div class="row">
            <div class="col-12 pt-md-5">
                <div class="row g-3 pb-3 justify-content-center">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">JANUARY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">FEBRUARY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">MARCH</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">APRIL</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">MAY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">JUNE</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">JULY</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">AUGUST</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">SEPTEMBER</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">OCTOBER</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">NOVEMBER</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 subheading">
                        <button type="button" class="btn btn-success w-100 p-3">DECEMBER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Tracker Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ps-md-5 py-md-4 p-3 pe-md-5">
                <div class="card rounded-5 border border-black border-4">
                    <div class="row align-items-center text-start p-4">
                        <div class="col-md-3 col-12 mb-3 mb-md-0">
                            <div class="subheading">Add New Tracker</div>
                        </div>

                        <!-- Year Input -->
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <input type="text" class="form-control rounded-3 subheading" placeholder="YEAR">
                        </div>

                        <!-- Month Input -->
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <select class="form-select rounded-3 subheading">
                                <option selected disabled>MONTH</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>...</option>
                            </select>
                        </div>

                        <!-- Create Button -->
                        <div class="col-md-3 col-12 text-md-end text-center subheading">
                            <button class="btn btn-success rounded-5 px-4 py-2">CREATE</button>
                        </div>
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
</body>

</html>