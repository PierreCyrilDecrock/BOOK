<?php

  session_start();

  include_once("config.php");

  $id_user = $_GET["id"];

  ///////////////

  if($id_user == $_SESSION['id_user']){
    $sql = "DELETE FROM user WHERE id_user=:id_user";
    $query = $dbConn->prepare($sql);

    $query->bindparam(':id_user', $id_user);
    $query->execute();

    header("Location:logout.php");
  }
  else{
    header("Location:logout.php");
  }



?>
