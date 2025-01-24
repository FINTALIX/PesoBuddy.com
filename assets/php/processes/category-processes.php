<?php 

// Query to get the list of categories
$customCategoryQuery = "SELECT * FROM categories WHERE userID = $userID AND isDeleted ='no'";
$customCategoryResult = executeQuery($customCategoryQuery);

// Check if form is submitted and process it
if (isset($_POST['btnEditCategory'])) {
    // Get the submitted values
    $categoryID = $_POST['categoryID'];
    $categoryName = $_POST['categoryName'];
    $categoryType = $_POST['categoryType'];

    // Update category
    $editCategoryQuery = "
    UPDATE categories 
    SET categoryName = '$categoryName', categoryType = '$categoryType' 
    WHERE categoryID = $categoryID";
    executeQuery($editCategoryQuery);

    header("Location:home.php");
    exit();
}

// Add new categories
$categoryType = "";
$categoryName = "";

if (isset($_POST['btnSaveCategory'])) {
    $categoryType = $_POST['categoryType'];
    $categoryName = $_POST['categoryName'];

    if (!empty($categoryType) && !empty($categoryName)) {
        $checkQuery = "SELECT * FROM categories WHERE userID = '$userID' AND categoryType = '$categoryType' AND categoryName = '$categoryName' AND isDeleted ='no'";
        $result = executeQuery($checkQuery);

        if (mysqli_num_rows($result) > 0) {
        } else {
            $categoryQuery = "INSERT INTO categories (userID, categoryType, categoryName) VALUES ('$userID', '$categoryType', '$categoryName')";
            executeQuery($categoryQuery);
            header("Location: home.php");
            exit();
        }
    } else {
        echo '<script>alert("Please fill both category type and category name.")</script>';
    }
}

// Delete Categories
if (isset($_GET['categoryID'])) {
    $categoryID = $_GET['categoryID'];
}

$_SESSION['userID'] = $userID;
if (isset($_POST['btnDeleteCategory'])) {
    $categoryID = $_POST['categoryID'];
    $userID = $_SESSION['userID'];
    $deleteCategoryQuery = "UPDATE categories SET isDeleted = 'yes' WHERE  categoryID = $categoryID AND userID = $userID";
    executeQuery($deleteCategoryQuery);
    header("Location:home.php");
    exit();
}

?>