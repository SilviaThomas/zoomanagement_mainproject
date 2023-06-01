<?php
    session_start();
    error_reporting(0);
    include('dbconnection.php');
    $n =$_SESSION['sid'];

?>
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
  <!-- <script src="js\createanimal.js"></script> -->
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
                
      <form class="form-sample"  method="post" onsubmit="lo" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          <div class="input-box">
          <form  method="post" action="assigntasks.php" name="firstname"  onsubmit="return Register()" enctype="multipart/form-data">
            <label for="room block">Select Category</label>
              <select id="category" name="category" required onblur="validateDropdown()">
              <option value="" selected disabled>--- Select Option ---</option>
              <?php
                include 'dbconnection.php';
                $assign_type_res= mysqli_query($conn,"SELECT * from tbl_category where status=1");
                if($assign_type_res && mysqli_num_rows($assign_type_res) > 0){
                    while($row= mysqli_fetch_array($assign_type_res)){
                        echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                        // echo "<option value='".$row['roomtype_id']."'>".$row['roomtype']."</option>";

                    } 
                }
              ?>
            </select>
                
                
            </form>
            
            <input type="text" class="form-control" name="AnimalName" id="animalname" placeholder="Animal Name" required onblur="return animalnameValidate()"/>
            <span id="animalnamevalidate" style="color:red;" class="details"></span>
          </div>
          <br>
          <div class="input-box">
            
            <input type="text" class="form-control" name="CageNumber" id="cage" placeholder=" Cage Number" required onblur="return cagenumber()"/>
            <span id="cagenumbervalidate" class="details">CageNumber</span>
          </div>
          <br>
          <!-- <div class="input-box">
            <span class="details">FeedNumber</span>
            <input type="text" class="form-control" name="FeedNumber" id="feed" placeholder=" Feed Number" required>
          </div> -->
          <br>
          <div class="input-box">
           
            <textarea class="form-control" rows="5" cols="50" name="Description" id="details" placeholder="Animal Details" required onblur="return detailsValidate()"></textarea>
            <span id="detailsvalidate" style="color:red;"  class="details"></span> 
          </div>
          <br>
          <div class="input-box">
            <span class="details">Breed</span>
            <input type="text" class="form-control" name="Breed" id="feed" placeholder="Breed" required>
          </div>
          <br>

          <div class="input-box">
            <span class="details">Attach AnimalImage</span>
            <input type="file" name="image" id="animalimage" required>
          </div>
          <br>
         
          <button type="submit" name="submit" class="btn-primary btn">Create</button>

          <!-- <button type="reset" class="btn-inverse btn">Reset</button> -->
          <!-- <input type="submit" value="Register"> -->
        </div>
      </form>
    </div>
  </div>



                
                 
                  <!-- <form class="form-sample"  method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6 pl-md-0">
                      <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Animal Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <input type="text" class="form-control" name="AnimalName" id="animalname" placeholder="Animal Name" required>
                        </div>
                      </div>
                      <div class="form-group col-md-6 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0">Cage Number</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <input type="text" class="form-control" name="CageNumber" id="cage" placeholder=" Cage Number" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6 pl-md-0">
                      <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Feed Number</label>
                        <div class="col-sm-12 pl-0 pr-0">
                         <input type="text" class="form-control" name="FeedNumber" id="feed" placeholder=" Feed Number" required>
                       </div>
                     </div>
                     <div class="form-group col-md-6 pl-md-0">
                      <label class="col-sm-12 pl-0 pr-0">Breed</label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <input type="text" class="form-control" name="Breed" id="breed" placeholder=" Breed" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-6 pl-md-0">
                    <div class="form-group col-md-6 pl-md-0">
                      <label class="col-sm-12 pl-0 pr-0">Animal Details</label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <textarea class="form-control" rows="5" cols="50" name="Description" id="details" placeholder="Animal Details" required></textarea> 
                      </div>
                    </div>
                    <div class="form-group col-md-6 pl-md-0 ">
                      <label class="col-sm-12 pl-0 pr-0 ">Attach Animal Image</label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <input type="file" name="image" id="animalimage" required>
                      </div>
                    </div> 
                  </div>
                  <button type="submit" name="submit" class="btn-primary btn">Create</button>

                  <button type="reset" class="btn-inverse btn">Reset</button>
                </form>
              </div>
            </div>

          </div>
        </div> -->
        
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
  $cat_id = $_POST['category'];
  $AnimalName = $_POST['AnimalName'];
  $CageNumber = $_POST['CageNumber'];
  // $FeedNumber= $_POST['FeedNumber'];
  $Breed = $_POST['Breed'];
  $img=$_FILES["image"]["name"];
	// echo $img;
  //$AnimalImage=$_FILES['AnimalImage'];
  $Description=$_POST['Description'];
  //$CreationDate=$_POST['CreationDate'];
  // $AnimalImage=$_FILES["AnimalImage"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],"an_image/".$img);
  $query = "SELECT * FROM `tbl_animals` where CageNumber='$CageNumber'";
  $result = mysqli_query($conn,$query);

  
   if(mysqli_num_rows($result)>0)
   {
      // echo "item exits";
      echo "<script>alert('Cage Already filled.');window.location.href='create_animal.php'</script>";
  
   }
   else{
    
  $sql="insert into tbl_animals(`cat_id`,`AnimalName`,`CageNumber`,`Breed`,`AnimalImage`,`Description`,`status`) 
        VALUES('$cat_id','$AnimalName','$CageNumber','$Breed','$img','$Description',1)";
        
        $result=mysqli_query($conn,$sql);
   }
        //echo $sql;
       if($result){
        header('location:create_animal.php');
       }else{
        die(mysqli_error($conn));
       }
      
      if($result == true ) {
        echo '<script>alert("sucessfully created");</script>';
   }
  }
      
?>
