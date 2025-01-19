<?php
include("connect.php");

session_start();

$_SESSION['userID'] = "";
$_SESSION['userName'] = "";
$_SESSION['email'] = "";
$_SESSION['firstName'] = "";
$_SESSION['lastName'] = "";
$_SESSION['email'] = "";
$_SESSION['birthday'] = "";
$_SESSION['profilePicture'] = "";
$_SESSION['role'] = "";

$error = "";

if (isset($_POST['btnRegister'])) {
  $username = $_POST['userName'];
  $email = $_POST['email'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $birthday = $_POST['birthday'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
  $checkResult = executeQuery($checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    $error = "USER_EXISTS";
  } elseif ($password == $cpassword) {
    $lastInsertedId = mysqli_insert_id($conn);

    $userQuery = "INSERT INTO users(username, email, password, firstName, lastName, birthday)  VALUES ('$username', '$email', '$password', '$firstName', '$lastName', '$birthday')";
    executeQuery($userQuery);

    $lastInsertedId = mysqli_insert_id($conn);

    $_SESSION['userID'] = $lastInsertedId;
    $_SESSION['userName'] = $username;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['birthday'] = $birthday;
    $_SESSION['role'] = "user";


    header("Location: home.php");
  } else {
    $error = "PASSWORD UNMATCHED";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PesoBuddy | Registration</title>
  <link rel="icon" href="assets/images/pesobuddy_icon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/register.css" rel="stylesheet">
</head>

<body>
  <div class="container p-5">
    <div class="row justify-content-center">

      <?php if ($error == "PASSWORD UNMATCHED") { ?>
        <div class="alert alert-danger mb-3" role="alert">
          Passwords does not match
        </div>
      <?php } ?>

      <!-- Alert for same user credentials -->
      <?php if ($error == "USER_EXISTS") { ?>
        <div class="row justify-content-center mt-2">
          <div class="col-12">
            <div class="alert alert-warning" role="alert">
              Username or Email already exists.
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- BACKGROUND -->
      <div>
        <img src="assets/images/background.png" class="bg-image">
      </div>

      <!-- CARD -->
      <div class="col-12 col-lg-7 order-2 order-lg-1">
        <div class="card shadow-sm px-4 py-3">
          <div class="h4 text-center fw-bold my-4">
            CREATE ACCOUNT
          </div>

          <!-- REGISTRATION FORM -->
          <form method="POST">
            <!-- Name -->
            <div class="row">
              <div class="col-6">
                <input class="form-control mt-2 mb-4" type="text" name="firstName" placeholder="First Name" required>
              </div>
              <div class="col-6">
                <input class="form-control mt-2 mb-4" type="text" name="lastName" placeholder="Last Name" required>
              </div>
            </div>

            <!-- Birthday -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-4" type="text" name="birthday" placeholder="Birthday"
                  onfocus="(this.type='date')" required>
              </div>
            </div>

            <!-- Email -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
              </div>
            </div>

            <hr>

            <!-- Username -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mt-3 mb-4" type="text" name="userName" placeholder="Create Username"
                  required>
              </div>
            </div>

            <!-- Password -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-4" type="password" name="password" placeholder="Create a Password"
                  required>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-2" type="password" name="cpassword" placeholder="Confirm Password"
                  required>
              </div>
            </div>

            <!-- Register Button -->
            <div class="row">
              <div class="col text-center">
                <button class="btn btn-primary rounded-pill px-3 my-3" name="btnRegister">CREATE</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>