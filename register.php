<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy|Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- START HERE -->
    <div class="content">
        <h1>PesoBuddy</h1>
        <p>Your Reliable Partner for Financial Guidance</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante
            dapibus diam. Sed nisi.</p>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-left">
            <p>CONTACT US</p>
        </div>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><img src="assets/images/facebook.png" alt="Facebook"></a>
            <a href="https://instagram.com" target="_blank"><img src="assets/images/instagram.png" alt="Instagram"></a>
            <a href="https://twitter.com" target="_blank"><img src="assets/images/twitter.png" alt="Twitter"></a>
            <a href="https://github.com" target="_blank"><img src="assets/images/github.png" alt="GitHub"></a>
            <img src="assets/images/fintalix-logo.webp" alt="Fintalix Logo">
        </div>
        <div class="footer-right">
            <p>FINTALIX &copy; 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PesoBuddy | Registration</title>
  <link rel="icon" href="assets/images/pesobuddy_icon.png"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/register.css" rel="stylesheet">
</head>

<body>
  <div class="container p-5">
    <div class="row justify-content-center">
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

          <!-- Alert for same user credentials -->
          <!-- <div class="row justify-content-center mt-2">
            <div class="col-12">
              <div class="alert alert-warning" role="alert">
                Username already exists.
              </div>
            </div>
          </div> -->

          <!-- REGISTRATION FORM -->
          <form method="POST">
            <!-- Name -->
            <div class="row">
              <div class="col-6">
                <input class="form-control mt-2 mb-4" type="text" name="" placeholder="First Name" required>
              </div>
              <div class="col-6">
                <input class="form-control mt-2 mb-4" type="text" name="" placeholder="Last Name" required>
              </div>
            </div>

            <!-- Birthday -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-4" type="text" name="birthday" placeholder="Birthday" onfocus="(this.type='date')" required>
              </div>
            </div>

            <!-- Email -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-3" type="email" name="" placeholder="Email" required>
              </div>
            </div>

            <hr>

            <!-- Username -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mt-3 mb-4" type="text" name="" placeholder="Create Username" required>
              </div>
            </div>

            <!-- Password -->
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-4" type="password" name="" placeholder="Create a Password" required>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-2" type="password" name="" placeholder="Confirm Password" required>
              </div>
            </div>

            <!-- Register Button -->
            <div class="row">
              <div class="col text-center">
                <button class="btn btn-primary rounded-pill px-3 my-3" name="">CREATE</button>
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
