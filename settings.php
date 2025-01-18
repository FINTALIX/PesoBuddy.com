<?php

session_start();

if (isset($_SESSION['userID']) && $_SESSION['role'] == 'user') {
} else {
    header("location:index.php");   
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
                            <button class="btn btn-primary">Upload Profile Picture</button>
                            <button class="btn btn-primary">Remove Profile Picture</button>
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