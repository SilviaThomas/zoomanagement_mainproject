<html lang="en">

<head>
<script type="text/javascript">
        function preventBack() {
      <!DOCTYPE html>
      window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin - Create Animal</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <script src="js/dept.js"></script>
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
            <h1 class="h3 mb-0 text-gray-800">Animals</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Animal Detail</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Animal</h6>
                  
                </div>
                <div class="card-body">
                
      <form class="form-sample"  method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Department</span>
            <input type="text" class="form-control" name="department" id="department" placeholder="department" required onblur="return deptValidate();">
            <div><span id="validatedepartment" style="color:red;" class="validate"></span></div>
          </div>
          <br>
       
          <button type="submit" name="submit" class="btn-primary btn">ADD</button>

          <!-- <button type="reset" class="btn-inverse btn">Reset</button> -->
          <!-- <input type="submit" value="Register"> -->
        </div>
      </form>
    </div>
  </div>



                
                 
                  
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
  $department = $_POST['department'];
  $query = "SELECT * FROM `tbl_department` Where department='$department'";
$result = mysqli_query($conn,$query);

 if(mysqli_num_rows($result)>0)
 {
    // echo "item exits";
    echo "<script>alert('Department Already Exist.');window.location.href='add_department.php'</script>";

 }
else{
 
  
  
  $sql="insert into tbl_department(`department`,`status`) 
        VALUES('$department',1)";
        
        $result=mysqli_query($conn,$sql);
}
        //echo $sql;
       if($result){
        echo '<script>window.location.href="add_department.php";</script>';
       }else{
        die(mysqli_error($conn));
       }
      
      if($result == true ) {
        echo '<script>alert("sucessfully created");</script>';
   }
  }
      
?>
