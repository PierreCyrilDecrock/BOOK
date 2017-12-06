<?php

session_start();

include_once("config.php");

if(isset($_POST["change_user_info"])){

  $username = $_POST["username"];
  $mail = $_POST["mail"];
  $address = $_POST["address"];
  $actual_password = $_POST["actual_password"];
  $id_user = $_SESSION['id_user'];

  $md5_password = md5($actual_password);

  $result = $dbConn->query("SELECT COUNT(*) AS nb FROM user WHERE id_user='$id_user' AND password_user = '$md5_password'");

  $columns = $result->fetch();
  $nb = $columns['nb'];

  if($nb > 0){
    $sql = "UPDATE user SET username_user=:username, mail_user=:mail, address_user=:address WHERE id_user=:id_user";
    $query = $dbConn->prepare($sql);

    $query->bindparam(':username', $username);
    $query->bindparam(':mail', $mail);
    $query->bindparam(':address', $address);
    $query->bindparam(':id_user', $id_user);
    $query->execute();

    $message = "Your information has been updated";
    header("Location:profil.php?successMsg=".urlencode($message));

  }
  else{
    $message = "The password used is incorrect";
    header("Location:profil.php?errorMsg=".urlencode($message));
  }


}
else{

  $actual_password = $_POST["actual_password"];
  $new_password = $_POST["new_password"];
  $confirmation_new_password = $_POST["confirmation_new_password"];
  $id_user = $_SESSION['id_user'];

  $md5_password = md5($actual_password);
  $md5_new_password = md5($new_password);

  if($new_password == $confirmation_new_password){

    $result = $dbConn->query("SELECT COUNT(*) AS nb FROM user WHERE id_user='$id_user' AND password_user = '$md5_password'");

    $columns = $result->fetch();
    $nb = $columns['nb'];

    if($nb > 0){
      $sql = "UPDATE user SET password_user=:password WHERE id_user=:id_user";
      $query = $dbConn->prepare($sql);

      $query->bindparam(':password', $md5_new_password);
      $query->bindparam(':id_user', $id_user);
      $query->execute();

      $message = "Your new password has been successfully updated";
      header("Location:profil.php?successMsg=".urlencode($message));

    }
    else{
      $message = "The password used is incorrect";
      header("Location:profil.php?errorMsg=".urlencode($message));
    }

  }
  else{
    $message = "Confirmation password is different from the original password";
    header("Location:profil.php?errorMsg=".urlencode($message));
  }



}

?>
