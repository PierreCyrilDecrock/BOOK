<?php
    session_start();

    include_once("config.php");
?>

<div class="row">
    <?php

    $result = $dbConn->query("SELECT bookshelf_user FROM user WHERE id_user = ".$_SESSION['id_user']);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if($row["bookshelf_user"] != null){

    $bookshelf_user = unserialize($row["bookshelf_user"]);

    for($i = 0; $i < count($bookshelf_user); $i++){


      $api_url = "https://www.googleapis.com/books/v1/volumes?q=" . $bookshelf_user[$i] . "&key=AIzaSyCiryfQBjk5MRBCxvc5gEkH3wxdMyAbuYA";
      $book_data = file_get_contents($api_url);
      $json = json_decode($book_data, TRUE);

      if(isset($json['items'][0]['volumeInfo']['imageLinks']['thumbnail'])){
        $imageLink = $json['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
      }
      else{
        $imageLink = "http://via.placeholder.com/128x182";
      }

      $title = $json['items'][0]['volumeInfo']['title'];

      if (strlen($title) >= 20) {
          $title = substr($title, 0, 10). " ... " . substr($title, -5);
      }

    ?>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header card-chart">
          <img class="bookshelf-card-img" src= <?php echo $imageLink; ?> >
        </div>
        <div class="card-content">
          <h4 class="title"><?php echo $title ?></h4>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">info_outline</i> About
          </div>
        </div>
      </div>
    </div>
    <?php
    }
  }?>
</div>
