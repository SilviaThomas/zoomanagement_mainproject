<?php
  include 'dbconnection.php';
if(isset($_GET["id"]))
 {
    
    $leave=$_GET['id'];
    $select="UPDATE tbl_leave SET status=0 WHERE leave_id='$leave'";
    $result=mysqli_query($conn,$select);
    echo '<script type="text/javascript">alert("deleted successfully.")</script>';
    header('location: leavestatus.php');
   
}
?>