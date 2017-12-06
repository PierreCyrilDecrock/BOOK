<?php
session_start();
if (!empty($_SESSION['mail_user'])) {

include_once("config.php");
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
              <?php

              $result = $dbConn->query("SELECT * FROM user WHERE id_user = ".$_SESSION['id_user']);

              while($row = $result->fetch(PDO::FETCH_ASSOC)) {

              ?>
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Edit Profile</h4>
                          <p class="category">Complete your profile</p>
                      </div>
                      <div class="card-content">
                          <form role="form" action="editProfilScript.php" method="post" name="coordonnees" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Username</label>
                                          <input type="text" class="form-control" name="username" value="<?php echo $row['username_user']; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Mail</label>
                                          <input type="email" class="form-control" name="mail" value="<?php echo $row['mail_user']; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Adress</label>
                                          <input type="text" class="form-control" name="address" value="<?php echo $row['address_user']; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Password validation</label>
                                          <input type="password" class="form-control" name="actual_password">
                                      </div>
                                  </div>
                              </div>
                              <input type="hidden" name="change_user_info" value="change_user_info" >
                              <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
              </div>
              <?php
              }
              ?>
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Change password</h4>
                          <p class="category">Change your password</p>
                      </div>
                      <div class="card-content">
                          <form role="form" action="editProfilScript.php" method="post" name="password" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Old password</label>
                                          <input type="password" name="actual_password" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">New password</label>
                                          <input type="password" name="new_password" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Confirmation new password</label>
                                          <input type="password" name="confirmation_new_password" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <input type="hidden" name="change_password" value="change_password" >
                              <button type="submit" class="btn btn-primary pull-right">Update Password</button>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <a href="deleteAccount.php" class="btn btn-danger">Delete my account</a>
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
  <script src="assets/js/bootstrap-notify.js"></script>

</html>


<?php
}
else{
  $message = "Veuillez vous connecter pour acceder au reste du site";
  header("Location:index.php?infoMsg=".urlencode($message));
}


?>
