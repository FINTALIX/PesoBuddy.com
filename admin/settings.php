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

        <!-- Settings -->
        <div class="col-12" style="padding-left: 25px">
            <div class="col-12 col-md-6 pt-3 pt-md-4 heading">SETTINGS</div>
        </div>

        <div id="settings" class="container-fluid py-4 px-4">
            <div class="row">
                <div class="col-12">
                    <div class="subheading mb-2">ACCOUNT SETTINGS</div>
                    <hr style="border-top: 2px solid #000; margin: 1rem 0 2rem 0; opacity: 1;">
                </div>
            </div>
        </div>

        <!-- Change Username -->
        <div class="col-12 mb-3 px-5">
            <p class="subheading"><b>Change Username</b></p>
        </div>

        <!-- Change Username Card -->
        <div class="card settings-card rounded-4 mb-5">
            <div class="card-body d-flex flex-column">
                <form>
                    <div class="mb-3">
                        <div class="row g-1">
                            <div class="col-md-3 col-lg-2 d-flex align-items-center">
                                <label class="form-label mb-2 paragraph"><b>Username</b></label>
                            </div>
                            <div class="col-md-9 col-lg-10 mb-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mx-auto d-block">Save Username</button>
                </form>
            </div>
        </div>

        <!-- Change Password -->
        <div class="col-12 mb-3 px-5">
            <p class="subheading"><b>Change Password</b></p>
        </div>

        <!-- Change Password Card -->
        <div class="card settings-card rounded-4 mb-5">
            <div class="card-body d-flex flex-column">
                <form>
                    <div class="mb-3">
                        <label class="form-label paragraph"><b>Current Password</b></label>
                        <div class="row mb-4">
                            <div class="col-md-6 col-12">
                                <input type="text" class="form-control w-100">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label paragraph"><b>New Password</b></label>
                            <input type="text" class="form-control w-100">
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label paragraph"><b>Confirm Password</b></label>
                            <input type="text" class="form-control w-100">
                        </div>
                    </div>
                    <button class="btn btn-primary mx-auto d-block">Save Password</button>
                </form>
            </div>
        </div>

        <!-- Settings -->
        <div id="settings" class="container-fluid">
            <div class="row pt-4 p-md-4">
                <div class="col-12">
                    <h2 class="heading text-center text-sm-start">WEBSITE SETTINGS</h2>
                    <hr class="my-4">
                </div>
            </div>

            <div class="row">
                <div
                    class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-lg-start gap-3 ps-lg-5 mb-4">
                    <div class="website-logo">
                        <img src="../assets/images/pesobuddy_icon.png" alt="Website Logo" class="rounded-circle"
                            width="100" height="100" style="object-fit: cover;">
                    </div>
                    <h3 class="subheading mb-0">Website Logo</h3>
                </div>
                <div
                    class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-lg-end gap-3 pe-lg-5">
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#changeLogoModal">Change</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadLogoModal">Upload
                        New</button>
                </div>
            </div>
        </div>

        <!-- Change Logo Modal -->
        <div class="modal fade" id="changeLogoModal" tabindex="-1" aria-labelledby="changeLogoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-white rounded-4">
                    <div class="modal-header border-0 d-flex flex-column align-items-center">
                        <h5 class="modal-title text-black text-uppercase" id="changeLogoModalLabel">Change Logo</h5>
                        <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2 bg-transparent"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form id="uploadForm" enctype="multipart/form-data" class="text-center">
                            <div class="d-flex flex-column gap-3">
                                <div class="flex-grow-1 mt-2">
                                    <div
                                        class="d-flex flex-column flex-md-row gap-1 gap-md-0 justify-content-center align-items-center">
                                        <input type="text" id="fileNameDisplay"
                                            class="form-control text-black bg-transparent rounded-2"
                                            value="sampleimg.png" readonly style="width: 250px;">
                                        <label
                                            class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                            for="fileInput">
                                            Browse<i class="bi-upload ms-2"></i>
                                        </label>
                                        <input type="file" class="d-none" id="fileInput" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-2">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="uploadForm" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Logo Modal -->
        <div class="modal fade" id="uploadLogoModal" tabindex="-1" aria-labelledby="uploadLogoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-white rounded-4">
                    <div class="modal-header border-0 d-flex flex-column align-items-center">
                        <h5 class="modal-title text-black text-uppercase" id="uploadLogoModalLabel">Upload Logo</h5>
                        <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2 bg-transparent"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="uploadForm" enctype="multipart/form-data">
                            <div class="d-flex gap-3">
                                <div class="text-center">
                                    <div class="rounded-circle overflow-hidden bg-black"
                                        style="width: 120px; height: 120px;">
                                        <img id="previewImage" src="../assets/images/pesobuddy_icon.png"
                                            alt="Current Photo" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <p class="text-black mt-2 mb-0 small text-nowrap">Current Photo</p>
                                </div>

                                <div class="flex-grow-1 mt-5">
                                    <div class="d-flex flex-column flex-md-row gap-1 gap-md-0">
                                        <input type="text" id="fileNameDisplay"
                                            class="form-control text-black bg-transparent rounded-2"
                                            value="newimage.png" readonly>
                                        <label
                                            class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                            for="fileInput">
                                            Browse<i class="bi-upload ms-2"></i>
                                        </label>
                                        <input type="file" class="d-none" id="fileInput" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="uploadForm" class="btn btn-primary">Save</button>
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