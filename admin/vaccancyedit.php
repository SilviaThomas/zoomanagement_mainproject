<?php
session_start();
include ('dbconnection.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['update_vaccancy']))
{
  $vaccancy_id=$_POST['vaccancy_id'];
  $vaccancy_position = $_POST['vaccancy_position'];
  $vaccancy_description = $_POST['vaccancy_description'];

  $vaccancy_type = $_POST['vaccancy_type'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
    // $animal_id=$_POST['animal_id'];
    // $AnimalName=$_POST['AnimalName'];
    // $Breed=$_POST['Breed'];
    // $CageNumber = $_POST['CageNumber'];
    // $Description = $_POST['Description'];
    $query="UPDATE tbl_vaccancy SET vaccancy_position='$vaccancy_position',vaccancy_description='$vaccancy_description',vaccancy_type='$vaccancy_type',start_date='$start_date',end_date='$end_date' where vaccancy_id=$vaccancy_id";
    $query_run=mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['status'] = "updated successfully";
		echo "
		<script>alert('Updation successfully done.');
		window.location.href= 'add_vaccancy.php';
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
		$vaccancy_id=$_GET['id'];
		$query=mysqli_query($conn,"select * from tbl_vaccancy where vaccancy_id=$vaccancy_id");
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
            <h1 class="h3 mb-0 text-gray-800">Animal Edit</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Animal</h6>
                  <h6><a href="dashboard.php" class="btn btn-danger float-end">BACK</a></h6>
                  
                </div>


                <div class="card-body">
                    
                <form action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="vaccancy_id" value="<?= $row['vaccancy_id'] ?>">
                <div class="mb-4 field-required">
                    <label for="class_display_name">Position</label>
                    <input type="text" class="form-control" id="class_display_name" placeholder="Eg: Receptionist" name="vaccancy_position" value="<?php echo $row['vaccancy_position'] ?>"required>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_description">Description</label>
                    <textarea name="vaccancy_description" placeholder="...." class="form-control" id="vaccancy_description" cols="30" rows="5"  required><?php echo $row['vaccancy_description'] ?></textarea>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_type">Vacancy Type</label>
                    <select class="custom-select d-block w-100" name="vaccancy_type" id="vaccancy_type" value="<?php echo $row['vaccancy_type'] ?>" required >
                        <option value="permanent" >Permanent</option>;
                        <option value="temporary" >Temporary</option>;
                    </select>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_start_date">Contract Start Date</label>
                    <input type="date"  name= "start_date"  class="form-control" name="start_date" id="start_date" value="<?php echo $row['start_date'] ?>" required>
                </div>
                <div class="mb-4">
                    <label for="v_end_date">Contract End Date</label>
                    <input type="date" name= "end_date" class="form-control" name="end_date" id="end_date" value="<?php echo $row['end_date'] ?>">
                    <small>For temporary vacancy</small>
                </div>
                <button type="submit" name="update_vaccancy" value="update" class="btn-primary btn">Update Vaccancy</button>
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