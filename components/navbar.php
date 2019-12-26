<!-- Start Navigation -->
<nav class ="navbar navbar-expand-md navbar-light bg-light sticky-top">
<?php if(isset($_SESSION['is_login'])){ ?>
  <a class="navbar-brand" href="index.php">Pet Playdate</a>
<?php } else{ ?>
  <a class="navbar-brand" href="landingpage.php">Pet Playdate</a>
<?php } ?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav ml-auto px-3" >
        <li class="nav-item">
        <?php if(isset($_SESSION['is_login'])){ ?>
          <a class="nav-link px-4" href="index.php">Home</a>
        <?php } else{ ?>
          <a class="nav-link px-4" href="landingpage.php">Home</a>
        <?php } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link px-4" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-4" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
        <?php if(isset($_SESSION['is_login'])){ ?>
        <a class="nav-link dropdown-toggle px-4" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['username']?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="portfolio.php">My Profile</a>
          <a class="dropdown-item" href="incomingrequests.php">Inbox</a>
          <a class="dropdown-item" href="sent.php">Sent</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
        <?php } else{ ?>
        <a class="nav-link px-4" href="login.php">Log in</a>
        <?php } ?>
      </li>
      </ul>
  </div>
 </nav>
  <!-- End Navigation -->
