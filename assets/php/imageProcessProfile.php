<?php

// Handle Profile Picture Upload
if (isset($_POST['btnUploadProfile'])) {
    if (!empty($_FILES['profilePic']['name'])) {
        $profilePicture = $_FILES['profilePic']['name'];
        $profilePictureTmp = $_FILES['profilePic']['tmp_name'];
        $uploadDirProfile = __DIR__ . '/../images/userProfile/';

        // Validate the uploaded file type
        $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp'];
        $fileType = mime_content_type($profilePictureTmp);

        if (in_array($fileType, $allowedMimeTypes)) {
            // Ensure the upload directory exists
            if (!file_exists($uploadDirProfile)) {
                mkdir($uploadDirProfile, 0777, true);
            }
        }
        
        // Move the uploaded file
        if (move_uploaded_file($profilePictureTmp, $uploadDirProfile . $profilePicture)) {
            // Update the database with the new profile picture
            $updateProfileQuery = "UPDATE users SET profilePicture = '$profilePicture' WHERE userID = $userID";
            executeQuery($updateProfileQuery);
        }
    }
}
    $displayProfileQuery = "SELECT profilePicture FROM users WHERE userID = $userID;";
    $uploadResult = executeQuery($displayProfileQuery);

    // Display user Profile Picture
    $profilePicture = "defaultProfile.png"; 
    while($row = mysqli_fetch_assoc($uploadResult)){
    $profilePicture = !empty($row['profilePicture']) ? $row['profilePicture'] : "defaultProfile.png";
    }


?>