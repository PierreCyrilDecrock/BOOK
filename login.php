<?php

session_start();

include_once("config.php");

  $mail = $_POST["mail"];
  $password = $_POST["password"];

  $result = $dbConn->query("SELECT COUNT(*) AS nb FROM user WHERE mail_user = '$mail'");

  $columns = $result->fetch();
  $nb = $columns['nb'];

  if($nb > 0){

    $result = $dbConn->query("SELECT * FROM user WHERE mail_user = '$mail'");
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if(md5($password) == $row['password_user']){

      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username_user'] = $row['username_user'];
      $_SESSION['wishlist_user'] = $row['wishlist_user'];
      $_SESSION['bookshelf_user'] = $row['bookshelf_user'];
      $_SESSION['mail_user'] = $row['mail_user'];
      $_SESSION['address_user'] = $row['address_user'];


      header("Location:explore.php");
    }
    else{
      $message = "The password used is incorrect";
      header("Location:index.php?errorMsg=".urlencode($message));
    }
  }
  else{
    $message = "There is no account with this email address";
    header("Location:index.php?errorMsg=".urlencode($message));
  }




?>
