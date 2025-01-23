<?php

include("../connect.php");
include("../assets/php/functions.php");
include("../assets/php/classes.php");

session_start();
adminAuth();

if(isset($_GET['id'])) {
    $userID = $_GET['id'];
    
    $userInfo = new User();
    $userInfo->queryUserInfo($userID);

    if(mysqli_num_rows($userInfo->userResult) > 0) {
        $userRow = mysqli_fetch_assoc($userInfo->userResult);

        $userInfo->setAttributes($userRow);
    } else {
        header("Location: users.php");
    }

} else {
    header("Location: users.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Admin | View User</title>
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

    <!-- Main Content -->
    <div class="main px-2 px-md-0"
        style="background-color: #191919 !important; color: white !important; margin-left: 70px; transition: margin-left 0.25s ease-in-out;">

        <!-- View User -->
        <div class="container-fluid">
            <div class="row pt-5 p-md-4">

                <!-- Back to user's page -->
                <div class="col-12">
                    <a href="users.php">
                        <div class="text-center text-sm-start pb-3" style="color:white; text-decoration:underline;"><i
                                class="bi bi-arrow-left"></i>
                            <b>Go back to users page</b>
                        </div>
                    </a>
                </div>

                <!-- Heading -->
                <div class="col-12 my-3">
                    <div class="heading text-center text-sm-start">
                        USER ID: <?php echo sprintf('%03d', $userInfo->userID); ?>
                    </div>
                </div>

                <!-- User Info -->
                <div class="col-12 my-3">
                    <div class="row mb-4 px-2 d-flex justify-content-center align-items-center">
                        <?php echo $userInfo->createCard(); ?>
                    </div>
                </div>

                <!-- Recent Login Table -->
                <div class="col-12 mb-2">
                    <div><b>Recent Logins:</b></div>
                </div>

                <div class="col-12">
                    <div class="card card-container p-4">
                        <div class="row">
                            <div class="table-responsive" style="max-height: 650px; overflow-y: auto;">
                                <table class="table table-striped table-borderless m-0">
                                    <thead class="text-center align-middle">
                                        <tr>
                                            <th scope="col">NO.</th>
                                            <th scope="col">DATE</th>
                                            <th scope="col">TIME</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php echo $userInfo->showRecentLogins($userID) ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>