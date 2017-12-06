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
         <div class="row">
            <div class="col-md-12 text-center">
              <h3>Do you really want to delete your account ?</h3>
              <p>All your data will be deleted</p>
               <div class="row">
                <div class="col-md-6 text-center">
                  <a href="profil.php" class="btn btn-primary">Go back!</a>
                </div>
                <div class="col-md-6 text-center">
                  <a href= <?php echo "deleteAccountScript.php?id=".$_SESSION['id_user'] ?> class="btn btn-danger">Yes, I move on</a>
                </div>
              </div>
            </div>
      </div>
  </div>

    <?php include('footer.php'); ?>

  </div>
</body>

 <!-- Javascript -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
  <script src="assets/js/material-dashboard.js"></script>

</html>


<?php
}
else{
  $message = "Veuillez vous connecter pour acceder au reste du site";
  header("Location:index.php?infoMsg=".urlencode($message));
}


?>
