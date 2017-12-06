<?php
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$parts = $parts[count($parts) - 1];
$parts = Explode('.', $parts);
$pageName = $parts[0];
?>


<div class="sidebar" data-color="purple" data-image="">
      <div class="logo">
        <a href="#" class="simple-text">
          BOOK
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class= <?php if($pageName == "explore"){echo "active";}; ?>>
            <a href="explore.php">
              <i class="material-icons">dashboard</i>
              <p>Explore</p>
            </a>
          </li>
          <li class= <?php if($pageName == "wishlist"){echo "active";}; ?>>
            <a href="wishlist.php">
              <i class="material-icons">dashboard</i>
              <p>My wishlist</p>
            </a>
          </li>
          <li class= <?php if($pageName == "bookshelf"){echo "active";}; ?>>
            <a href="bookshelf.php">
              <i class="material-icons">person</i>
              <p>Book at home</p>
            </a>
          </li>
          <li class= <?php if($pageName == "profil"){echo "active";}; ?>>
            <a href="profil.php">
              <i class="material-icons">person</i>
              <p>User profile</p>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="material-icons">person</i>
              <p>Log out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $pageName; ?></a>
          </div>
        </div>
      </nav>
