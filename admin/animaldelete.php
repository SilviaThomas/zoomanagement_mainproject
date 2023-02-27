<?php
  include 'dbconnection.php';
if(isset($_GET["id"]))
 {
    
    $animal=$_GET['id'];
    $select="UPDATE tbl_animals SET status=0 WHERE animal_id='$animal'";
    $result=mysqli_query($conn,$select);
    echo '<script type="text/javascript">alert("deleted successfully.")</script>';
    header('location: manage_animals.php');
   
}