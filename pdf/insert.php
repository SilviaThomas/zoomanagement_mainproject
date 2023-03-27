<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
    <link rel="stylesheet" href="styleA.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">athira@gmail.com</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
      <form class="" action="insert.php" method="post" enctype="multipart/form-data">
      <div class="wrapper">
    <div class="title">
      Add Assignment
    </div>  
    <div class="form">
    
    <div class="inputfield">
      
    <div class="row">
      <div class="col-25">
        <label for="fullname">FULL NAME</label>
      </div>
      <div class="col-75">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="" value="" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">EMAIL</label>
      </div>
      <div class="col-75">
      <input type="email" value="" class="form-control" name="email" id="email" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone">PHONE</label>
      </div>
      <div class="col-75">
      <input type="text" value="" class="form-control" name="phone" id="phone" required>
      </div>
    </div>
          <div class="inputfield">
        <label for="">Choose Your File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        </div> 
        <input id="upload" type="submit" name="submit" value="Upload">
        <?php
        include 'db.php';

        if (isset($_POST['submit'])) {
          $fullname= $_POST['fullname'];
          $email = $_POST['email'];
          $phone= $_POST['phone'];
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO tbl_application(`vaccancy_id`,`pdf`,`fullname`, `email` `phone` ) values('$vacancy_id''$pdf','$fullname','$email','$phone')";
      
          $query=mysqli_query($conn,$sql);



        }



         ?>

      </form>

    </div>

  </body>
</html>
