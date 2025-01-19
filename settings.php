<?php

include ("assets/php/functions.php");

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
    <link rel="stylesheet" href="assets/css/settings.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include('assets/shared/navbar.php'); ?>

    <div class="container py-5">
        <!-- Header Navigation -->
        <div class="row mb-4 mt-5">
            <div class="col-md-6">
                <h1 class="heading">SETTINGS</h1>
            </div>
            <div class="col-md-6 d-flex flex-row justify-content-md-end align-items-center">
                <div class="text-md-end">
                    <p class="paragraph mb-0" style="color: black;">JANUARY XX</p>
                    <p class="paragraph mb-0" style="color: #1A7431; font-weight: bold; text-transform: uppercase;">
                        FRIDAY</p>

                </div>
                <div class="col-auto px-3 d-none d-md-block">
                    <div style="width: 1px; background-color: black; height: 40px;"></div>
                </div>
            </div>
        </div>
        <!-- Header Divider -->
        <div class="section-divider mb-4"></div>

        <!-- Main Content -->
        <div class="row align-items-stretch">
            <!-- Left Column - Profile Section -->
            <div class="col-md-5 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="profile-picture-container">
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiByPSI0OCIgZmlsbD0iI2VlZSIvPjxwYXRoIGQ9Ik01MCAzNmExNCAxNCAwIDEgMCAwIDI4IDE0IDE0IDAgMCAwIDAtMjh6bTAgNDBjLTE2IDAtMzAgOC0zMCAyNGg2MGMwLTE2LTE0LTI0LTMwLTI0eiIgZmlsbD0iI2FhYSIvPjwvc3ZnPg=="
                                alt="Profile Picture" class="rounded-circle profile-picture">
                        </div>
                        <div class="profile-buttons">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#uploadProfilePic">
                                Upload Profile Picture
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#removeProfilePic">
                                Remove Profile Picture
                            </button>
                        </div>
                        <form>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control form-control-lg">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control form-control-lg">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Birthday</label>
                                <input type="date" class="form-control form-control-lg">
                            </div>
                            <button class="btn btn-primary btn-lg float-end rounded-pill">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Account Settings -->
            <div class="col-md-7 mb-4">
                <div class="card card-transparent h-100">
                    <div class="card-body d-flex flex-column">
                        <!-- Account Information -->
                        <div class="mb-4">
                            <h5 class="subheading mb-2">ACCOUNT INFORMATION</h5>
                            <div class="section-divider mb-3"></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label paragraph">Username</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label paragraph">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                                <button class="btn btn-primary float-end rounded-pill">SAVE</button>
                            </form>
                        </div>

                        <!-- Change Password -->
                        <div class="mb-4">
                            <h5 class="subheading mb-2">CHANGE YOUR PASSWORD</h5>
                            <div class="section-divider mb-3"></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label paragraph">Current Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label paragraph">New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label paragraph">Confirm Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <button class="btn btn-primary float-end rounded-pill">SAVE</button>
                            </form>
                        </div>

                        <!-- Delete Account -->
                        <div class="mt-auto">
                            <h5 class="subheading mb-2">DELETE YOUR ACCOUNT</h5>
                            <div class="section-divider mb-3"></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="paragraph mb-0">Once deleted, your account can no longer be retrieved.</p>
                                <button class="btn btn-primary rounded-pill">DELETE</button>
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
                        <p class="paragraph" style="margin: 0;">Are you sure you want to remove your profile picture?
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
    <div class="modal fade" id="confirmRemovePictureModal" tabindex="-1" aria-labelledby="confirmRemovePicModalLabel"
        aria-hidden="true">
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