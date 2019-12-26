<?php
include_once 'connection.inc.php';
session_start();
?>
<?php
if(!isset($_SESSION['is_login'])){
if ((isset($_POST['submit']))){
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $check1 = "SELECT * FROM `registration` WHERE email='$email' ";
  $check2 = "SELECT * FROM `registration` WHERE username='$username' ";
  $result1 = mysqli_query($conn, $check1);
  $result2 = mysqli_query($conn, $check2);
  if(mysqli_num_rows($result1) > 0){
    $messages = '<div class="p-3 mb-2 bg-warning text-dark">Your email already been used. Please select a different email</div>';
  }
  else if (mysqli_num_rows($result2) > 0) {
    $messages = '<div class="p-3 mb-2 bg-warning text-dark">Your username is already been used. Please select a different username</div>';
  }
  else{
    if (!empty($email) || !empty($password) || !empty($username) || !empty($address1) || !empty($city) || !empty($state) || !empty($zip)) {
        $hashpass = md5(md5($password));
        $sql = "INSERT INTO registration (email, password, username, address1, address2, city, state, zip)
            VALUES ('$email', '$hashpass', '$username', '$address1', '$address2', '$city', '$state', '$zip')";
        $result = mysqli_query($conn, $sql);
        header("Location: login.php?Signup=sucessfully");
    }
  }
}
}
else{
  header("Location: index.php?userstilllogin");
}
?>

<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
<?php
require 'components/navbar.php';
?>
  <div class="jumbotron" id="cssLogin" >
    <img class="loginImg" src="images/SignUpImg.jpg">
    <hr class="my-3">
    <h4 class="display-5" >Register</h4>
    <hr class="my-3">
      <form action="" method="POST">
          <?php if(isset($messages)) echo $messages; ?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required \>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password" required \>
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Username</label>
            <input name="username" type="text" class="form-control" id="inputname" placeholder="Fido" required \>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input name="address1" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required \>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input name="address2" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input name="city" type="text" class="form-control" id="inputCity" placeholder="Garden Grove" required \>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">State</label>
              <input name="state" type="text" class="form-control" id="inputCity" placeholder="CA" required \>
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input name="zip" type="text" class="form-control" id="inputZip" placeholder="12345"required \>
            </div>
          </div>
          <button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
        </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
require 'components/footer.php';
?>
</body>
</html>
