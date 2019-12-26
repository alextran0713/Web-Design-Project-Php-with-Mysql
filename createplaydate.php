
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php require "connection.inc.php"?>

<?php
    session_start();
    //check to see if user login in
    if(isset($_SESSION['is_login'])){
        // keep user on page
        
        $sender = $_SESSION['username'];
        $receiver = $_SESSION['receiver'];
        
        
        $query_imgURL = "SELECT imgURL FROM registration WHERE username = '$receiver'";
        $imgURL = mysqli_query($conn, $query_imgURL);

        if(isset($_POST['send'])) {
          $date = $_POST['date'];

          $time = $_POST['time'];

          $location = $_POST['location'];

          $_POST['requestingstate'] = "pending";
          $state = $_POST['requestingstate'];
          $_SESSION['user2'] = $receiver;

          //otherwise continue
          $query = "INSERT INTO inbox (sender,receiver,playdate,playtime,address, requestingstate)
                    VALUES('$sender', '$receiver', '$date', '$time', '$location', '$state')";
          mysqli_query($conn, $query);
          if($query){ header("Location: confirmation.php");}


        }
    }
    else{
        header("location: login.php");
    }
?>






<!-- ============================================================================== -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
    img {
      border-radius: 50%;
    }
    </style>
    <title>Setting up Playdate</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php
    require 'components/navbar.php';
    ?>
    <!-- End Navbar -->
    <form action="createplaydate.php" method="post">



    <div style="margin-left:5%;width:90%;text-align:center;padding-bottom:100px;">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">

            <h2 class="mb-0">
              To: <?php echo $receiver ?> <span class="badge badge-pill badge-primary"></span>
              </button>


            </h2>


          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <div id="msgContents">
                <!-- <div>
                  <label for="to">To : </label>
                  <input type="text" name="user2" required>
                </div> -->
                <div>
                  <label for="date">Date : </label>
                  <input type="date" name="date" required>
                </div>

                <div>
                  <label for="time">Time : </label>
                  <input type="time" name="time" required>
                </div>

                <div>
                  <label for="location">Meeting Location : </label>
                  <input type="text" name="location" required>
                </div>
              </div><br>

              <div id="msgRespond">
                <button type="button" name = "Cancel" class="btn btn-danger"><a style="text-decoration:none;color:white" href="index.php">Cancel</a></button>
                <input type="submit" value = "Send" name = "send" class="btn btn-success"><!--<a style="text-decoration:none;color: white"href="confirmation.php"--></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- footer -->
    <?php
      require 'components/footer.php';
    ?>
    <!-- end of footer -->
  </form>


  </body>
</html>
