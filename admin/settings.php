<?php
include ("../assets/php/functions.php");
include("../connect.php");

session_start();
adminAuth();

$error = "";
$userID = $_SESSION['userID'];

$personalInfoQuery="SELECT * FROM userS WHERE userID = $userID";
$personalInfoResults= executeQuery($personalInfoQuery);

//updating username
if(isset($_POST['btnUpdateUsername'])){
    $username=$_POST['username'];

    if (!empty($username))  {
        $updateUsernameQuery="UPDATE users SET `username`='$username' WHERE userID = $userID";
        executeQuery($updateUsernameQuery);
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

include("../assets/php/imageProcess.php");

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
    <?php if(mysqli_num_rows($personalInfoResults)>0){
        while($personalInfoRows=mysqli_fetch_assoc($personalInfoResults)){
    ?>  

    <!-- Main Content -->
    <div class="main px-2 px-md-0"
        style="background-color: #191919 !important; color: white !important; margin-left: 70px; transition: margin-left 0.25s ease-in-out;">

        <div id="settings" class="container-fluid">
            <div class="row pt-4 p-md-4">
                <!-- Settings -->
                <div class="col-12">
                    <div class="heading pb-5">SETTINGS</div>
                    <div class="subheading text-center text-sm-start">ACCOUNT SETTINGS</div>
                    <div>
                        <hr style="border-top: 2px solid #fff; margin: 1rem 0 2rem 0; opacity: 1;">
                    </div>
                </div>
            </div>
            <div class="row px-md-5 mx-md-3">
                <!-- Change Username Card -->
                <div class="col-12 pt-3">
                    <!-- Change Username -->
                    <div class="col-12">
                        <p class="subheading text-md-start text-center"><b>Change Username</b></p>
                    </div>
                    <div class="card stat-card rounded-4 mb-5">
                        <div class="card-body d-flex flex-column">
                            <form method="POST">
                                <div class="mb-4">
                                    <div class="row">
                                        <label class="form-label"><b>Username</b></label>
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control w-100 mb-3" name="username" value="<?php echo $personalInfoRows['username']?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="btnUpdateUsername" class="btn btn-primary d-block">Save Username</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Change Password Card -->
                <div class="col-12">
                    <!-- Change Password -->
                    <div class="col-12">
                        <p class="subheading text-md-start text-center"><b>Change Password</b></p>
                    </div>
                    <div class="card stat-card rounded-4 mb-5">
                        <div class="card-body d-flex flex-column">
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label paragraph"><b>Current Password</b></label>
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-12">
                                            <input type="password" class="form-control w-100" name = "oldpassword" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label paragraph"><b>New Password</b></label>
                                        <input type="password" class="form-control w-100 mb-3" name = "newpassword" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label paragraph"><b>Confirm Password</b></label>
                                        <input type="password" class="form-control w-100 mb-3" name = "confirmpassword" required>
                                    </div>
                                </div>
                                <button type="submit" name="btnChangePassword" class="btn btn-primary d-block">Save Password</button>

                                <!-- Alert for incorrect password change -->
                                <div id="alert-container" class="row justify-content-center mt-2">
                                    <div class="col-12">
                                        <div id="alert" class="alert" role="alert"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="container-fluid py-4 px-4">
            <div class="row">
                <div class="col-12">
                    <div class="subheading mb-2">WEBSITE SETTINGS</div>
                    <hr style="border-top: 2px solid #fff; margin: 1rem 0 2rem 0; opacity: 1;">
                </div>
            </div>

            <div class="row">
                <div
                    class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-lg-start gap-3 ps-lg-5 mb-4">
                    <div class="website-logo">
                        <img id="profilePreview"src="../assets/images/websiteLogo/<?php echo $websiteLogo?>" alt="Website Logo" class="rounded-circle"
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
                        <form id="uploadForm" enctype="multipart/form-data" class="text-center" method="POST">
                            <div class="row g-0 justify-content-center align-items-center flex-nowrap">
                                <div class="col-auto">
                                    <input type="text" id="fileNameDisplay"
                                        class="form-control text-black bg-transparent rounded-2" value=""
                                        readonly style="max-width: 220px;">
                                </div>
                                <div class="col-auto">
                                    <label
                                        class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                        for="fileInput" style="white-space: nowrap;">
                                        Browse<i class="bi-upload ms-2"></i>
                                    </label>
                                    <input type="file" class="d-none" id="fileInput" accept="image/*" name="websiteLogo">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-2">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="btnUploadLogo" form="uploadForm" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Logo Modal
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
                        <form id="uploadForm" enctype="multipart/form-data" method="POST">
                            <div class="d-flex gap-3">
                                <div class="text-center">
                                    <div class="rounded-circle overflow-hidden bg-black"
                                        style="width: 120px; height: 120px;">
                                        <img id="previewImage" src="/images/websiteLogo/<?php echo $websiteLogo?>"
                                            alt="Current Photo" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <p class="text-black mt-2 mb-0 small text-nowrap">Current Photo</p>
                                </div>

                                <div class="flex-grow-1 mt-5">
                                    <div class="d-flex flex-column flex-md-row gap-1 gap-md-0">
                                        <input type="text" id="fileNameDisplay"
                                            class="form-control text-black bg-transparent rounded-2" value=""
                                            readonly>
                                        <label
                                            class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                            for="fileInput">
                                            Browse<i class="bi-upload ms-2"></i>
                                        </label>
                                        <input type="file" class="d-none" id="fileInput" accept="image/*" name="websiteLogo">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="uploadForm" class="btn btn-primary" name="btnUploadLogo">Save</button>
                    </div>
                </div>
            </div>
        </div> -->
        <?php
             }
            }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

            <script>
        const fileInput = document.getElementById('fileInput');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const profilePreview = document.getElementById('profilePreview');
        const previewImage = document.getElementById('previewImage');

        fileInput.addEventListener('change', function () {
            if (this.files && this.files.length > 0) {
                fileNameDisplay.value = this.files[0].name;

                const reader = new FileReader();
                reader.onload = function (e) {
                    profilePreview.src = e.target.result; 
                    previewImage.src = e.target.result; 
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