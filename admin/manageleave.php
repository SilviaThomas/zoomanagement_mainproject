<?php
session_start();
require 'dbconnection.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin - manage leave</title>
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
            <h1 class="h3 mb-0 text-gray-800">Manage Leave</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage leave</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>Last Date  </th>
                        <th>Reason</th>
                        <th>Download</th>


                        <th>Action</th>
                        <!-- <th>Action</th> -->
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $login_id =$_SESSION['sid'];
                        $query = "SELECT * FROM tbl_leave WHERE status='pending' ";
                        $query_run = mysqli_query($conn, $query);
                        ?>
                         <?php

                        // if(mysqli_num_rows($query_run) > 0) 
                        while($rows=mysqli_fetch_assoc($query_run))
                        {
                            
                            $a=$rows['reg_id'];
                            // echo "$a";
                            $sq="SELECT * FROM 'tbl_zookeeperreg' WHERE login_id='$a'";
                            $sqq=mysqli_query($conn,$sq);
                            // $row=mysqli_fetch_assoc($sqq);
                            $ss=mysqli_query($conn,"SELECT `email` FROM `tbl_login` WHERE login_id='$a'");
                            $row=mysqli_fetch_assoc($ss);
                            $name=$row['email'];
                            // echo "$name";
                            // while($row=mysqli_fetch_assoc($sqq))
                            // {
                                 
                            // echo" <tr>";

                            //     //echo $animal["AnimalName"]
                            //     echo"<td>".$row['firstname']."</td>";
                            //     echo " </tr>";
                            // }
                                ?>
                                <tr>
                                <td><?=$name;?></td>
                                    
                                    <td><?=$rows['start_date'];?></td>
                                    <td><?=$rows['last_date'];?></td>
                                    <td><?=$rows['reason'];?></td>
                                  <td><a href="../zookeeper/cert_img/<?php echo $rows['med_certificate']; ?>" class="btn btn-info" download="<?php echo $rows['med_certificate']; ?>.pdf">Download</a></td>

                                    
      
        
        
      

                                    <!-- <td><?=$rows['date'];?></td> -->
                                    <td>
                                    <?php
                                    
											echo '<a href="leavedone.php?id='.$rows["leave_id"].'" class="btn btn-success btn-sm">ACCEPT</a>';
                      echo '<a href="leavereject.php?id='.$rows["leave_id"].'" class="btn btn-danger btn-sm">REJECT</a>';
                      
										?>
                    
                    </td> 
                                    
                                    </tr>
                        
                                <?php


                        
                            }

                           
                        // else
                        // {
                        //    echo "<h5> No Record Found </h5>";
                        // }   
                        
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
      <!-- <?php include('includes/footer.php');?> -->
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

