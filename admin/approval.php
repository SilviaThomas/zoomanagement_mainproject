<?php

include("dbconnection.php");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $lId=$_GET['id'];
  $result=mysqli_query($conn,"UPDATE tbl_application SET status='2' where application_id=$lId");
  
}
if($result)
{
echo "<script>alert(' accepted successfully. Thank you');window.location='view_application1.php';</script>";
}
?>