<?php

$_SESSION['userID'] = $userID;
if (isset($_POST['btnSaveCategory'])) {
    $categoryType = $_POST['categoryType'];
    $categoryName = $_POST['categoryName'];

    if (!empty($categoryType) && !empty($categoryName)) {
        $categoryQuery = "INSERT INTO categories (userID, categoryType, categoryName) VALUES ('$userID', '$categoryType', '$categoryName')";
        executeQuery($categoryQuery);
        // header("Location:home.php");
        $_SESSION['category_added'] = true;
    } else {
        echo '<script>alert("Please fill both category type and category name.")</script>';
    }
}

if (isset($_POST['btnSuccessModal'])) {
    unset($_SESSION['category_added']);
    header("Location:home.php");

    exit();
}

?>