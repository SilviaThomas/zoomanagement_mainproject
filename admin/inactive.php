<?php
session_start();
// include('config.php');
$conn = mysqli_connect('localhost','root','','zooproject');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
$todo_id=$_REQUEST['todo_id'];

$sql3="UPDATE tbl_todo set status='0' where todo_id='$todo_id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = " deactivated successfully";
}
header("Location: viewtodo.php");
?>
