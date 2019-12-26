<?php
    include_once 'db/connection.inc.php';
    $table='pets';
    $sql = "SELECT `img_dir` FROM `pet` WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $img_dir = $row["img_dir"];
      // echo "img_dir is " .$img_dir. "<br/>";
      echo '<img src="'.$img_dir. '">';
    }
    $conn->close();
 ?>
