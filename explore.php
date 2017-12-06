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
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header" data-background-color="orange">
                <i class="material-icons">content_copy</i>
              </div>
              <div class="card-content">
                <p class="category">Used Space</p>
                <h3 class="title">49/50
                  <small>GB</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  <a href="#pablo">Get More Space...</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header" data-background-color="green">
                <i class="material-icons">store</i>
              </div>
              <div class="card-content">
                <p class="category">Revenue</p>
                <h3 class="title">$34,245</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Last 24 Hours
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-chart" data-background-color="green">
                <div class="ct-chart" id="dailySalesChart"></div>
              </div>
              <div class="card-content">
                <h4 class="title">Daily Sales</h4>
                <p class="category">
                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.
                </p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-chart" data-background-color="orange">
                <div class="ct-chart" id="emailsSubscriptionChart"></div>
              </div>
              <div class="card-content">
                <h4 class="title">Email Subscriptions</h4>
                <p class="category">Last Campaign Performance</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-chart" data-background-color="red">
                <div class="ct-chart" id="completedTasksChart"></div>
              </div>
              <div class="card-content">
                <h4 class="title">Completed Tasks</h4>
                <p class="category">Last Campaign Performance</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
              </div>
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
