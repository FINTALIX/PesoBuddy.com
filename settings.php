<?php

include("assets/php/functions.php");

session_start();
userAuth();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <link rel="icon" href="assets/images/pesobuddy_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include('assets/shared/navbar.php'); ?>

    <div class="container-fluid px-3 px-md-5 py-5">
        <!-- Header Navigation -->
        <div class="row mb-4 mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="heading mb-0">SETTINGS</h1>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-end">
                            <p class="paragraph mb-0" style="text-transform: uppercase;">JANUARY XX</p>
                            <p class="paragraph mb-0"
                                style="color: var(--darkColor); font-weight: bold; text-transform: uppercase;">FRIDAY
                            </p>
                        </div>
                        <div class="px-3">
                            <div style="width: 1px; background-color: black; height: 25px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Divider -->
        <hr class="mb-4">

        <!-- Main Content -->
        <div class="row g-4">
            <!-- Left Column - Profile Section -->
            <div class="col-12 col-lg-5">
                <div class="card stat-card h-100">
                    <div class="card-body px-3 px-md-4 d-flex flex-column">
                        <div class="text-center mb-5">
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiByPSI0OCIgZmlsbD0iI2VlZSIvPjxwYXRoIGQ9Ik01MCAzNmExNCAxNCAwIDEgMCAwIDI4IDE0IDE0IDAgMCAwIDAtMjh6bTAgNDBjLTE2IDAtMzAgOC0zMCAyNGg2MGMwLTE2LTE0LTI0LTMwLTI0eiIgZmlsbD0iI2FhYSIvPjwvc3ZnPg=="
                                alt="Profile Picture" class="rounded-circle mb-3" style="width: 250px; height: 250px;">
                            <div class="d-flex flex-column flex-md-row flex-sm-row justify-content-center gap-4 mb-4">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#uploadProfilePic">Upload Profile Picture</button>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#removeProfilePic">Remove Profile Picture</button>
                            </div>
                        </div>
                        <form class="flex-grow-1 d-flex flex-column">
                            <div class="row mb-5">
                                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                                    <label class="paragraph form-label">First Name</label>
                                    <input type="text" class="form-control form-control-lg">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="paragraph form-label">Last Name</label>
                                    <input type="text" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="paragraph form-label">Phone Number</label>
                                <input type="tel" class="form-control form-control-lg">
                            </div>
                            <div class="mb-5">
                                <label class="paragraph form-label">Birthday</label>
                                <input type="date" class="form-control form-control-lg">
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary btn-lg rounded-pill">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Account Settings -->
            <div class="col-12 col-lg-7">
                <div class="card border-0 h-100" style="background-color: transparent;">
                    <div class="card-body px-3 px-md-4">
                        <!-- Account Information -->
                        <div class="mb-4">
                            <h5 class="subheading mb-2">ACCOUNT INFORMATION</h5>
                            <hr class="mb-3">
                            <form>
                                <div class="mb-3">
                                    <label class="paragraph form-label">Username</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="paragraph form-label">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary rounded-pill">SAVE</button>
                                </div>
                            </form>
                        </div>

                        <!-- Change Password -->
                        <div class="mb-4">
                            <h5 class="subheading mb-2">CHANGE YOUR PASSWORD</h5>
                            <hr class="mb-3">
                            <form>
                                <div class="mb-3">
                                    <label class="paragraph form-label">Current Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="paragraph form-label">New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="paragraph form-label">Confirm Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary rounded-pill">SAVE</button>
                                </div>
                            </form>
                        </div>

                        <!-- Delete Account -->
                        <div class="mt-auto">
                            <h5 class="subheading mb-2">DELETE YOUR ACCOUNT</h5>
                            <hr class="mb-3">
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                                <p class="paragraph mb-0">Once deleted, your account can no longer be retrieved.</p>
                                <button class="btn btn-primary rounded-pill align-self-end">DELETE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODALS -->
        <!-- Upload Logo Modal -->
        <div class="modal fade" id="uploadProfilePic" tabindex="-1" aria-labelledby="uploadProfilePicModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-white rounded-4">
                    <div class="modal-header border-0 d-flex flex-column align-items-center">
                        <h5 class="modal-title subheading text-black text-uppercase" id="uploadProfileModalLabel"
                            style="text-align: right; margin-right: 20px;">
                            <b>Upload Profile
                                Picture
                            </b>
                        </h5>
                        <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2 bg-transparent"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="uploadProfile" enctype="multipart/form-data">
                            <div class="d-flex flex-column align-items-center gap-3">
                                <div class="text-center">
                                    <div class="rounded-circle overflow-hidden bg-black"
                                        style="width: 120px; height: 120px;">
                                        <img id="previewImage" src="./assets/images/pesobuddy_icon.png"
                                            alt="Current Photo" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" id="fileNameDisplay"
                                        class="form-control text-black bg-transparent rounded-2" value="sampleimage.png"
                                        readonly style="max-width: 350px; width: 100%;">
                                    <label
                                        class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                        for="fileInput">
                                        Browse<i class="bi-upload ms-2"></i>
                                    </label>
                                    <input type="file" class="d-none" id="fileInput" accept="image/*">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-2">
                        <button type="submit" form="uploadProfile"
                            class="btn btn-primary text-uppercase align-self-center">Upload</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Remove Profile Pic Modal -->
        <div class="modal fade" id="removeProfilePic" tabindex="-1" aria-labelledby="removeProfilePicModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 15px; background-color: white;">
                    <div style="position: relative; padding: 1rem;">
                        <!-- Title -->
                        <h4 class="modal-title heading text-black" id="removeProfilePicModalLabel"
                            style="margin: 0; font-size: 26px;">
                            Remove Profile Picture </h4>

                        <!-- Close button -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="position: absolute; top: 26px; right: 40px; transform: translateX(26px);">
                        </button>

                        <!-- Card content -->
                        <div class="account-card"
                            style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                            <p class="paragraph" style="margin: 0;">Are you sure you want to remove your profile
                                picture?
                            </p>
                            <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                                If yes, your profile will be set to our default picture.
                            </p>
                        </div>

                        <!-- Footer buttons -->
                        <div class="modal-footer d-flex justify-content-end" style="border: none;">
                            <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                                style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-danger paragraph" data-bs-toggle="modal"
                                data-bs-target="#confirmRemovePictureModal" style="color: white; margin-left: 0.5rem;">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirm the deletion -->
        <div class="modal fade" id="confirmRemovePictureModal" tabindex="-1"
            aria-labelledby="confirmRemovePicModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"
                    style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                    <div class="modal-header" style="border: none;">
                        <h4 class="modal-title heading text-center w-100" id="confirmRemovePicModalLabel"
                            style="margin: 0;">
                            Profile Picture Removed
                        </h4>
                    </div>
                    <div class="modal-body text-center">
                        Your profile picture has been set to the default.
                    </div>
                    <div class="modal-footer d-flex justify-content-center" style="border: none;">
                        <button type="button" class="btn btn-light paragraph" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row mt-4">
            <div class="col-12">
                <hr>
                <div class="d-flex justify-content-between">
                    <a href="#" class="text-decoration-none paragraph" style="color: var(--primaryColor)">CONTACT
                        US</a>
                    <span class="paragraph">FINTALIX ©2025</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>