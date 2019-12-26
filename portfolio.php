<?php require "connection.inc.php"?>
<?php
    session_start();
    //check to see if user login in
    if($_SESSION['is_login']){
        // keep user on page
        $username = $_SESSION['username'];
    }
    else{
        header("location: ./login.php");
    }
?>

<?php
  if($_SESSION['is_login']){
    // Pull data from pet table to display


    $pet_table='pet';


    $sql = "SELECT * FROM $pet_table WHERE username='$username';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck === 0) {
      $petname = "";
      $imgURL = "";
      $description = "";
      // echo "petname: $petname";
      // echo "imgURL: $imgURL";
      // echo "description: $description";
    }
    else {
      while ($row = mysqli_fetch_assoc($result)) {
        $petname = $row['petname'];
        $imgURL = $row['imgURL'];
        $description = $row['description'];
      }
    }

    // Pull data from registration table to display
    $reg_table='registration';
    $reg_sql = "SELECT * FROM $reg_table WHERE username='$username';";
    $reg_result = mysqli_query($conn, $reg_sql);
    $reg_resultCheck = mysqli_num_rows($reg_result);
    if ($reg_resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($reg_result)) {
        $email    = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        $address1 = $row['address1'];
        // $address2 = $row['address2'];
        $city     = $row['city'];
        $state    = $row['state'];
        $zip      = $row['zip'];
      }
    }
    else echo "Error reading db";
  }
?>
<!-- ============================================================================== -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Profile</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet"> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script> -->
</head>

<body>

  <?php include 'components/navbar.php'; ?>

  <div class="container" style="margin-bottom:8%;">


    <!-- ****************** row pet name ****************** -->
    <div class="row">
      <div class="col-lg">
        <?php
          if ($petname != "") echo "<h1 class='mt-3'> $petname </h1>";
          else echo "<h1 class='mt-4'>Pet Name</h1>";
         ?>
         <hr>
     </div>
   </div>

    <!-- ****************** row picture and userinfo ****************** -->
    <div class="row mt-2">

      <!-- Picture Column -->
      <div class="col-lg-6">
        <!-- oooooooooooooooooooooooo Display Image oooooooooooooooooooooooo -->
        <?php
          if ($imgURL != "") echo "<img class='img-fluid rounded' src='$imgURL' style='width: 900px;'>";
           else echo "<img class='img-fluid rounded' src='uploads/default.jpg' style='width: 900px;' alt='My pet picture'>";

         ?>
      </div>  <!-- End picture-Description column -->

      <!-- userinfo Column -->
      <div class="col-lg-6">
        <div class="card">

          <h5 class="card-header" style="background-color:#90ccf4;">
            <div class="row">
              <div class="col-10">User Information</div>
              <div class="col-2"><a href="editprofile.php"><i class="material-icons">edit</i></a></div>
            </div>
          </h5>

          <div class="card-body">
            <div class="row">
              <!-- Leftside -->
              <div class="col-lg-5 col-md-3">
                <div class="form-group">
                  <label name="petname" for="petname">Pet Name</label>

                </div>
              </div>
              <!-- Rightside -->
              <div class="col-lg-7 col-md-9">

                <?php
                  if ($petname != "") echo "<label> $petname </label>";
                  else echo "<label> Pet Name </label>";
                 ?>
              </div>
            </div>

            <div class="row">
              <!-- Leftside -->
              <div class="col-lg-5 col-md-3">
                <div class="form-group">
                  <label name="email" for="email">Email</label>
                </div>
              </div>
              <!-- Rightside -->
              <div class="col-lg-7 col-md-9">
                <?php
                  if ($email != "") echo "<label> $email </label>";
                  else echo "<label> Email </label>";
                 ?>
              </div>
            </div>

            <div class="row">
              <!-- Leftside -->
              <div class="col-lg-5 col-md-3">
                <div class="form-group">
                  <label for="address1">Address</label>
                </div>
              </div>
              <!-- Rightside -->
              <div class="col-lg-7 col-md-9">
                <?php
                  if ($address1 != "") echo "<label> $address1 </label>";
                  else echo "<label> Address </label>";
                 ?>
              </div>
            </div>

            <div class="row">
              <!-- Leftside -->
              <div class="col-lg-5 col-md-3">
                <div class="form-group">
                  <label for="city">City</label>
                </div>
              </div>
              <!-- Rightside -->
              <div class="col-lg-7 col-md-9">
                <?php
                  if ($city != "") echo "<label> $city </label>";
                  else echo "<label> City </label>";
                 ?>
              </div>
            </div>

            <div class="row">
              <!-- Leftside -->
              <div class="col-lg-5 col-md-3">
                <div class="form-group">
                  <label for="state">State</label>
                </div>
              </div>
              <!-- Rightside -->
              <div class="col-lg-7 col-md-9">
                <?php
                  if ($state != "") echo "<label> $state </label>";
                  else echo "<label> State </label>";
                 ?>
              </div>
            </div>

            <div class="row">
              <!-- Leftside -->
              <div class="col-lg-5 col-md-3">
                <div class="form-group">
                  <label for="zip">Zip Code</label>
                </div>
              </div>
              <!-- Rightside -->
              <div class="col-lg-7 col-md-9">
                <?php
                  if ($zip != "") echo "<label> $zip </label>";
                  else echo "<label> ZIP Code </label>";
                 ?>
              </div>
            </div>

          </div>          <!-- end class card-body -->

        </div>
      </div> <!-- End userinfo Column -->

    </div>



    <!-- ****************** row Description ****************** -->
    <hr>
    <div class="row">
     <div class="col-lg">
       <h4 class="mt-3">Description</h4><br/>
       <div style="background-color:#90ccf4;border-radius:10px;padding:10px;">
        <?php
          if ($description != "") echo "<p class='lead'> $description <br> </p>";
          else echo "<p class='lead'>Your pet's description is empty. <br> Please enter one. <br></p>";
          ?>
        </div>
      </div>
    </div>
  </div>  <!-- End container -->

<?php include 'components/footer.php'; ?>

  <!-- ======================================================= -->
  <!-- footer -->
  <!-- <footer id="sticky-footer" class="py-3 bg-dark text-white-50">
    <div class="container text-center">
       <small>Created By &copy; Team Name </small>
      </div>
  </footer> -->
  <!-- Footer -->
<!-- <footer class="page-footer font-small white mt-4">

  <div class="footer-copyright text-center py-3 bg-light">© 2019 Copyright:
    <a href=""> Created By &copy; Team Name </a>
  </div>

</footer> -->

</body>

</html>
