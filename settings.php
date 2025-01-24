<?php

include("assets/php/functions.php");
include("connect.php");

session_start();
userAuth();

$error = "";
$userID = $_SESSION['userID'];

$personalInfoQuery="SELECT * FROM userS WHERE userID=$userID";
$personalInfoResults= executeQuery($personalInfoQuery);

include("assets/php/imageProcess.php");

//Deletion of Profile Picture
if(isset($_POST['btnDeleteProfilePic'])){
    $updateProfileQuery = "UPDATE users SET profilePicture = NULL WHERE userID = $userID";
        executeQuery($updateProfileQuery);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

//updating Fullname and birthday
if(isset($_POST['btnProfile'])){ 
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $birthday=$_POST['birthday'];

    if (!empty($firstName) && !empty($lastName) && !empty($birthday)) {
    $updatePersonalInfoQuery="UPDATE users SET `firstName`='$firstName',`lastName`='$lastName', `birthday`='$birthday'  WHERE userID=$userID";
    executeQuery($updatePersonalInfoQuery);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
    }
}

//updating username and email
if(isset($_POST['btnAccountInfo'])){
    $username=$_POST['username'];
    $email=$_POST['email'];

    if (!empty($username) && !empty($email)) {
    $updatePersonalInfoQuery="UPDATE users SET `username`='$username',`email`='$email' WHERE userID = $userID";
    executeQuery($updatePersonalInfoQuery);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
    }
}

//updating password
if (isset($_POST['btnChangePassword'])) {
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    // Fetch the current password from the database
    $currentpassword = ""; 
    while ($row = mysqli_fetch_assoc($personalInfoResults)) {
        $currentpassword = $row['password'];
    }

    // Validation
    if ($oldpassword != $currentpassword) {
        $error = "Old Password";
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($error));
        exit();

    } elseif ($newpassword != $confirmpassword) {
        $error = "Passwords do not match";
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($error));
        exit();
    } elseif (strlen($newpassword) < 8) {
        $error = "Passwords do not match";
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($error));
        exit();
    }
     else {
        // Update password in the database
        $error = "success";
        $updatePersonalInfoQuery = "UPDATE users SET `password`='$newpassword' WHERE userID = $userID";
        executeQuery($updatePersonalInfoQuery);
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($error));
        exit();
    }
}

