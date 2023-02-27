<?php
session_start();
// include('../admin_coonect.php');

  $conn = mysqli_connect('localhost','root','','zooproject');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }

$todo_id=$_REQUEST['todo_id'];

$sql4="UPDATE tbl_todo set status='1' where todo_id='$todo_id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = " activated successfully";
}
header("Location:viewtodo.php");
?>
