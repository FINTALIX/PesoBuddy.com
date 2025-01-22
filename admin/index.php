<?php

include("../assets/php/functions.php");

session_start();
adminAuth();

?>

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
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <?php include('../assets/shared/sidebar.php'); ?>


    <!-- Main Content -->
    <div class="main px-2 px-md-0"
        style="background-color: #191919 !important; color: white !important; margin-left: 70px; transition: margin-left 0.25s ease-in-out;">

    <div id="dashboard" class="container-fluid py-4 px-4">
        <!-- Admin Greeting -->
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-md-6 pt-3 pt-md-4 heading" style="padding-left: 35px">
                Hello, <span style="color: var(--darkColor)">Admin!</span>
            </div>
        </div>

        <!-- User Statistics -->
        <div id="userStatistics" class="container-fluid py-4 px-4 mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="subheading mb-3">USER STATISTICS</div>
                    <hr style="border-top: 2px solid #fff; margin: 1rem 0 2rem 0; opacity: 1;">
                </div>
            </div>

            <div class="card user-card rounded-4">
                <div class="row text-center m-3">
                    <!-- Total Users -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <p class="heading">100</p>
                        <h6 class="pb-2">TOTAL USERS</h6>
                    </div>
                    <!-- Active Users -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <p class="heading">80</p>
                        <h6 class="pb-2">ACTIVE USERS</h6>
                    </div>
                    <!-- Inactive Users -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <p class="heading">20</p>
                        <h6 class="pb-2">INACTIVE USERS</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard -->
        <div class="container-fluid py-4 px-4">
            <div class="row">
                <div class="col-12">
                    <div class="subheading">WEBSITE ENGAGEMENT</div>
                    <hr style="border-top: 2px solid #fff; margin: 1rem 0 2rem 0; opacity: 1;">
                </div>

                <!-- Monthly User Signups Section -->
                <div class="row p-md-4">
                    <div class="col-12 mt-4 mt-lg-2 mb-2">
                        <div class="paragraph mb-2"><b>MONTHLY USER SIGNUPS</b></div>
                        <div class="card-container mt-4">
                            <div class="p-4">
                                <div style="height: 400px; position: relative;">
                                    <canvas id="userSignupsChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Login Activity Section -->
                        <div class="paragraph mt-5"><b>MONTHLY LOGIN ACTIVITY</b></div>
                        <div class="card-container mt-4">
                            <div class="p-4">
                                <div style="height: 400px; position: relative;">
                                    <canvas id="loginActivityChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        // Chart.js
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            family: '"Lexend Exa", sans-serif',
                            size: 12
                        }
                    },
                    grid: {
                        color: 'white'
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            family: '"Lexend Exa", sans-serif',
                            size: 14
                        }
                    },
                    grid: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white',
                        font: {
                            family: '"Lexend Exa", sans-serif',
                            size: 16
                        }
                    },
                    grid: {
                        color: 'white'
                    }
                }
            }
        };

        const signupData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Signups',
                data: [65, 9, 89, 81, 56, 55, 70],
                backgroundColor: '#ffc09f',
                borderColor: '#39914f',
                borderWidth: 1,
            }]
        };

        const loginData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Logins',
                data: [45, 52, 60, 89, 40, 55, 80],
                backgroundColor: '#ffee93',
                borderColor: '#39914f',
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