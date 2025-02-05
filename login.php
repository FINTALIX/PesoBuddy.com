<?php
include("connect.php");

session_start();
session_destroy();
session_start();

include("assets/php/processes/loginProcess.php");
include("assets/php/processes/imageProcessLogo.php");
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PesoBuddy | Login</title>
  <link rel="icon" href="assets/images/websiteLogo/<?php echo $websiteLogo?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center">
  <div class="container py-5 p-sm-5 d-flex align-items-center" style="height: 100%;">
    <div class="row justify-content-center">
      <!-- BACKGROUND -->
      <div>
        <img src="assets/images/background.png" class="bg-image">
      </div>

      <!-- LOGIN CARD -->
      <div class="col-12 col-md-9 col-lg-7 col-xl-5 order-2 order-xl-1">
        <div class="card shadow-sm py-3">
          <div class="h3 text-center fw-bold my-4">
            LOGIN
          </div>

          <!-- Alert for incorrect login -->
          <?php if ($error == "INVALID USER") { ?>
            <div class="row justify-content-center mt-2">
              <div class="col-12">
                <div class="alert alert-warning m-0" role="alert">
                  <p class="paragraph text-center m-0">Invalid Email or Password.</p>
                </div>
              </div>
            </div>
          <?php } ?>

          <!-- LOGIN FORM -->
          <form method="POST">
            <!-- Username or Email -->
            <input class="form-control text-center my-4" type="text" name="userName" placeholder="Username or Email"
              required>
            <!-- Password -->
            <input class="form-control text-center my-4" type="password" name="password" placeholder="Password"
              required>
            <!-- Login Button -->
            <button class="btn btn-primary rounded-pill w-100 my-3" name="btnLogin">LOGIN</button>
          </form>

          <!-- REGISTRATION BUTTON -->
          <hr>
          <div class="h6 text-center fw-bold mt-4">
            New here?
          </div>
          <a href="register.php" class="btn btn-outline-primary rounded-pill w-100 mb-4">REGISTER</a>
        </div>
      </div>

      <!-- WEBSITE BRAND -->
      <div class="col-12 col-md-9 col-lg-7 col-xl-7 order-1 order-xl-2">
        <img src="assets/images/pesobuddy_logo.png" class="img-fluid text-center pb-xl-3" alt="PesoBuddy">
      </div>
    </div>
  </div>

  <?php include('assets/shared/footer.php');?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>