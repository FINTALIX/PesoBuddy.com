<?php

include ("../assets/php/functions.php");

session_start();
adminAuth();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Admin | View User</title>
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

        <!-- View User -->
        <div class="container-fluid">
            <div class="row pt-5 p-md-4">

                <!-- Back to user's page -->
                <div class="col-12">
                    <a href="users.php">
                        <div class="text-center text-sm-start pb-3" style="color:#616161; text-decoration:underline;"><i
                                class="bi bi-arrow-left"></i>
                            <b>Go back to users page</b>
                        </div>
                    </a>
                </div>

                <!-- Heading -->
                <div class="col-12 my-3">
                    <div class="heading text-center text-sm-start"><span style="color: #1A7431;">USER ID:</span> 001
                    </div>
                </div>

                <div class="col-12 my-3">
                    <div class="row mb-4 px-2 d-flex justify-content-center align-items-center">
                        <div class="card stat-card w-100">
                            <div class="row py-2">
                                <!-- Profile Picture -->
                                <div class="col-12 col-md-2 p-2 d-flex justify-content-center align-items-center">
                                    <img src="../assets/images/pesobuddy_icon.png" alt="Profile Picture"
                                        class="rounded-circle img-fluid" width="150" height="140">
                                </div>
                                <!-- User's Information -->
                                <div class="col-12 col-md-10 pt-3 d-flex justify-content-start align-items-center">
                                    <ul class="list-unstyled">
                                        <li><b>John Doe</b></li>
                                        <li><i>john_doe</i></li>
                                        <br>
                                        <li><b>Birthday:</b> May 18, 2004</li>
                                        <li><b>Email:</b> john_doe@gmail.com</li>
                                        <li><b>Status:</b> Active</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Login Table -->
                <div class="col-12 mb-2">
                    <div><b>Recent Login:</b></div>
                </div>

                <div class="col-12">
                    <div class="card card-container p-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless m-0">
                                    <thead class="text-center align-middle">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">DATE</th>
                                            <th scope="col">TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Category Row -->
                                        <tr class="text-center align-middle">
                                            <td scope="row">1</td>
                                            <td>September 26, 2024</td>
                                            <td>10:45 AM</td>
                                        </tr>

                                        <!-- Category Row -->
                                        <tr class="text-center align-middle">
                                            <td scope="row">2</td>
                                            <td>July 23, 2024</td>
                                            <td>11:30 AM</td>
                                        </tr>
                                    </tbody>
                                </table>
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
</body>

</html>