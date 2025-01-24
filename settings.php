<?php

include("assets/php/processes/functions.php");
include("connect.php");

session_start();
userAuth();

$error = "";
$userID = $_SESSION['userID'];

$personalInfoQuery="SELECT * FROM userS WHERE userID=$userID";
$personalInfoResults= executeQuery($personalInfoQuery);

include("assets/php/processes/imageProcessProfile.php");
include("assets/php/processes/imageProcessLogo.php");
include("assets/php/processes/deleteProfileProcess.php");

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
        $error = "Passwords 8";
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
    <link rel="icon" href="assets/images/websiteLogo/<?php echo $websiteLogo?>" />
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
        <?php include('assets/php/modals/upload-profilePicture-modal.php');?>

        <!-- Remove Profile Pic Modal -->
        <?php include('assets/php/modals/delete-profilePicture-modal.php');?>

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
        <?php include('assets/php/modals/delete-account-modal.php');?>

        <!-- Footer -->
        <div class="row mt-4">
            <div class="col-12">
                <hr>
                <div class="d-flex justify-content-between">
                    <a href="https://github.com/FINTALIX" target="_blank" class="text-decoration-none paragraph" style="color: var(--primaryColor)">CONTACT
                        US</a>
                    <span class="paragraph">FINTALIX ©2025</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const alert = document.getElementById('alert');

        if (error) {
            alert.textContent = 
                error === 'Old Password'
                    ? 'Old password does not match.'
                    : error === 'Passwords do not match'
                    ? 'Passwords do not match.'
                    : error === 'Passwords 8'
                    ? 'Passwords is not 8 characters long.'
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