<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php require "connection.inc.php"?>
<?php
    session_start();
    //check to see if user login in
    if($_SESSION['is_login']){
        // keep user on page
        $username = $_SESSION['username'];
        $query = "SELECT * FROM inbox WHERE receiver = '$username'";
        $results = mysqli_query($conn, $query);
        //  print_r($results);

        if(isset($_POST['send'])) {
          // print thisisrequestingstate;
          $_POST['requestingstate']= "accept";
          $state = $_POST['requestingstate'];
          //print $state;

        }
        if(isset($_POST['decline'])) {
          print $_SESSION['sender'];
          $_POST['requestingstate']= "decline";
          $state = $_POST['requestingstate'];
          //print $state;
          header("Location: response.php");
        }
    }
    else{
        header("location: login.php");
    }
?>


<html lang="en" dir="ltr">
<head>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesheets/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<!-- Navbar -->
<?php
require 'components/navbar.php';
?>
<!-- End Navbar -->
  <form action="incomingrequests.php" method="post">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Your Inbox</h1>
    <p class="lead">Incoming Playdate Requests</p>
  </div>
</div>

<?php while($rows = mysqli_fetch_assoc($results)) { ?>
  <?php $sender = $rows['sender'] ?>
  <?php $_SESSION['sender'] = $sender ?>
  <?php $date = $rows['playdate'] ?>
  <?php $time = $rows['playtime'] ?>
  <?php $location = $rows['address'] ?>
  <?php $state = $rows['requestingstate'] ?>


<div style="margin-left:5%;width:90%;text-align:center;padding-bottom:100px;">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">

                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                From: <span class="badge badge-pill badge-primary"><?php echo $sender ?></span>
                </button>


            </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                    <div id="msgImage">
                        <img src="https://cdn.pixabay.com/photo/2016/12/13/05/15/puppy-1903313__340.jpg" style="width:300px;"/>
                    </div>
                    <div id="msgContents">
                        Incoming playdate request from <span class="badge badge-pill badge-primary"><?php echo $sender ?></span> !<br>
                        Date: <?php echo $date ?> <br>
                        Time: <?php echo $time ?> <br>
                        Location: <?php echo $location ?>

                    </div>
                    <br>


                    </div>
                    <div id="msgRespond">

                        <!-- <input type="submit" name = "submit" onclick = "index.php"> -->
                        <input type="submit" value="Accept" name = "send" class="btn btn-success">
                        <input type="submit" value = "Decline" name = "decline"class="btn btn-danger">
                    </div>

            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<!-- footer -->
<?php
  require 'components/footer.php';
?>
<!-- end of footer -->
</body>

</html>
