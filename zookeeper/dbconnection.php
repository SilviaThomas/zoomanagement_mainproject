<?php
  $conn = mysqli_connect('localhost','root','','zooproject');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
  else{
    // echo "Success";
  }
?>
    <?php