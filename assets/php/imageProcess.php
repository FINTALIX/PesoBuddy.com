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
    $profilePicture = !empty($row[$profilePicture]) ? $row['profilePicture'] : "defaultProfile.png";
    }

// Handle Profile Picture Upload
if (isset($_POST['btnUploadLogo'])) {
    if (!empty($_FILES['websiteLogo']['name'])) {
        $websiteLogo = $_FILES['websiteLogo']['name'];
        $websiteLogoTmp = $_FILES['websiteLogo']['tmp_name'];
        $uploadDirLogo = __DIR__ . '/../images/websiteLogo/';
        
        // Validate the uploaded file type
        $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp'];
        $fileType = mime_content_type($websiteLogoTmp);

        // Move the uploaded file to the existing folder
        if (move_uploaded_file($websiteLogoTmp, $uploadDirLogo . $websiteLogo)) {
            // Update the database with the new logo
            $updateLogoQuery = "UPDATE settings SET settingValue = '$websiteLogo' WHERE settingName='logo'";
            executeQuery($updateLogoQuery);
        } 
    }
}

$websiteLogoQuery = "SELECT settingValue FROM settings WHERE settingName='logo'";
$logoResult = executeQuery($websiteLogoQuery);

// Display Website Logo
$websiteLogo = "websiteLogo.png"; 
if ($row = mysqli_fetch_assoc($logoResult)) {
    $websiteLogo = !empty($row[$websiteLogo]) ? $row['settingValue'] : "websiteLogo.png";
}
?>