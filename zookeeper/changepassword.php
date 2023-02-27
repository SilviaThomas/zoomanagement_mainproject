
<form name="chngpwd" action="" method="post" onSubmit="return valid();">
<table align="center">
<tr height="50">
<td>Old Password :</td>
<td><input type="password" name="log_password" id="opwd"></td>
</tr>
<tr height="50">
<td>New Passowrd :</td>
<td><input type="password" name="npwd" id="npwd"></td>
</tr>
<tr height="50">
<td>Confirm Password :</td>
<td><input type="password" name="cpwd" id="cpwd"></td>
</tr>
<tr>
<td><a href="index.php">Back to login Page</a></td>
<td><input type="submit" name="Submit" value="Change Passowrd" /></td>
</tr>
 </table>
</form>




<script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>


<?php
session_start();
include("dbconnection.php");
if(isset($_POST['Submit']))
{
 $log_password=md5($_POST['log_password']);
 $email=$_SESSION['email'];
 $newpassword=md5($_POST['npwd']);
$sql=mysqli_query($conn,"SELECT log_password FROM tbl_login where log_password='$log_password' && email='$email'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($conn,"update tbl_login set password=' $newpassword' where email='$email'");
$_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
}
?>