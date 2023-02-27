<!DOCTYPE html

<html lang="en">
<!-- <?php echo md5("1"); ?> -->
<head>
<script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form validation using HTML CSS & JS | CodeWithNepal</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
  
    <header>Login Form</header>
    <form action="#" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="email" name="email" placeholder="abcd@gmail.com" required>
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" name="log_password" placeholder="Password" required>
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
     	
<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>
      
      
      <div class="pass-txt"><a href="login-system-main/recover_psw.php">Forgot password?</a></div>
      <input type="submit" name="submit" value="Login">
    </form>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <div class="sign-txt">Not yet member? <a href="register.php">sign up</a></div>
    <p><p></p><a href="index.php">Back to Home</a>&nbsp;&nbsp;&nbsp;</p></p>
  </div>


  <script src="script.js"></script>
</body>
</html>
<?php 
  foreach ($_POST as $key => $value) {
    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
  }
?>

<?php
  session_start();
  
  include 'connect.php';
  if(isset($_POST['submit']))
  {
      $email= $_POST['email'];
      $log_password= $_POST['log_password'];
      $encrpass = md5($log_password);
      $sql = "SELECT * from tbl_login where email='$email' AND log_password='$encrpass'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_array($result))
        {
          $id=$row['login_id'];
          $email=$row['emailid'];
          $encrpass=$row['log_password'];
          $role=$row['role'];
          $_SESSION['sid'] = $row['login_id'];
                  $_SESSION['username']=$user_data['firstname'];
                  echo "<script>window.location.href='userhome.php';</script>";
  
          if($role==0)
          {
            $_SESSION['sid'] = $row['login_id'];
            header("location:userhome.php");
          }
          else if($role==1)
          {
            $_SESSION['sid'] = $row['login_id'];
            header("location:admin/dashboard.php");
          }
          else if($role==2)
          {
            $_SESSION['sid'] = $row['login_id'];
            header("location:zookeeper/dashboard.php");
          }
          else{
            echo "<script>alert('Login Failed !! Invalid Email or Password.');</script>";
          }
        }
      }
      else{
        echo "<script>alert('Login Failed !! Invalid Email or Password.');</script>";
      }
  }
?>