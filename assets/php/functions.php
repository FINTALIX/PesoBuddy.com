<?php
function adminAuth(){
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['role'] != 'admin') {
            header("Location: ../home.php");
            exit();
        }
    } else {
        header("Location: .././");
        exit();
    }
}

function userAuth(){
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['role'] != 'user') {
            header("Location: admin/");
            exit();
        }
    } else {
        header("Location: ./");
        exit();
    }
}
?>