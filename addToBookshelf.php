<?php

session_start();

include_once("config.php");

if(isset($_GET["isbn"])){

  $isbn = $_GET["isbn"];
  $id_user = $_SESSION['id_user'];

  ///////////////

  $result = $dbConn->query("SELECT * FROM user WHERE id_user = ".$_SESSION['id_user']);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $bookshelf = unserialize($row["bookshelf_user"]);

  if($bookshelf == null){
    $bookshelf = [];
  }

  array_push($bookshelf,$isbn);

  $bookshelf = serialize($bookshelf);

  $sql = "UPDATE user SET bookshelf_user=:bookshelf WHERE id_user=:id_user";
  $query = $dbConn->prepare($sql);

  $query->bindparam(':bookshelf', $bookshelf);
  $query->bindparam(':id_user', $id_user);
  $query->execute();

  $message = "Your information has been updated";
  header("Location:bookshelf.php?successMsg=".urlencode($message));

}
else{
  header("Location:bookshelf.php");
}

?>
