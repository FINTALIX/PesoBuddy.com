<?php

session_start();

if (isset($_SESSION['userID']) && $_SESSION['role'] == 'admin') {
} else {
    header("location:../home.php");
    exit();
}

?>