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
        $query = "SELECT * FROM inbox WHERE sender = '$username'";
        $results = mysqli_query($conn, $query);

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
          <h1 class="display-4">Sent Requests</h1>
          <p class="lead">Incoming Messages</p>
        </div>
      </div>

      <?php while($rows = mysqli_fetch_assoc($results)) { ?>
        <?php $receiver = $rows['receiver']?>
        <?php $state = $rows['requestingstate'] ?>


      <!-- <div style="margin-left:5%;width:90%;text-align:center;padding-bottom:100px;"> -->
          <div class="accordion" id="accordionExample">
              <div class="card">
                  <div class="card-header" id="headingOne">
                  <h2 class="mb-0">

                      Request made to <span><?php echo $receiver ?>
                      <?php if($state == "pending") {  ?> is <?php echo $state; } ?>
                    <?php if($state != "pending") {  ?> was <?php echo $state ?>ed <?php } ?>





                      </button>


                  </h2>
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
