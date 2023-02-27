<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript">
        function preventBack() {
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
  <title>Admin - Add Vaccancy</title>
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
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  
                </div>
                <div class="card-body">
    <div class="row pb-5">
        <div class="col-md-8 order-md-1">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800">Vacancy</h1>
            <form action="#" method="post">
                <input type="hidden" name="vacancy_id" value="">
                <div class="mb-4 field-required">
                    <label for="class_display_name">Position</label>
                    <input type="text" value="" class="form-control" id="class_display_name" placeholder="Eg: Receptionist" name="vaccancy_position" required>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_description">Description</label>
                    <textarea name="vaccancy_description" placeholder="...." class="form-control" id="vaccancy_description" cols="30" rows="5" required></textarea>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_type">Vacancy Type</label>
                    <select class="custom-select d-block w-100" name="vaccancy_type" id="vaccancy_type" required >
                        <option value="permanent" >Permanent</option>;
                        <option value="temporary" >Temporary</option>;
                    </select>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_start_date">Contract Start Date</label>
                    <input type="date"  name= "start_date" value="" class="form-control" name="start_date" id="start_date" required>
                </div>
                <div class="mb-4">
                    <label for="v_end_date">Contract End Date</label>
                    <input type="date" name= "end_date" value="" class="form-control" name="end_date" id="end_date">
                    <small>For temporary vacancy</small>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Vacancy</button>
            </form>
        </div>
    </div>
</div>

<?php
$conn = mysqli_connect('localhost','root','','zooproject');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error."<br>");
}
else{
  // echo "Success";
}


if(isset($_POST['submit'])){
  $vaccancy_position = $_POST['vaccancy_position'];
  $vaccancy_description = $_POST['vaccancy_description'];

  $vaccancy_type = $_POST['vaccancy_type'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  
  $sql="insert into tbl_vaccancy(`vaccancy_position`,`vaccancy_description`,`vaccancy_type`,`start_date`,`end_date`,`vaccancy_status`) 
        VALUES('$vaccancy_position','$vaccancy_description','$vaccancy_type','$start_date','$end_date',1)";
        
        $result=mysqli_query($conn,$sql);
        //echo $sql;
       if($result){
        header('location:add_vaccancy.php');
       }else{
        die(mysqli_error($conn));
       }
      
      if($result == true ) {
        echo '<script>alert("sucessfully created");</script>';
   }
  }
      
?>
