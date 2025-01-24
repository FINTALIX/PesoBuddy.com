<?php

//Deletion of Profile Picture
if(isset($_POST['btnDeleteProfilePic'])){
    $updateProfileQuery = "UPDATE users SET profilePicture = NULL WHERE userID = $userID";
        executeQuery($updateProfileQuery);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>