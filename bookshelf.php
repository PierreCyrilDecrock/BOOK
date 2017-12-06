<?php
session_start();
if (!empty($_SESSION['mail_user'])) {

include_once("config.php");

$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$parts = $parts[count($parts) - 1];
$parts = Explode('.', $parts);
$pageName = $parts[0];

?>
<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>BOOK</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <!-- CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!--  Material Dashboard CSS    -->
  <link href="assets/css/material-dashboard.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>

<body class="menu-on-left">
  <div class="wrapper">

    <?php include('menu.php'); ?>

    <div class="content">
      <div class="container-fluid">
        <?php

        if (isset($_GET['errorMsg']) || isset($_GET['successMsg']) || isset($_GET['infoMsg'])) {

          if (isset($_GET['errorMsg'])) {
          ?>
            <div class="alert alert-warning">
          <?php }
          if (isset($_GET['successMsg'])) {
          ?>
            <div class="alert alert-success">
          <?php }
          if (isset($_GET['infoMsg'])) {
          ?>
            <div class="alert alert-info">
          <?php } ?>
          <div class="container-fluid">
            <div class="alert-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <?php
            if (isset($_GET['errorMsg'])) {
              echo $_GET['errorMsg'];
            }
            if (isset($_GET['successMsg'])) {
              echo $_GET['successMsg'];
            }
            if (isset($_GET['infoMsg'])) {
              echo $_GET['infoMsg'];
            }
          ?>
          </div>
        </div>
        <?php } ?>
         <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Add a new book</h4>
                          <p>Write the book title</p>
                      </div>
                      <div class="card-content bookshelf-card">
                          <form role="form" action="bookshelf.php" method="post" name="book_title" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Book name</label>
                                          <input type="text" name="title" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <input type="hidden" name="book_title" value="book_title" >
                              <button type="submit" class="btn btn-sm btn-primary pull-right bookshelf-button">Search</button>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
              </div>-
          </div>
        <?php
        if(isset($_POST["book_title"])){

          $user_book = $_POST["title"];

          $user_book = str_replace(' ', '%20', $user_book);

          // Connect to the api and get info based on users input
          $api_url = "https://www.googleapis.com/books/v1/volumes?q=" . $user_book . "&key=AIzaSyCiryfQBjk5MRBCxvc5gEkH3wxdMyAbuYA";
          $book_data = file_get_contents($api_url);
          $json = json_decode($book_data, TRUE);

          // Display the 3 first results and, if they are not good looking, it doesn't display it.
          $nb_disp = 3;

          if(count($json['items']) < $nb_disp){
            $nb_disp = count($json['items']);
          }

          for ($i = 0; $i <= $nb_disp - 1; $i++){

              $book_title = $book_authors = $book_description = $book_isbn_type = "No information";
              $imageLink = "http://via.placeholder.com/128x182";

              // Get requested info from the api
              if(isset($json['items'][$i]['volumeInfo']['title'])){
                $book_title = $json['items'][$i]['volumeInfo']['title']; //title
              }
              if(isset($json['items'][$i]['volumeInfo']['authors'][0])){
                $book_authors = $json['items'][$i]['volumeInfo']['authors'][0]; //authors
              }
              if(isset($json['items'][$i]['volumeInfo']['description'])){
                $book_description = $json['items'][$i]['volumeInfo']['description']; //description
              }
              if(isset($json['items'][$i]['volumeInfo']['industryIdentifiers'][0]['type'])){
                $book_isbn_type = $json['items'][$i]['volumeInfo']['industryIdentifiers'][0]['type'];//type ISBN
              }
              if(isset($json['items'][$i]['volumeInfo']['imageLinks']['thumbnail'])){
                $imageLink = $json['items'][$i]['volumeInfo']['imageLinks']['thumbnail'];//type ISBN
              }


              //We want the ISBN_13 not the 10
              if($book_isbn_type == "ISBN_10"){
                  $book_isbn_nb = $json['items'][$i]['volumeInfo']['industryIdentifiers'][1]['identifier']; //Number ISBN
              }
              else{
                  $book_isbn_nb = $json['items'][$i]['volumeInfo']['industryIdentifiers'][0]['identifier']; //Number ISBN
              };
              ?>
              <div class="card card-stats">
                <div class="card-header card-header-bookshelf" data-background-color="orange">
                  <img src="<?php echo $imageLink; ?>" />
                </div>
                <div class="card-content card-content-bookshelf">
                  <div>
                    <h3 class="title"><?php echo $book_title; ?></h3>
                  </div>
                  <p><?php echo $book_description; ?></p>
                  <a href="addToBookshelf.php?isbn=<?php echo $book_isbn_nb; ?>" class="btn btn-primary btn-sm">Add to bookshelf</a>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <b>Authors : </b><?php echo $book_authors; ?> - <b>ISBN : </b><?php echo $book_isbn_nb; ?>
                  </div>
                </div>
              </div>
          <?php
          }
        }
        ?>
        <div id="bookshelf_items"></div>

    <?php include('footer.php'); ?>

  </div>
</body>

 <!-- Javascript -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
  <script src="assets/js/material-dashboard.js"></script>
  <script>
     $(function() {
        $('#bookshelf_items').load("bookshelf_items.php");
    });
  </script>

</html>


<?php
}
else{
  $message = "Veuillez vous connecter pour acceder au reste du site";
  header("Location:index.php?infoMsg=".urlencode($message));
}


?>