//Account Deletion
if(isset($_POST['btnAccountDelete'])){
    $deleteAccountQuery="DELETE FROM users WHERE userID = $userID";
    executeQuery($deleteAccountQuery);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <link rel="icon" href="assets/images/pesobuddy_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include('assets/shared/navbar.php'); ?>
    <?php if(mysqli_num_rows($personalInfoResults)>0){
        while($personalInfoRows=mysqli_fetch_assoc($personalInfoResults)){
    ?>    

    <div class="container-fluid px-3 px-md-5 py-5">
        <!-- Header Navigation -->
        <div class="row mb-4 mt-5 align-items-center justify-content-between px-2">
            <div class="col-12 col-md-6 pt-3 pt-md-4 order-2 order-md-1">
                <h1 class="heading mb-0">SETTINGS</h1>
            </div>

            <div class="col-12 col-md-auto d-flex flex-row align-items-center pt-3 pt-md-4 order-1 order-md-2">
                <div class="col-auto text-md-end">
                    <span class="subheading" style="color:#1A7431;"><?php echo strtoupper(date('l')); ?></span><br><?php echo date("F d, Y"); ?>
                </div>

                <div class="col-auto px-3 d-none d-md-block">
                    <div style="width: 1px; background-color: black; height: 40px;"></div>
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
                            <img id="profilePreview" src="./assets/images/userProfile/<?php echo $profilePicture?>"
                                alt="Profile Picture" class="rounded-circle mb-3" style="width: 250px; height: 250px; object-fit: cover;">
                            <div class="d-flex flex-column flex-md-row flex-sm-row justify-content-center gap-4 mb-4">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#uploadProfilePic">Upload Profile Picture</button>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#removeProfilePic">Remove Profile Picture</button>
                            </div>
                        </div>
                        <form method="POST" class="flex-grow-1 d-flex flex-column">
                            <div class="row mb-5">
                                <div class="col-12">
                                    <label class="paragraph form-label">First Name</label>
                                    <input type="text" class="form-control form-control-lg" name="firstName" value="<?php echo $personalInfoRows['firstName']?>">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="paragraph form-label">Last Name</label>
                                <input type="text" class="form-control form-control-lg" name="lastName" value="<?php echo $personalInfoRows['lastName']?>">
                            </div>
                            <div class="mb-5">
                                <label class="paragraph form-label">Birthday</label>
                                <input type="date" class="form-control form-control-lg" name="birthday" value="<?php echo date("Y-m-d", strtotime($personalInfoRows['birthday']))?>">
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary btn-lg rounded-pill" type="submit" name="btnProfile">SAVE</button>
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
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="paragraph form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $personalInfoRows['username']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="paragraph form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $personalInfoRows['email']?>">
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary rounded-pill" type="submit" name="btnAccountInfo">SAVE</button>
                                </div>
                            </form>
                        </div>

                        <!-- Change Password -->
                        <div class="mb-4">
                            <h5 class="subheading mb-2">CHANGE YOUR PASSWORD</h5>
                            <hr class="mb-3">
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="paragraph form-label">Current Password</label>
                                    <input type="password" class="form-control" name="oldpassword" value="">
                                </div>
                                <div class="mb-3">
                                    <label class="paragraph form-label">New Password</label>
                                    <input type="password" class="form-control" name="newpassword">
                                </div>
                                <div class="mb-3">
                                    <label class="paragraph form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmpassword">
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary rounded-pill" type="submit" name="btnChangePassword">SAVE</button>
                                </div>
                                
                                <!-- Alert for incorrect password change -->
                                <div id="alert-container" class="row justify-content-center mt-2">
                                    <div class="col-12">
                                        <div id="alert" class="alert" role="alert"></div>
                                    </div>
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
                                <button class="btn btn-danger rounded-pill align-self-end" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccountModal">DELETE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
             }
            }
        ?>
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
                        <form id="uploadProfile" enctype="multipart/form-data" method="POST">
                            <div class="d-flex flex-column align-items-center gap-3">
                                <div class="text-center">
                                    <div class="rounded-circle overflow-hidden bg-black"
                                        style="width: 120px; height: 120px;">
                                        <img id="profilePreview2" src="./assets/images/userProfile/<?php echo $profilePicture?>"
                                            alt="Current Photo" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" id="fileNameDisplay"
                                        class="form-control text-black bg-transparent rounded-2" value=""
                                        readonly style="max-width: 350px; width: 100%;">
                                    <label
                                        class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                        for="fileInput">
                                        Browse<i class="bi-upload ms-2"></i>
                                    </label>
                                    <input type="file" class="d-none" id="fileInput" accept="image/*" name="profilePic">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-2">
                        <button type="submit" form="uploadProfile"
                            class="btn btn-primary text-uppercase align-self-center" name="btnUploadProfile">Upload</button>
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
                    <form method="POST">
                        <button type="submit" name="btnDeleteProfilePic" class="btn btn-light paragraph" data-bs-dismiss="modal">
                            Close
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 15px; background-color: white;">
                    <div style="position: relative; padding: 1rem;">
                        <!-- Title -->
                        <h4 class="modal-title heading text-black" id="deleteAccountModalLabel"
                            style="margin: 0; font-size: 26px;">
                            DELETE ACCOUNT
                        </h4>

                        <!-- Close button -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="position: absolute; top: 26px; right: 40px; transform: translateX(26px);">
                        </button>

                        <!-- Card content -->
                        <div class="card"
                            style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                            <p class="paragraph" style="margin: 0;">LAST WARNING!
                            </p>
                            <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                                If you decided to delete your account, all data related to it will also be deleted.
                            </p>
                        </div>

                        <!-- Footer buttons -->
                        <div class="modal-footer d-flex justify-content-end" style="border: none;">
                            <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                                style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-danger paragraph" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteAccountModal" style="color: white; margin-left: 0.5rem;">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirm Delete Account Modal -->
        <div class="modal fade" id="confirmDeleteAccountModal" tabindex="-1"
            aria-labelledby="confirmDeleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"
                    style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                    <div class="modal-header" style="border: none;">
                        <h4 class="modal-title heading text-center w-100" id="confirmDeleteAccountModalLabel"
                            style="margin: 0;"> Account Deleted
                        </h4>
                    </div>
                    <div class="modal-body text-center">This account has been successfully deleted.
                    You have been logged out and will be redirected to the login page.
                    </div>
                    <div class="modal-footer d-flex justify-content-center" style="border: none;">
                        <form method="POST">
                        <button type="submit" name="btnAccountDelete" class="btn btn-light paragraph" data-bs-dismiss="modal">
                            Close
                        </button>
                        </form>
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
    <script>
        const fileInput = document.getElementById('fileInput');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const profilePreview = document.getElementById('profilePreview');
        const profilePreview2 = document.getElementById('profilePreview2');

        fileInput.addEventListener('change', function () {
            if (this.files && this.files.length > 0) {
                fileNameDisplay.value = this.files[0].name;

                const reader = new FileReader();
                reader.onload = function (e) {
                    profilePreview.src = e.target.result; 
                    profilePreview2.src = e.target.result; 
                };
                reader.readAsDataURL(this.files[0]); 
            }
        });

        
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const alert = document.getElementById('alert');

        if (error) {
            alert.textContent = 
                error === 'Old Password'
                    ? 'Old password does not match.'
                    : error === 'Passwords do not match'
                    ? 'Passwords do not match and it is not 8 characters long.'
                    : 'Password updated successfully.';
            alert.className = 
                error === 'success'
                    ? 'alert alert-success'
                    : 'alert alert-warning';
        } else {
            alert.classList.add('d-none'); 
        }

        history.replaceState(null, document.title, window.location.pathname);
    </script>
</body>

</html>