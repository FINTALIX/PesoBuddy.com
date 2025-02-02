<?php
include("connect.php");

session_start();

include("assets/php/processes/registerProcess.php");
include("assets/php/processes/imageProcessLogo.php");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PesoBuddy | Registration</title>
  <link rel="icon" href="assets/images/websiteLogo/<?php echo $websiteLogo?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/register.css" rel="stylesheet">
</head>

<body>
  <div class="container py-5 p-sm-5">
    <div class="row justify-content-center">
      <!-- Alert for not matching passwords -->
      <?php if ($error == "passwordUnmatched") { ?>
        <div class="row justify-content-center mt-2 p-0">
          <div class="col-12 col-lg-7">
            <div class="alert alert-warning" role="alert">
              <p class="paragraph m-0">Passwords do not match.</p>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- Alert for same user credentials -->
      <?php if ($error == "userExist") { ?>
        <div class="row justify-content-center mt-2 p-0">
          <div class="col-12 col-lg-7">
            <div class="alert alert-warning d-flex flex-column flex-md-row align-items-center justify-content-start justify-content-md-between" role="alert">
                <p class="paragraph my-1">Username or Email already exists.</p>
                <a href="login.php" class="btn btn-primary rounded-pill my-1">LOGIN</a>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- Alert for short password -->
      <?php if ($error == "passwordTooShort") { ?>
        <div class="row justify-content-center mt-2 p-0">
          <div class="col-12 col-lg-7">
            <div class="alert alert-warning" role="alert">
              <p class="paragraph m-0">Password is too short! It must be at least 8 characters.</p>
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
              <div class="col-12 col-6">
                <input class="form-control mt-2 mb-4" type="text" name="firstName" placeholder="First Name" value="<?php echo isset($_POST['btnRegister']) ? $firstName : ''; ?>" required>
              </div>
              <div class="col-12 col-6">
                <input class="form-control mt-2 mb-4" type="text" name="lastName" placeholder="Last Name" value="<?php echo isset($_POST['btnRegister']) ? $lastName : ''; ?>" required>
              </div>
            </div>

            <!-- Birthday -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-4" type="text" name="birthday" placeholder="Birthday"
                  onfocus="(this.type='date')" value="<?php echo isset($_POST['btnRegister']) ? $birthday : ''; ?>" required>
                </input>
              </div>
            </div>

            <!-- Email -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-3" type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['btnRegister']) ? $email : ''; ?>" required>
              </div>
            </div>

            <hr>

            <!-- Username -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mt-3 mb-4" type="text" name="userName" placeholder="Create Username"
                value="<?php echo isset($_POST['btnRegister']) ? $username : ''; ?>" required>
              </div>
            </div>

            <!-- Password -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-4" type="password" name="password" placeholder="Create a Password"
                value="<?php echo isset($_POST['btnRegister']) ? $password : ''; ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-2" type="password" name="cpassword" placeholder="Confirm Password"
                value="<?php echo isset($_POST['btnRegister']) ? $cpassword : ''; ?>" required>
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

  <?php include('assets/shared/footer.php');?>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>