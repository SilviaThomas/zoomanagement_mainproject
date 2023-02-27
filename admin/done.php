<?php
session_start();
include('dbconnection.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_todo set status='completed' where todo_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Category activated successfully";
}
header("Location: viewtodo.php");
?>
