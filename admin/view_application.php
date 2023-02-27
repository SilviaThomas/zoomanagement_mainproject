<?php

require 'dbconnection.php'

?>

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
  <title>job application</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">view job application</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Animals</li>
            </ol>
          </div>

        
          <div class="row">
            <!-- Datatables -->
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div >
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      <th scope="col">#</th>
                                        <th scope="col">Applicant Fullname</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Applied Position</th>
                                        <th scope="col">Actions/Info</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        
                        $count = 1;

                        $query = "SELECT * FROM tbl_application natural join tbl_vaccancy ";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0) 
                        {
                            foreach($query_run as $application)
                            {
                                //echo $animal["AnimalName"]
                                $vacancy_id=$application['vaccancy_id'];
                                $query_app= "select *from tbl_vaccancy where vaccancy_id='$vacancy_id'";
                                $app=mysqli_query($conn,$query_app);
                                $res=mysqli_fetch_array($app);
                                ?>
                                <tr>
                                    <td scope="row"><?= $count++ ?></td>
                                    <td><?=$application['fullname'];?></td>
                                    <td><?=$application['email'];?></td>
                                    <td><?=$application['phone'];?></td>
                                    <td><a href="../../files/cv/<?= $application['a_cv'] ?>" class="btn btn-secondary">Download</a></td>
                                    <td><?php echo $res['vaccancy_position']; ?></td>
                                    <td>
                                    <td>

                                    <?php
                                      if('status'==1){
                                        echo '<p><b><a href="pending.php?id='.$res['application_id'].'$status=0"style="color:Green;font-size:17px;">Approve</a></b></p>';
                                      }else{
                                        echo '<p><b><a href="pending.php?id='.$res['application_id'].'$status=0"style="color:Green;font-size:17px;">Approve</a></b></p>';
                                      }
                                      ?>
                                      </td>

                                      <td>
              
                                    <?php
                                              if($row['status']==0){
                                                echo '<p><b><a href="reject.php?id='.$row['application_id'].'$status=1"style="color:red;font-size:17px;">Reject</a></b></p>';
                                              }else{
                                                echo '<p><b><a href="reject.php?id='.$row['application_id'].'$status=1"style="color:red;font-size:17px;">Reject</a></b></p>';
                                              }
                                              ?>
                                                          </td>
                                                          
                                                          </tr>
                                                      <?php


                            }

                        }    
                        else
                        {
                           echo "<h5> No Record Found </h5>";
                        }   
                        
                        ?>

                    
                      
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <?php include('includes/modal.php');?>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
     
      <!-- Footer -->
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
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  
</body>

</html>

