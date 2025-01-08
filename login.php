<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PesoBuddy | Login</title>
  <link rel="icon" href="assets/images/pesobuddy_icon.png"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">
</head>

<body>
  <div class="container p-5">
    <div class="row">
      <!-- BACKGROUND -->
      <div>
        <img src="assets/images/background.png" class="bg-image">
      </div>

      <!-- LOGIN CARD -->
      <div class="col-12 col-lg-6 order-2 order-lg-1">
        <div class="card shadow-sm py-3">
          <div class="h3 text-center fw-bold my-4">
            LOGIN
          </div>

          <!-- LOGIN FORM -->
          <form method="POST">
            <!-- Username or Email -->
            <input class="form-control text-center my-4" type="text" name="" placeholder="Username or Email">
            <!-- Password -->
            <input class="form-control text-center my-4" type="password" name="password" placeholder="Password">
            <!-- Remember Me -->
            <div class="d-flex justify-content-center">
              <div class="form-check my-4">
                <input class="form-check-input" type="checkbox" name="" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember Me
                </label>
              </div>
            </div>
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
      <div class="col-12 col-lg-6 order-1 order-lg-2">
        <img src="assets/images/pesobuddy_logo.png" class="img-fluid text-center pb-3" alt="PesoBuddy">
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>