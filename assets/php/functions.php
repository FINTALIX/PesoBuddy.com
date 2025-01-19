<?php
function adminAuth(){
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['role'] != 'admin') {
            header("Location: ../home.php");
            exit();
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
}

function userAuth(){
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['role'] != 'user') {
            header("Location: admin/index.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>