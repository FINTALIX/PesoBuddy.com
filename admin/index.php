<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Admin Dashboard</title>
    <link rel="icon" href="../assets/images/pesobuddy_icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>

<body>

        <!-- Navbar for phone size -->
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/images/pesobuddy_icon.png" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"
                aria-controls="sidebarOffcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- sidebar -->
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex align-items-center">
                <img src="../assets/images/pesobuddy_icon.png" id="toggleSidebar" alt="Toggle Sidebar" class="toggle-logo">
                <div class="sidebar-logo">
                    <a href="#">PESOBUDDY</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#dashboard" class="sidebar-link">
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#profile" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#categories" class="sidebar-link">
                        <i class="bi bi-list"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item mt-auto">
                    <a href="#settings" class="sidebar-link">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#logout" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Offcanvas for phone size -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header" >
        <img src="../assets/images/pesobuddy_logoW.png" alt="PESOBUDDY" class="img-fluid" id="sidebarOffcanvasLabel" style="max-height: 94px; max-width: 200px">
        <button type="button" class="btn-close text-reset m-0" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: transparent;"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="#dashboard"><i class="bi bi-bar-chart-line"></i> Dashboard</a></li>
                <li><a href="#profile"><i class="bi bi-person"></i> Profile</a></li>
                <li><a href="#categories"><i class="bi bi-list"></i> Categories</a></li>
                <li><a href="#settings"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a href="#logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
        </div>
    </div>

        <!-- Main Content -->
        <div class="main" style="margin-left: 70px; transition: margin-left 0.25s ease-in-out;">

            <!-- Hello Admin Section -->
            <div class="container">
                <h1>Hello, Admin!</h1>
                <p>USER STATISTICS</p>
                <div class="line"></div>
                <div class="statistics-card">
                    <div class="stat">
                        <h2>100</h2>
                        <h3>Total Users</h3>
                    </div>
                    <div class="stat">
                        <h2>80</h2>
                        <h3>Active Users</h3>
                    </div>
                    <div class="stat">
                        <h2>20</h2>
                        <h3>Inactive Users</h3>
                    </div>
                </div>
            </div>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap');

                :root {
                    --primaryFont: 'Lexend Exa', Arial, sans-serif;
                }

                body {
                    font-family: var(--primaryFont);
                    margin: 0;
                    padding: 20px;
                    background-color: #f9f9f9;
                }

                .container {
                    max-width: 800px;
                    margin: auto;
                }

                h1 {
                    font-size: 24px;
                    margin-bottom: 10px;
                    margin-left: -35%;
                }

                .line {
                    height: 2px;
                    background-color: black;
                    margin: 10px 0 20px;
                    width: 172%; /* Increased the width here */
                    margin-left: -35%;
                }

                .statistics-card {
                    display: flex;
                    justify-content: flex-start;
                    background-color: #f0f0f0;
                    border-radius: 8px;
                    padding: 40px;
                    width: 165%;
                    margin-left: -33%;
                }

                .stat {
                    text-align: center;
                    margin-right: 180px;
                    position: relative;
                }

                .stat h2 {
                    font-size: 24px;
                    margin: 0;
                }

                .stat h3 {
                    font-size: 12px;
                    text-transform: uppercase;
                    color: gray;
                    letter-spacing: 4px;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                .stat:nth-child(2) {
                    margin-left: 140px;
                }

                .stat:nth-child(3) {
                    margin-left: 180px;
                }

                p {
                    margin-top: 30px;
                    text-transform: uppercase;
                    font-weight: bold;
                    margin-left: -35%;
                }
            </style>

            <!-- Dashboard -->
            <div id="dashboard" class="container-fluid py-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">WEBSITE ENGAGEMENT</h2>
                        <hr style="border-top: 2px solid #000; margin: 1rem 0 2rem 0; opacity: 1;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 16px; text-align: left;">Monthly
                            User Signups</h3>
                        <div
                            style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 30px; padding: 24px;">
                            <div style="height: 400px; position: relative;">
                                <canvas id="userSignupsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 16px; text-align: left;">Monthly
                            Login Activity</h3>
                        <div
                            style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 30px; padding: 24px;">
                            <div style="height: 400px; position: relative;">
                                <canvas id="loginActivityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div id="profile" class="container-fluid py-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <h2>Profile</h2>
                        <p>This is the profile section.</p>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div id="categories" class="container-fluid py-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <h2>Categories</h2>
                        <p>This is the categories section.</p>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div id="settings" class="container-fluid py-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <h2>Settings</h2>
            <!-- Account Settings Section -->
            <div class="section mb-4">
                <h2>ACCOUNT SETTINGS</h2>
                <div class="thin-line"></div>
                <label class="outer-label">Change Username</label>
                <div class="section-inner">
                    <div class="username-input">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control">
                    </div>
                    <button class="btn btn-success d-block mx-auto">Save Username</button>
                </div>
            </div>

            <!-- Change Password Section -->
            <div class="section mb-4">
                <h2>CHANGE PASSWORD</h2>
                <div class="section-inner">
                    <div class="password-section">
                        <div class="w-100">
                            <label for="current-password">Current Password</label>
                            <input type="password" id="current-password" class="form-control">
                        </div>
                        <div class="password-row">
                            <div class="w-100">
                                <label for="new-password">New Password</label>
                                <input type="password" id="new-password" class="form-control">
                            </div>
                            <div class="w-100 ms-2">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-success d-block mx-auto">Save Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap');

    :root {
        --primaryFont: 'Lexend Exa', Arial, sans-serif;
        --heading-font-size: 20px;
        --subheading-font-size: 16px;
        --label-font-size: 14px;
        --input-font-size: 14px;
        --button-font-size: 14px;
        --border-radius: 8px;
        --border-width: 3px;
        --border-color: #ccc;
        --outline-width: 2px;
    }

    body {
        font-family: var(--primaryFont);
        margin: 0;
        background-color: #f5f5f5;
    }

    h1 {
        font-size: var(--heading-font-size);
        text-align: left;
        font-weight: bold;
    }

    h2 {
        font-size: var(--subheading-font-size);
        font-weight: bold;
        margin-bottom: 10px;
    }

    .section {
        margin-bottom: 20px;
        position: relative;
    }

    .section-inner {
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: var(--border-radius);
    }

    label {
        display: block;
        margin-bottom: 5px;
        text-align: left;
        font-size: var(--label-font-size);
        font-weight: bold;
    }

    input[type="text"], input[type="password"] {
        padding: 8px 10px;
        border: var(--border-width) solid var(--border-color);
        border-radius: var(--border-radius);
        box-sizing: border-box;
        font-size: var(--input-font-size);
        outline: none;
        width: 50%;
    }

    #username {
        width: 100%;
    }

    button {
        padding: 12px;
        background-color: #1A7431;
        color: #fff;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-size: var(--button-font-size);
        margin-top: 10px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        width: 15%;
        box-sizing: border-box;
        outline: var(--outline-width) solid var(--outline-color);
        font-family: var(--primaryFont);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    button:hover {
        background-color: #4AD66D !important;
        transform: translateY(-4px);
    }

    .thin-line {
        border-top: var(--border-width) solid black;
        margin: 15px 0;
    }

    .username-input {
        display: flex;
        align-items: center;
    }

    .username-input label {
        margin-right: 10px;
        font-weight: bold;
    }

    .outer-label {
        margin-bottom: 10px;
        text-align: left;
        font-weight: bold;
    }

    .password-section {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .password-row {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .password-row > div {
        width: 48%;
    }

    .password-row > div input {
        width: 100%;
    }

    .password-row .w-100 {
        width: 100%; 
    }
</style>

            <!-- Logout -->
            <div id="logout" class="container-fluid py-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <h2>Logout</h2>
                        <p>This is the logout section.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        // Sidebar JS
        document.getElementById("toggleSidebar").addEventListener("click", function () {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.querySelector(".main");
            sidebar.classList.toggle("expand");

            if (sidebar.classList.contains("expand")) {
                mainContent.style.marginLeft = "260px";
            } else {
                mainContent.style.marginLeft = "70px";
            }
        });

        // Chart.js
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        const signupData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Signups',
                data: [65, 9, 100, 81, 56, 55, 70],
                backgroundColor: '#FFAEBC',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        const loginData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Logins',
                data: [45, 52, 60, 89, 40, 55, 80],
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Render Charts
        new Chart(document.getElementById('userSignupsChart').getContext('2d'), {
            type: 'bar',
            data: signupData,
            options: chartOptions
        });

        new Chart(document.getElementById('loginActivityChart').getContext('2d'), {
            type: 'bar',
            data: loginData,
            options: chartOptions
        });
    </script>
</body>

</html>