<!DOCTYPE html>
<html lang="en">
  <!--<?php echo md5("admin"); ?>-->
  <head> <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
    

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <script src="https://www.google.com/recaptcha/api.js" async defer>
</script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logo.svg">
                </div>
            
                <h6 class="font-weight-light">Recover Your Password Here.</h6>
                <!--<form class="pt-3" action="logaction.php" method="post" onsubmit="return login()">-->
                <form name="f1" class="pt-3" action="" method="post" >
                
                  <div class="form-group">

                    <input type="text" class="form-control form-control-lg" id="email_address" onkeyup='emailValidation(this)' name="email" placeholder="Enter Email address" autocomplete="off"  required autofocus>

                    <span id="mail" class="new"  style="color:red;"></span> 

                  </div>
                  
                  <div>
                  </div>
                  <div class="mt-3">
                    <input type="submit" name="recover" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Recover" />
                    
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
              
                   
                  </div>
                
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->

    
    <!-- <script language="javascript">

      function validation(){
        var un = document.getElementById('exampleInputEmail1').value;
        var up = document.getElementById('exampleInputPassword1').value;


        if(un == ""){
          document.getElementById('username').innerHTML ="**Please fill the username field";
          return false;
        }

        if(up == ""){
          document.getElementById('password').innerHTML ="**please enter your password";
          return false;
        }

      }
      </script> -->
      
  </body>
</html>

<?php 

    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'studmgsystem';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    if(!$conn){
        die("Database not connected !!");
    }

    if(isset($_POST["recover"])){
        include('DatabaseCon.php');
        $db=new DatabaseCon();
        $email = $_POST["email"];

        $sql = "SELECT * FROM tbl_login WHERE username='$email'";
        // $query = mysqli_num_rows($sql);
        // $fetch = mysqli_fetch_assoc($sql);
        //$sql="select * from tbl_login where username='$email'";
       //$query = mysqli_num_rows($sql);
        //$fetch = mysqli_fetch_assoc($sql);
        
          $rt=$db->selectQuery($sql);
          $rs= mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($rs);

        if(mysqli_num_rows($rs) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($row["status"] == false){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(5));

            
            $token_sql= "UPDATE tbl_login SET reset_code='$token' WHERE username='$email'";
            //session_start ();
            // $_SESSION['token'] = $token;
            // $_SESSION['user_email'] = $email;
            if(mysqli_query($conn, $token_sql)){
                require "Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                // h-hotel account
                $mail->Username='rittymariyakr2023b@mca.ajce.in';
                $mail->Password='Enter password here';

                // send by h-hotel email
                $mail->setFrom('rittymariyakr2023b@mca.ajce.in', 'Password Reset');
                // get email from input
                $mail->addAddress($_POST["email"]);
                //$mail->addReplyTo('lamkaizhe16@gmail.com');

                // HTML body
                $mail->isHTML(true);
                $mail->Subject="Recover your password";
                $mail->Body="<b>Dear User</b>
                <h3>We received a request to reset your password.</h3>
                <p>Kindly click the below link to reset your password</p>
                http://localhost/Studmanagement/reset_psw.php?username=$email&token=$token
                <br><br>
                <p>With regrads,</p>
                <b>Choice School</b>";

                if(!$mail->send()){
                    ?>
                        <script>
                            alert("<?php echo " Invalid Email "?>");
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            window.alert("  Email send out !  Kindly check your email inbox.");
                            window.location.replace("index.php");
                        </script>
                    <?php
                }
            }
            else{
                echo "<script>alert('Unable to generate token !! Please try later.');</script>";
            }
        }
    }


?>
<script>
function emailValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    var textField = document.getElementById("mail");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'email id  is not valid!!! please insert a valid one';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
</script>


