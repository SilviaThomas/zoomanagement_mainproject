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
                  <th>Assigned From</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Comments</th>
                  <th>Action</th>
                </tr>
                <tr>

                  <td><?php echo $n++; ?></td>
                  <td><?php echo $value['todo_name']; ?></td>
                  <td><?php echo $value['user_name']; ?></td>
                  <td><?php echo $value['todo_date']; ?></td>
                  <?php if ($value['todo_status'] == 0): ?>
                  <td><span class="label label-warning">Pending</span></td>
                  <?php else: ?>
                    <td><span class="label label-success">Completed</span></td>
                  <?php endif; ?>
                  <td><?php $comment = $value['todo_comment']; echo form_textarea(['name' => 'todo_comment', 'class' => 'form-control', 'id' => 'todo_comment', 'placeholder' => 'Enter ToDo Comment', 'rows' => '2', 'value' => $comment]); ?></td>
                  <?php echo form_hidden("todoid", $todId); ?>
                  <?php if( date("Y-m-d") != $value['todo_date'] or $value['todo_status'] != 0 ): ?>
                  <td><?php echo form_submit('', 'Done', ['class' => 'btn btn-success', 'disabled' => '' ]); ?></td>
                  <?php else: ?>

                    <td><?php echo form_submit('', 'Done', ['class' => 'btn btn-success' ]); ?></td>
                  <?php endif; ?>
                </tr>
                <?php echo form_close(); ?>

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

