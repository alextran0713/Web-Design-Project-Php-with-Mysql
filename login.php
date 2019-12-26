<?php
include "connection.inc.php";
?>
<?php
  session_start();
  if(!isset($_SESSION['is_login'])){
   if(isset($_POST['login'])){
    $userEmail = mysqli_real_escape_string($conn,$_POST['email']);
    $userPass = mysqli_real_escape_string($conn,$_POST['password']);
    $hashpass = md5(md5($userPass));

    $sql = "SELECT `username` FROM `registration` WHERE email = '$userEmail' and password = '$hashpass'";
    $result = mysqli_query($conn, $sql);
    if ($result){
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $row["username"];
        header("Location: index.php?login=sucessful");
      }
      else{
        $messages = '<div class="p-3 mb-2 bg-warning text-dark">Your email or password is incorrect</div>';
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
  <link rel="stylesheet" href="./stylesheets/style.css">
</head>
<body>
<!-- Navbar -->
<?php
require 'components/navbar.php';
?>
<!-- End Navbar -->
  <div class="jumbotron" id="cssLogin">
    <img class="loginImg" src="images/loginImg.jpg">
      <hr class="my-3">
      <h4 class="display-5" >Login</h4>
      <hr class="my-3">
      <?php if(isset($messages)) echo $messages; ?>
      <form action="" method="POST" >
          <div class="form-group">
            <label class="bodytxt" for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label class="bodytxt" for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button name="login" id="login" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a href="register.php">No account? Register Now.</a>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- footer -->
<?php
  require 'components/footer.php';
?>
<!-- end of footer -->
</body>

</html>
