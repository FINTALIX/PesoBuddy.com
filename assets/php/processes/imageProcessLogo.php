<?php

//Handle Website Logo Upload
if (isset($_POST['btnUploadLogo'])) {
    if (!empty($_FILES['websiteLogo']['name'])) {
        $websiteLogo = $_FILES['websiteLogo']['name'];
        $websiteLogoTmp = $_FILES['websiteLogo']['tmp_name'];
        $uploadDirLogo = __DIR__ . '/../../images/websiteLogo/';
        
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
    $websiteLogo = !empty($row['settingValue']) ? $row['settingValue'] : "websiteLogo.png";
}
?>