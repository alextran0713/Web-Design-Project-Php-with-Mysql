<?php require "connection.inc.php"?>
<?php
    session_start();
    //check to see if user login in
    if($_SESSION['is_login']){
        // keep user on page
        $username = $_SESSION['username'];
    }
    else{
        header("location: login.php");
    }
    ?>


<?php

$pet_table='pet';
$reg_table='registration';

$petname     = $_POST['petname'];
$description = $_POST['description'];

$email           = $_POST['email'];
$currentpwd      = $_POST['currentpwd'];
$newpwd          = $_POST['newpwd'];
$confirmpwd      = $_POST['confirmpwd'];
$address1        = $_POST['address1'];
$city            = $_POST['city'];
$state           = $_POST['state'];
$zip             = $_POST['zip'];

if($_SESSION['is_login']){

  // Modify pet table
  $sql = "SELECT * FROM $pet_table WHERE username='$username';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck === 0) {
    $sqlpet = "INSERT INTO $pet_table (username, petname, description) VALUES ('$username','$petname','$description');";
    $result = mysqli_query($conn, $sqlpet);
  }
  else { //$result = true, profile data exist

    // $resultCheck = mysqli_num_rows($result);

    if(!empty($petname)) {
      $sqlpet = "UPDATE $pet_table SET petname= '$petname' WHERE username='$username'";
      $result = mysqli_query($conn, $sqlpet);
    }
    if(!empty($description)) {
      $sqlpet = "UPDATE $pet_table SET description= '$description' WHERE username='$username'";
      $result = mysqli_query($conn, $sqlpet);
    }
  }
  //End modify pet tables


  // Modfy registration tables
    // Modify email
    if (!empty($email)) {
      // Check exist email
      $reg_sql = "SELECT * FROM $reg_table WHERE email='$email';";
      $reg_result = mysqli_query($conn, $reg_sql);
      $reg_resultCheck = mysqli_num_rows($reg_result);

      if ($reg_resultCheck > 0) {
        $email_exist = true;
      }
      else $email_exist = false;


      if ($email_exist === true) {
        echo "Email exist";
      }
      else { // if new email is not exist, then
        $sql = "UPDATE $reg_table SET email= '$email' WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
      }
    } // End modify email

    // Modify password
    if (!empty($currentpwd) && !empty($newpwd) && !empty($confirmpwd)) {
      // get onlinepwd from database
      $reg_sql = "SELECT password FROM $reg_table WHERE username='$username';";
      $reg_result = mysqli_query($conn, $reg_sql);
      $reg_resultCheck = mysqli_num_rows($reg_result);
      if ($reg_resultCheck == 1) {
        while ($row = mysqli_fetch_assoc($reg_result)) {
          $onlinepwd    = $row['password'];
        }
      }
      // hash currentpwd
      $currenthashpass = md5(md5($currentpwd));

      // compare 2 hash value
      if ($onlinepwd === $currenthashpass) $check_currentpwd = true;
      else $check_currentpwd = false;

      // push data to database
      if ($newpwd === $confirmpwd && $check_currentpwd === true) {
        $hashpass = md5(md5($newpwd));

        $sql = "UPDATE $reg_table SET password= '$hashpass' WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
      }
    }  // End Modify password

    // Modify address1
    if (!empty($address1)) {
      $sql = "UPDATE $reg_table SET address1= '$address1' WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
    } // End Modify address1

    // Modify city
    if (!empty($city)) {
      $sql = "UPDATE $reg_table SET city= '$city' WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
    } // End Modify city

    // Modify state
    if (!empty($state)) {
      $sql = "UPDATE $reg_table SET state= '$state' WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
    } // End Modify state

    // Modify zip`
    if (!empty($address1)) {
      $sql = "UPDATE $reg_table SET zip= '$zip' WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
    } // End Modify zip
  // End Modfy registration tables
echo $username;
$conn->close();
header("location: editprofile.php");

}

  ?>
