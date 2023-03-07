<?php
session_start();
include('dbconnection.php');
$id=$_GET['id'];

$sql4="UPDATE tbl_leave set status='accepted' where leave_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "leave accepted sucessfully";
}
header("Location: manageleave.php");
?>
