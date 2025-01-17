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
    <div class="main px-2 px-md-0" style="margin-left: 70px; transition: margin-left 0.25s ease-in-out;">
        <!-- Dashboard -->
        <div id="dashboard" class="container-fluid">
            <div class="row pt-4 p-md-4">
                <div class="col-12">
                    <h2 class="heading">WEBSITE ENGAGEMENT</h2>
                    <hr class="my-4">
                </div>
            </div>

            <!-- Monthly User Signups Section -->
            <div class="row p-md-4">
                <div class="col-12">
                    <h2 class="subheading mb-3">MONTHLY USER SIGNUPS</h2>
                    <div class="card-container bg-white mt-4">
                        <div class="p-4">
                            <div style="height: 400px; position: relative;">
                                <canvas id="userSignupsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Login Activity Section -->
            <div class="row p-md-4">
                <div class="col-12">
                    <h3 class="subheading mb-3">Monthly Login Activity</h3>
                    <div class="card-container bg-white mb-4">
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