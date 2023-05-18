<?php
session_start();
include('dbconnection.php');
$id=$_GET['id'];

$sql4="UPDATE tbl_todo set status='completed' where todo_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = " activated successfully";
}
header("Location:assignedtasks.php");
?>