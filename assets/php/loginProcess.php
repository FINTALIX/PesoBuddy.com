<?php

$error = "";

if (isset($_POST['btnLogin'])) {

  $username = $_POST['userName'];
  $password = $_POST['password'];

  // CLEAN INJECTION
  $username = str_replace('\'', '', $username);
  $password = str_replace('\'', '', $password);

  $loginQuery = "SELECT * FROM users WHERE (userName = '$username' OR email = '$username') AND password = '$password'";
  $loginResult = executeQuery($loginQuery);

  $_SESSION['userID'] = "";
  $_SESSION['username'] = "";
  $_SESSION['firstName'] = "";
  $_SESSION['lastName'] = "";
  $_SESSION['email'] = "";
  $_SESSION['birthday'] = "";
  $_SESSION['profilePicture'] = "";
  $_SESSION['role'] = "";

  if (mysqli_num_rows($loginResult) > 0) {
    while ($user = mysqli_fetch_assoc($loginResult)) {
      $_SESSION['userID'] = $user['userID'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['firstName'] = $user['firstName'];
      $_SESSION['lastName'] = $user['lastName'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['birthday'] = $user['birthday'];
      $_SESSION['profilePicture'] = $user['profilePicture'];
      $_SESSION['role'] = $user['role'];


      if ($user['role'] == 'admin') {
        header("Location: admin/");
      } else {
        $userID = $user['userID'];
        $insertLoginQuery = "INSERT INTO logins (userID) VALUES ('$userID')";
        executeQuery($insertLoginQuery);  
        header("Location: home.php");
      }
      exit();
    }
  } else {
    $error = "INVALID USER";
  }
}

?>