<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/adminsettings.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-start">SETTINGS</h1>
        <div class="section mb-4">
            <h2>ACCOUNT SETTINGS</h2>
            <div class="thin-line"></div>
            <label class="outer-label">Change Username</label>
            <div class="section-inner">
                <div class="username-input">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control">
                </div>
                <button class="btn btn-success d-block mx-auto">Save Username</button>
            </div>
        </div>

        <div class="section mb-4">
            <h2>CHANGE PASSWORD</h2>
            <div class="section-inner">
                <div class="password-section">
                    <div class="w-100">
                        <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" class="form-control">
                    </div>
                    <div class="password-row">
                        <div class="w-100">
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password" class="form-control">
                        </div>
                        <div class="w-100 ms-2">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-success d-block mx-auto">Save Password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
