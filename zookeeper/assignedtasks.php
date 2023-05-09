<?php

session_start();
error_reporting(0);
include('dbconnection.php');
$login_id =$_SESSION['sid'];



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
  <title>zookeeper-assigned tasks
  </title>
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
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">view todo</li>
            </ol>
          </div>
          <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">My ToDo Task List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
                <tbody><tr>
                  
                  <th>#</th>
                  <th>Task Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Time </th>
                  <th>Action</th>
                </tr>
                <tr>

                </thead>
                      <tbody>
                        <?php
                        $login_id_sql="SELECT * from tbl_zookeeperreg WHERE login_id= $login_id";
                        $login_query= mysqli_query($conn, $login_id_sql);
                        if($login_query){
                          $reg_id= mysqli_fetch_array($login_query)['reg_id'];
                        }
                        else{
                          $reg_id=-1;
                          echo "<script>alert('Unable to get the data !!');";
                        }
                        $query = "SELECT * FROM tbl_todo where reg_id = '$reg_id' ";
                        $counter = 0;
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0) 
                        {
                            foreach($query_run as $todo)
                            {
                                //echo $vaccancy["vaccancy_position"]
                                ?>
                                <tr>
                                <td><?php echo ++$counter; ?></td>
                                    
                                    <td><?=$todo['taskname'];?></td>
                                    <td><?=$todo['date'];?></td>
                                    <td><?=$todo['status'];?></td>
                                    <td><?=$todo['task_time'];?></td>
                                    <td>
                                    <?php
										if($todo['status']!="completed"){
											echo '<a href="donn.php?id='.$todo["todo_id"].'" class="btn btn-success btn-sm">DONE</a>';
										}
										else{
											echo '<small>Already action performed</small>';
										}
                  }
                }
                                    ?>
                                   
                  
              </tbody></table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>

        
          
                        
                      
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

