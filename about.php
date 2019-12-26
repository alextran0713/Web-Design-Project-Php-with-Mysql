<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
    <?php
    require 'components/navbar.php';
    ?>
    <div id="marginAboutUs" class="jumbotron jumbotron-fluid container text-center">
      <h1 class="titleAboutUs"> About Pet Playdate</h1>
      <img class="aboutImg" src="images/aboutImg.jpg">
      <div class="row mb-5">
        <div class="col">
          <h2> What is Pet Playdate? </h2>
          <p> Pet playdate is all about connecting your pet with a companion! </p>
          <br>
          <h2> How does Pet Playdate work? </h2>
          <p> Simply click a profile of an animal that you like and schedule a playdate! </p>
          <br>
          <h2> That's it? </h2>
          <p> Yes! That's all it takes! </p>
          <br>
          <div style="background-color:#90ccf4;margin-left:5%;margin-right:5%;padding:20px;border-radius:10px">
            <h1> Join Today! </h1>
            <p> Start scheduling and creating playdates now. </p>
            <a href="register.php" style="text-decoration:none;">
              <button type="button" class="btn btn-success">Register</button>
            </a>
        </div>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php
    require 'components/footer.php';
    ?>
    <!-- end of footer -->
    <script src ="scripts/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
