<?php
session_start();
 ?>
<?php
 include_once '../connection.inc.php';
?>

<?php
if(isset($_POST["username"])){
  $_SESSION["receiver"] = $_POST["username"];
  $output = '';
  $query = "SELECT * FROM `pet` WHERE username = '".$_POST["username"]."'";
  $result = mysqli_query($conn, $query);
  $output .= '
  <div class="table-responsive">
    <table class ="table table-bordered"> ';

  while($row = mysqli_fetch_assoc($result)){
    $output .= '
    <tr>
    <td width="30%"><label>Username</label></td>
    <td width="70%">'.$row['username'].'</td>
    </tr>
    <tr>
    <td width="30%"><label>Petname</label></td>
    <td width="70%">'.$row["petname"].'</td>
    </tr>
    <tr>
    <img src= "'.$row["imgURL"].'" alt="" class="img-fluid w-100 mb-3" style="width:900px;">
    </tr>
    <tr>
    <td width="30%"><label>Description</label></td>
    <td width="70%">'.$row["description"].'</td>
    </tr>
    ';
  }
  $output .= "</table></div>";
  echo $output;
}
?>
