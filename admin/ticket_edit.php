<?php
session_start();
include ('dbconnection.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['ticket_edit']))
{
    $ticket_id=$_POST['ticket_id'];
    $ticket_group=$_POST['ticket_group'];
    $price=$_POST['price'];
   
    // $Description = $_POST['Description'];
    $query="UPDATE tbl_tickets SET ticket_group='$ticket_group',price='$price' where ticket_id=$ticket_id";
    $query_run=mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['status'] = "updated successfully";
		echo "
		<script>alert('Updation successfully done.');
		window.location.href= 'manage_animals.php';
		</script>";
    }
    else
    {
        echo "<script>alert('Unable to update record !! Please try again');</script>";
    }
}

?>

<?php
	if(isset($_GET['id'])){
		$ticket_id=$_GET['id'];
		$query=mysqli_query($conn,"select * from tbl_tickets where ticket_id=$ticket_id");
		if(mysqli_num_rows($query)==1){
			$row=mysqli_fetch_array($query);
		}
		else{
			$row=null;
		}
	}
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
  <title>Admin - Create Animal</title>
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

	</div>

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
            <h1 class="h3 mb-0 text-gray-800">Ticket Edit</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Tickets Details</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit tickets</h6>
                  <h6><a href="dashboard.php" class="btn btn-danger float-end">BACK</a></h6>
                  
                </div>


                <div class="card-body">
                    
                
                 
                <form class="form-sample" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" name="ticket_id" value="<?= $row['ticket_id'] ?>">
                      <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Ticket-Group</label>
                        <div class="col-sm-12 pl-0 pr-0">
                        <input type="text" class="form-control" name="ticket_group" placeholder="" value="<?php echo $row['ticket_group'] ?>" required>
                        </div>
                      </div>
                      <div class="form-group col-md-6 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0">Price</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>"  required>
                        </div>
                      </div>
                    </div>

                   
                    </div> 
                    <button type="submit" name="update_ticket" value="update" class="btn-primary btn">Update </button>
                    
                    <!-- <button type="reset" class="btn-inverse btn">Reset</button> -->
                </form>
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
    <?php include('includes/footer.php');?>
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

</body>

</html>    