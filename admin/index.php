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
                    <a href="#dashboard" class="sidebar-link active">
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="users.php" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="categories.php" class="sidebar-link">
                        <i class="bi bi-list"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item mt-auto">
                    <a href="settings.php" class="sidebar-link">
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
                <li><a href="#dashboard" class="sidebar-link active"><i class="bi bi-bar-chart-line"></i> Dashboard</a></li>
                <li><a href="users.php"><i class="bi bi-person"></i> Users</a></li>
                <li><a href="categories.php"><i class="bi bi-list"></i> Categories</a></li>
                <li><a href="settings.php"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a href="#logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
        </div>
    </div>

        <!-- Main Content -->
        <div class="main" style="margin-left: 70px; transition: margin-left 0.25s ease-in-out;">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
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