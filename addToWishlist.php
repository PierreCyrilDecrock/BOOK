<?php

session_start();

include_once("config.php");

if(isset($_GET["isbn"])){

  $isbn = $_GET["isbn"];
  $id_user = $_SESSION['id_user'];

  ///////////////

  $result = $dbConn->query("SELECT * FROM user WHERE id_user = ".$_SESSION['id_user']);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $wishlist = unserialize($row["wishlist_user"]);

  if($wishlist == null){
    $wishlist = [];
  }

  array_push($wishlist,$isbn);

  $wishlist = serialize($wishlist);

  $sql = "UPDATE user SET wishlist_user=:wishlist WHERE id_user=:id_user";
  $query = $dbConn->prepare($sql);

  $query->bindparam(':wishlist', $wishlist);
  $query->bindparam(':id_user', $id_user);
  $query->execute();

  $message = "Your information has been updated";
  header("Location:wishlist.php?successMsg=".urlencode($message));

}
else{
  header("Location:wishlist.php");
}

?>
