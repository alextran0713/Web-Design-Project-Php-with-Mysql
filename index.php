<?php
  include_once 'connection.inc.php';
  session_start();
  $query = "SELECT * FROM `pet`";
  $result = mysqli_query($conn,$query);

  if(isset($_POST['requesting'])) {
    // $_SESSION['receiver'] = $username1;
     header("Location: createplaydate.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="stylesheets/style.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<!-- Navbar -->
<?php
require 'components/navbar.php';
?>
<!-- End Navbar -->

<form action = "index.php" method = "post">
<section id="Animals">
  <div class="container my-3 py-5 text-center">
    <div class="row mb-5">
      <div class="col">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Pet Tinder</h1>
            <p class="lead">Humans Have Tinder, Why dont't pets?</p>
          </div>
        </div>
      </div>
    </div>
    <!----- Cards begin here ----->
    <div class="row">
    <?php  while ($rows = mysqli_fetch_assoc($result)){  ?>
      <?php $username = $rows['username'] ?>
      <?php if($_SESSION['username'] != $username){ ?>
        <div class ="col-12 col-md-6 mb-5">
          <div class="card" >
            <h5 class="card-header text-left text-capitalize">
            <?php $petname = $rows['petname'];
            echo $petname ?>
            </h5>
             <?php $imgURL = $rows['imgURL']?>
               <!-- <div style="height:70%; overflow:hidden;"> -->
              <img src= "<?php echo $imgURL ?>" alt="" class="img-fluid w-100 mb-3" style="width:900px;">
              <div class="card-body" id="card1">
              <?php $description = $rows['description'] ?>
              <p class="card-text text-left text-capitalize" >Description: <?php echo $description ?></p>
            </div>
            <button id="<?php echo $username ?>" type="button" class="btn btn-primary view_data" data-toggle="modal" data-target="#exampleModalCenter">
              Check me out &hearts;
            </button>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
  </div>
</section>

<!-- Modal Section -->
<div id ="dataModal" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-left" id="exampleModalLongTitle" > User Infomation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times; </button>
      </div>
      <div class="modal-body" id="user_detail">
      </div>
      <div class="modal-footer">
        <input type="submit"  value = "Schedule A Play Date Now" name = "requesting" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
