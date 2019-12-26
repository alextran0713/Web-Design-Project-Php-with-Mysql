<?php require "connection.inc.php"?>
<?php
    session_start();
    //check to see if user login in
    if($_SESSION['is_login']){
        // keep user on page
        $username = $_SESSION['username'];

        $pet_table='pet';
    }
    else{
        header("location: login.php");
    }
?>

<?php
  // include_once '../connection.inc.php';
  if($_SESSION['is_login']){


    if (isset($_POST['submit'])) {
      $file = $_FILES['file']; // name of the file is file from InvalidArgumentException
      // print_r ($file);
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];

      $fileExt = explode('.', $fileName);
      // print_r ($fileExt);
      $name = $fileExt[0]; // name of the file without extention
      // print_r ($name);

      $fileActualExt = strtolower(end($fileExt));
      // print_r ($fileActualExt);

      $allowed = array('jpg', 'jpeg', 'png', 'pdf');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize <5000000) { //500kb = 5 Mb
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;

            move_uploaded_file($fileTmpName, $fileDestination);

            // Profile not exist
            $sql = "SELECT * FROM $pet_table WHERE username='$username';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck === 0) {
              $sqlpet = "INSERT INTO $pet_table (username, imgURL) VALUES ('$username','$fileDestination');";
              $result = mysqli_query($conn, $sqlpet);
            }
            else { //$result = true, profile exist
              $sql = "UPDATE $pet_table SET imgURL= '$fileDestination' WHERE username='$username'";
              $result = mysqli_query($conn, $sql);
            }

          } // size
          else {
              echo "Your file is too big!";
          }
        } // file error
        else {
          echo "There was an error uploading your file!";
        }
      } // Check file type
      else {
          echo "You cannot upload files of this type!";
      }
    } // button hit

    $conn->close();
    header("location: editprofile.php");
  } // Check login
 ?>
