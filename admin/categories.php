<?php

include("authorization.php");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Admin Categories</title>
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

        <!-- Manage Categories -->
        <div id="categories" class="container-fluid">
            <div class="row pt-4 p-md-4">

                <!-- Heading -->
                <div class="col-12">
                    <div class="heading text-center text-sm-start">MANAGE CATEGORIES</div>
                </div>

                <!-- Add Button -->
                <div class="col-12 d-flex justify-content-center justify-content-lg-end my-2">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDefaultCategory">
                        + ADD CATEGORY
                    </a>
                </div>

                <!-- Subheading -->
                <div class="col-12 mt-4 mt-lg-2 mb-2">
                    <div class="subheading">DEFAULT CATEGORIES</div>
                </div>

                <!-- Default Category Table -->
                <div class="col-12">
                    <div class="card card-container p-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless m-0">
                                    <thead class="text-center align-middle">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">CATEGORY</th>
                                            <th scope="col">TYPE</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Category Row -->
                                        <tr class="text-center align-middle">
                                            <td scope="row">1</td>
                                            <td>Income</td>
                                            <td>Salary</td>
                                            <td class="text-end">
                                                <!-- Options Dropdown -->
                                                <div class="dropdown dropstart">
                                                    <button class="btn options-btn p-1" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item option-dropdown"
                                                                data-bs-toggle="modal" data-bs-target="#editCategory"
                                                                style="text-decoration: none;">
                                                                <i class="bi bi-pencil-square px-1"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item option-dropdown"
                                                                data-bs-toggle="modal" data-bs-target="#deleteCategory"
                                                                style="color: red; text-decoration: none;">
                                                                <i class="bi bi-trash3 px-1"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Category Row -->
                                        <tr class="text-center align-middle">
                                            <td scope="row">2</td>
                                            <td>Expense</td>
                                            <td>Rent</td>
                                            <td class="text-end">
                                                <!-- Options Dropdown -->
                                                <div class="dropdown dropstart">
                                                    <button class="btn options-btn p-1" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item option-dropdown"
                                                                data-bs-toggle="modal" data-bs-target="#editCategory"
                                                                style="text-decoration: none;">
                                                                <i class="bi bi-pencil-square px-1"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item option-dropdown"
                                                                data-bs-toggle="modal" data-bs-target="#deleteCategory"
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

        <!-- User Categories -->
        <div class="container-fluid">
            <div class="row pt-5 pt-md-0 px-md-4">
                <div class="col-12">
                    <div class="subheading">USER-SPECIFIC LIST OF CATEGORIES</div>
                    <hr>
                    <ul class="list-unstyled">
                        <li>Grocery</li>
                        <li>Transportation</li>
                        <li>Food</li>
                    </ul>
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