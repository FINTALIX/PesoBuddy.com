<?php

include("../connect.php");
include("../assets/php/functions.php");
include("../assets/php/classes.php");

session_start();
adminAuth();

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

                <!-- Admin Add Category Modal -->
                <div class="modal fade" id="addDefaultCategory" tabindex="-1" aria-labelledby="addDefaultCategoryLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content py-4 px-2"
                            style="border-radius: 15px; background-color: white; border: none;">
                            <div class="modal-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="heading" style="margin: 0;">ADD NEW CATEGORY
                                    </p>
                                    <!-- Close button -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form method="POST">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="defaultCategoryType"
                                            id="adminAddCategoryType" placeholder="Type">
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="defaultCategoryName"
                                            id="adminAddCategoryName" placeholder="Category">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary me-2"
                                                    style="background-color: var(--borderColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1rem;"
                                                    data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">
                                                    CANCEL
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="addCategory"
                                                    style="background-color: var(--primaryColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1.5rem;"
                                                    data-bs-target="#addSuccessModal" data-bs-toggle="modal"
                                                    data-bs-dismiss="modal">
                                                    SAVE
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success Modal -->
                <div class="modal fade" id="addSuccessModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"
                            style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                            <div class="modal-body p-4">
                                <h5 class="subheading text-uppercase">Category successfully added!</h5>
                                <button type="button" class="btn mt-3"
                                    style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
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
                                        <!-- Default Categories Row -->
                                        <?php echo $categoryManager->displayDefaultCategories(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div class="modal fade" id="editSuccessModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"
                    style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                    <div class="modal-body p-4">
                        <h5 class="subheading text-uppercase">Category successfully edited!</h5>
                        <button type="button" class="btn mt-3"
                            style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirm Admin Category Deletion Modal -->
        <div class="modal fade" id="confirmDeleteAccountModal" tabindex="-1" aria-labelledby="confirmDeleteAccountLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"
                    style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                    <div class="modal-header" style="border: none;">
                        <h4 class="modal-title heading text-center w-100" id="confirmDeleteModalLabel"
                            style="margin: 0;"> Category Deleted
                        </h4>
                    </div>
                    <div class="modal-body text-center">The category has been successfully
                        deleted.
                    </div>
                    <div class="modal-footer d-flex justify-content-center" style="border: none;">
                        <button type="button" class="btn btn-light paragraph" data-bs-dismiss="modal">
                            Close
                        </button>
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
                        <!-- User's Categories Row -->
                        <?php echo $categoryManager->displayCategories(); ?>
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