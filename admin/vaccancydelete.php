<?php
  include 'dbconnection.php';
if(isset($_GET["id"]))
 {
    
    $vaccancy=$_GET['id'];
    $select="UPDATE tbl_vaccancy SET vaccancy_status=0 WHERE vaccancy_id='$vaccancy'";
    $result=mysqli_query($conn,$select);
    echo '<script type="text/javascript">alert("deleted successfully.")</script>';
    header('location: view_vaccancy.php');
   
}