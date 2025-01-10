<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/settings.css">
</head>
<body>

 <!-- BACKGROUND -->
    <div>
      <img src="assets/images/background.png" class="bg-image">
    </div>

<div class="content">
    <h2>ACCOUNT INFORMATION</h2>
    <form>
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter your username" required>
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="button" class="btn btn-primary rounded-pill w-100 my-3">Save</button>
    </form>

    <h2>CHANGE YOUR PASSWORD</h2>
    <form>
        <label>Current Password</label>
        <input type="password" name="current_password" placeholder="Enter current password" required>
        <label>New Password</label>
        <input type="password" name="new_password" placeholder="Enter new password" required>
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm new password" required>
        <button type="button" class="btn btn-primary rounded-pill w-100 my-3">Save</button>
    </form>

    <h2>DELETE YOUR ACCOUNT</h2>
    <form>
        <p>Once deleted, your account cannot be recovered.</p>
        <button type="button" class="btn btn-outline-primary rounded-pill w-100 my-3">Delete</button>
    </form>
</div>

</body>
</html>
