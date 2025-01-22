<?php

include ("assets/php/functions.php");

session_start();
userAuth();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404</title>
    <link rel="icon" href="assets/images/pesobuddy_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/404.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
</head>

<body class="min-vh-100" style="background-image: url('assets/images/404-bg.png'); background-size: cover; background-repeat: no-repeat; margin: 0; padding: 0;">
    
    <img src="assets/images/404-pig.png" alt="404 Pig" class="position-fixed top-0 start-0 w-100 h-100" style="object-fit: cover; z-index: -1;">

    <div class="container min-vh-100 d-flex align-items-center justify-content-center me-5 position-relative" 
         style="font: var(--primaryFont); padding-top: 80px; z-index: 1;">
        <div class="row align-items-center w-100">
            <div class="col-md-6 d-none d-md-block"></div>

            <div class="col-md-6 text-center">
                <h1 class="heading text-black mb-3" data-aos="fade-up" data-aos-duration="1000">The page isn't in the vault</h1>
                <div class="d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <span class="me-1 display-1" style="font-size: 8rem;">4</span>
                    <img src="assets/images/404-Coin.png" alt="Error" class="img-fluid" style="max-height: 100px;">
                    <span class="ms-1 display-1" style="font-size: 8rem;">4</span>
                </div>
                <div class="paragraph text-black mb-5 mt-3" style="font-size: 1.2rem;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    Don't worry, your accounts are safe. Here's how you can navigate back
                </div>
                <div class="mt-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <a href="home.php" class="btn btn-primary text-white px-3 py-2 me-2">Back To Home</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>