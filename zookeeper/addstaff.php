<html lang="en">
<head>
<script type="text/javascript">
        function preventBack() {
      <!DOCTYPE html>
      window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };

        function validate()
        {
          var fullname;
          //dept,gender,email,mobile,photo,dob,doj,address;
          fullname=document.getElementById('fullname').value.trim();                       
          
          // dept=document.getElementById('gender').value.trim();
          
          // email=document.getElementById('email').value.trim();
          
          // phone=document.getElementById('phone').value.trim();
          
          // photo=document.getElementById('photo');

          // dob=document.getElementById('dob').value.trim();
          
          // doj=document.getElementById('join_date').value.trim();

          if(fullname=="")
          {
            document.getElementById('name_error').display="block";
            document.getElementById('name_error').innerHTML="**Please fill your name**";
            return false;

          }
          if( /^[a-zA-Z]+$/.test(fullname)==false)
          {
            document.getElementById('name_error').display="block";
            document.getElementById('name_error').innerHTML="**Invalid name**";
            return false;
          }
          else
          {
            document.getElementById('name_error').display="block";
            return true;
          }
          
        }
    </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>create employee</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap{
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include('includes/sidebar.php');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('includes/header.php');?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employee</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add EMPLOYEE Details</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">ADD EMPLOYEES</h6>
                  
                </div>
                <div class="card-body">
                
      <form class="form-sample"  method="post" enctype="multipart/form-data" action="#" onsubmit="return validate()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">full Name</span>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="fullname" onclick="return validate()" onblur="return validate()">
          </div>
          <span id="name_error" style="color:red;font-weight:bolder;"></span>
          <br>
          <div class="input-box">
          <form  method="post" action="addstaff.php" name="department"  onsubmit="return Register()" enctype="multipart/form-data">
            <label for="room block">Department</label>
              <select id="department" name="department" required>
              <option value="" selected disabled>--- Select Option ---</option>
              <?php
                $dept_type_res= mysqli_query($conn,"SELECT * from tbl_department where status=1");
                if($dept_type_res && mysqli_num_rows($dept_type_res) > 0){
                    while($row= mysqli_fetch_array($dept_type_res)){
                        echo "<option value='".$row['department']."'>".$row['department']."</option>";
                        // echo "<option value='".$row['roomtype_id']."'>".$row['roomtype']."</option>";

                    } 
                }
              ?>
            </select>
            
          <br>
          <div class="input-box">
            <span class="details">Gender</span>
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" required> 
          </div>
          <br>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" class="form-control" name="email" id="email" placeholder="email" required>
          </div>
          <br>
        
          <div class="input-box">
            <span class="details">Mobile Number</span>
            <input type="text" class="form-control" name="phone" id="phone" placeholder=" phone Number" required>
          </div>
          <br>

          <div class="input-box">
            <span class="details">PHOTO</span>
            <input type="file" name="image" id="photo" required>
          </div>
          <br>
          <br>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="date" class="form-control" name="dob" id="dob" placeholder="date of birth" required>
          </div>
          <br>
        
          <div class="input-box">
            <span class="details">Date Of Joining</span>
            <input type="date" class="form-control" name="join_date" id="join_date" placeholder="date of Joining" required>
          </div>
          <br>
          
          <div class="input-box">
            <span class="details">Address</span>
            <textarea class="form-control" rows="5" cols="50" name="address" id="address" placeholder="address" required></textarea>
          </div>
          <br>
         
          <button type="submit" name="submit" class="btn-primary btn" onclick="return validate()">Create</button>

          <!-- <button type="reset" class="btn-inverse btn">Reset</button> -->
          <!-- <input type="submit" value="Register"> -->
        </div>
      </form>
    </div>
  </div>



                
                 
        <!--Row-->

        <!-- Modal Logout -->
        <?php include('includes/modal.php');?>

      </div>
      <!---Container Fluid-->
    </div>
   
  </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>

</body>

</html>


<?php
$conn = mysqli_connect('localhost','root','','zooproject');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error."<br>");
}
else{
  // echo "Success";
}


if(isset($_POST['submit'])){
  $fullname = $_POST['fullname'];
  $department = $_POST['department'];
  // $FeedNumber= $_POST['FeedNumber'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $img=$_FILES["image"]["name"];
	// echo $img;
  // $img=$_FILES["photo"]["name"];
	// echo $img;
  //$AnimalImage=$_FILES['AnimalImage'];
  $dob=$_POST['dob'];
  $join_date = $_POST['join_date'];
  $address = $_POST['address'];
  move_uploaded_file($_FILES["image"]["tmp_name"],"employee_img/".$img);
 
  $sql="insert into tbl_staff(`fullname`,`department`,`gender`,`email`,`phone`,`dob`,`photo`,`join_date`,`address`,`status`) 
        VALUES('$fullname','$department','$gender','$email','$phone','$dob','$img','$join_date','$address',1)";
        
        $result=mysqli_query($conn,$sql);
        //echo $sql;
       if($result){
        echo '<script>window.location.href="addstaff.php";</script>';
       }else{
        die(mysqli_error($conn));
       }
      
      if($result == true ) {
        echo '<script>alert("sucessfully created");</script>';
   }
  }
      
?>
