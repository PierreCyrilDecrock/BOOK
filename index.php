<?php

session_start();

if (!empty($_SESSION['mail_user'])) {
  header("Location:profil.php");
}
else{
?>
  <!doctype html>

  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>BOOK</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="top-content">

        <div class="inner-bg">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <h1>KDO</h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                  <?php
                  if (isset($_GET['errorMsg'])) {
                  ?>
                    <div class="alert alert-danger"><?php echo $_GET['errorMsg'] ?></div>
                  <?php }
                  if (isset($_GET['successMsg'])) {
                  ?>
                    <div class="alert alert-success"><?php echo $_GET['successMsg'] ?></div>
                  <?php }
                  if (isset($_GET['infoMsg'])) {
                  ?>
                    <div class="alert alert-info"><?php echo $_GET['infoMsg'] ?></div>
                  <?php } ?>
                  </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">

                      <div class="form-box">
                        <div class="form-top">
                          <div class="form-top-left">
                            <h3>Log in</h3>
                              <p>Enter your mail and password :</p>
                          </div>
                          <div class="form-top-right">
                            <i class="fa fa-key"></i>
                          </div>


                          </div>
                          <div class="form-bottom">
                            <form role="form" action="login.php" method="post" class="login-form">
                              <div class="form-group">
                                <label class="sr-only" for="form-mail">Email</label>
                                  <input type="email" name="mail" placeholder="Mail..." class="form-mail form-control" id="form-mail" required>
                                </div>
                                <div class="form-group">
                                  <label class="sr-only" for="form-password">Password</label>
                                  <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" required>
                                </div>
                                <button type="submit" class="btn">Log in</button>
                            </form>
                          </div>
                        </div>
                      <div class="social-login">
                        <h3>...or login with:</h3>
                        <div class="social-login-buttons">
                          <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                            <i class="fa fa-facebook"></i> Facebook
                          </a>
                          <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                            <i class="fa fa-twitter"></i> Twitter
                          </a>
                          <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                            <i class="fa fa-google-plus"></i> Google Plus
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-1 middle-border"></div>
                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">

                      <div class="form-box">
                        <div class="form-top">
                          <div class="form-top-left">
                            <h3>Sign up</h3>
                              <p>Fill this form to sign up :</p>
                          </div>
                          <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                          </div>
                          </div>
                          <div class="form-bottom">
                        <form role="form" action="signup.php" method="post" class="registration-form">
                            <div class="form-group">
                              <label class="sr-only" for="form-username">Username</label>
                              <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" required>
                            </div>
                            <div class="form-group">
                              <label class="sr-only" for="form-mail">Mail</label>
                              <input type="email" name="mail" placeholder="Mail..." class="form-mail form-control" id="form-mail" required>
                            </div>
                            <div class="form-group">
                              <label class="sr-only" for="form-password">Password</label>
                              <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" required>
                            </div>
                            <div class="form-group">
                              <label class="sr-only" for="form-password_bis">Confirmation password</label>
                              <input type="password" name="password_bis" placeholder="Confirmation password..." class="form-password_bis form-control" id="form-password_bis" required>
                            </div>
                            <button type="submit" class="btn">Sign me up!</button>
                        </form>
                      </div>
                      </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Javascript -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

  </body>

  </html>
<?php
}
?>
