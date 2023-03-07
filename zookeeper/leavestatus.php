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
  <title>admin -view todo</title>
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
            <h1 class="h3 mb-0 text-gray-800">View todo</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">view todo</li>
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
                      <th>#</th>
                        <th>start_date</th>
                        <th>last_date</th>
                        <th>reason</th>
                        <th>status</th>
                        <th>Action</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT * FROM tbl_leave Where status='pending' OR status='accepted'OR status='rejected' ";
                        $counter = 0;
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0) 
                        {
                            foreach($query_run as $leave)
                            {
                                //echo $vaccancy["vaccancy_position"]
                                ?>
                                <tr>
                                <td><?php echo ++$counter; ?></td>
                                    
                                    <td><?=$leave['start_date'];?></td>
                                    <td><?=$leave['last_date'];?></td>
                                    <td><?=$leave['reason'];?></td>
                                    <td><?=$leave['status'];?></td>
                                    <td>
                                
										<a href="leavedelete.php?id=<?=$leave['leave_id'];?>" class="btn btn-danger btn-sm">DELETE</a>
                                    
                                   
                                    </td> 
                                    <td>
                                    <?php
                         
                        //  if($todo['status']==0){
                        //    echo '<p><a href="inactive.php?todo_id='.$todo['todo_id'].'$status=0"style="color:red;font-size:17px;">pending</a></p>';
                        //  }else{
                        //    echo '<p><a href="active.php?todo_id='.$todo['todo_id'].'$status=1"style="color:green;font-size:17px;">completed</a></p>';
                        //  }
                         ?>
                         </td>
                              
                                    
                                    <!-- <td><=$todo['comment'];?></td> -->
                                    
                              
                                    
                                     
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

