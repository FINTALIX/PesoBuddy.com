<?php

$_SESSION['userID'] = "";
$_SESSION['userName'] = "";
$_SESSION['email'] = "";
$_SESSION['firstName'] = "";
$_SESSION['lastName'] = "";
$_SESSION['email'] = "";
$_SESSION['birthday'] = "";
$_SESSION['profilePicture'] = "";
$_SESSION['role'] = "";

$error = "";

if (isset($_POST['btnRegister'])) {
  $username = $_POST['userName'];
  $email = $_POST['email'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $birthday = $_POST['birthday'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
  $checkResult = executeQuery($checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    $error = "userExist";
  } elseif (strlen($password) <= 8) {
    $error = "passwordTooShort";
  } elseif ($password != $cpassword) {
    $error = "passwordUnmatched";
  } else {
    $lastInsertedId = mysqli_insert_id($conn);

    $userQuery = "INSERT INTO users(username, email, password, firstName, lastName, birthday)  VALUES ('$username', '$email', '$password', '$firstName', '$lastName', '$birthday')";
    executeQuery($userQuery);

    $lastInsertedId = mysqli_insert_id($conn);

    $_SESSION['userID'] = $lastInsertedId;
    $_SESSION['userName'] = $username;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['birthday'] = $birthday;
    $_SESSION['role'] = "user";

    $lastInsertedId = mysqli_insert_id($conn);
    $insertLoginQuery = "INSERT INTO logins (userID) VALUES ('$lastInsertedId')";
    executeQuery($insertLoginQuery);

    header("Location: home.php");
  }
}

?>