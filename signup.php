<?php

include_once("config.php");

  $username = $_POST["username"];
  $mail = $_POST["mail"];
  $password = $_POST["password"];
  $password_bis = $_POST["password_bis"];

  $result = $dbConn->query("SELECT COUNT(*) AS nbMail FROM user WHERE mail_user = '$mail'");

  $rows = $result->fetch();
  $nbMail = $rows['nbMail'];

  if($nbMail == 0){

    $result = $dbConn->query("SELECT COUNT(*) AS nbUsername FROM user WHERE username_user = '$username'");

    $rows = $result->fetch();
    $nbUsername = $rows['nbUsername'];

    if($nbUsername == 0){

      if($password == $password_bis){

        $sql = "INSERT INTO user(username_user, mail_user, password_user) VALUES(:username, :mail, :password)";
        $query = $dbConn->prepare($sql);

        $md5Password = md5($password);

        $query->bindparam(':username', $username);
        $query->bindparam(':mail', $mail);
        $query->bindparam(':password', $md5Password);
        $query->execute();

        $message = "Your account has been created, you can now log in";
        header("Location:index.php?successMsg=".urlencode($message));
      }
      else{
        $message = "Confirmation password is different from the original password";
        header("Location:index.php?errorMsg=".urlencode($message));
      }
    }
    else{
      $message = "There is already an account with this username";
      header("Location:index.php?errorMsg=".urlencode($message));
    }
  }
  else{
    $message = "There is already an account with this email address";
    header("Location:index.php?errorMsg=".urlencode($message));
  }

?>

