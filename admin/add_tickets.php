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
  <title>Admin - Add Tickets</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <script src="js/ticket.js"></script>
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
              <li class="breadcrumb-item active" aria-current="page">Add Tickets</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-7">
              <!-- Form Basic -->
              <div class="card mb-2">
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
            <h1 class="h3 mb-4 text-gray-800">Add Tickets</h1>
            <form action="" method="post">
                <input type="hidden" name="vacancy_id" value="">
                <div class="mb-4 field-required">
                    <label for="class_display_name">Ticket Groups</label>
                    <input type="text" value="" class="form-control" id="class_display_name" placeholder="Ticket Groups" name="ticket_group" required onblur ="return ticketGroupValidate();">
                    <div><span id="ticketvalidate" style="color:red;" class="validate"></span></div>
                  </div>
                <div class="mb-4 field-required">
                <label for="class_display_name">Price</label>
                    <input type="text" value="" class="form-control" id="class_display_name" placeholder="Price" name="price" required onblur ="return ticketpriceValidate();">
                    <div><span id="pricevalidate" style="color:red;" class="validate"></span></div>
                </div>
                
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">ADD</button>
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
  $ticket_group = $_POST['ticket_group'];
  $price = $_POST['price'];
  $query = "SELECT * FROM `tbl_tickets` Where ticket_group='$ticket_group'";
$result = mysqli_query($conn,$query);

 if(mysqli_num_rows($result)>0)
 {
    // echo "item exits";
    echo "<script>alert('ticket group Already Exist.');window.location.href='add_tickets.php'</script>";

 }
else{

 
  
  $sql="insert into tbl_tickets(`ticket_group`,`price`,`status`) 
        VALUES('$ticket_group','$price',1)";
        
        $result=mysqli_query($conn,$sql);
}
        //echo $sql;
       if($result){
        echo '<script>window.location.href="add_tickets.php";</script>';
       }else{
        die(mysqli_error($conn));
       }
      
      if($result == true ) {
        echo '<script>alert("sucessfully created");</script>';
   }
  }
      

?>


        
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
                  <table border='1'  id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Ticket Groups</th>
                        <th>price</th>
                        <th>Actions</th>
                        
                        
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT * FROM tbl_tickets where status='1'";
                        $counter = 0;
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0) 
                        {
                            foreach($query_run as $tickets)
                            {
                                //echo $vaccancy["vaccancy_position"]
                                ?>
                                <tr>
                                <td><?php echo ++$counter; ?></td>
                                    <td><?=$tickets['ticket_group'];?></td>
                                    <td><?=$tickets['price'];?></td>
                                    
                                    
                                    <td>
                                        <a href="ticket_edit.php?id=<?=$tickets['ticket_id'];?>" class="btn btn-success btn-sm">Edit</a> 
                                        <!-- <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_animal" value="<?=$vaccancy['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                          -->
                                          <a href="vaccancydelete.php?id=<?=$tickets['vaccancy_id'];?>" class="btn btn-danger btn-sm">DELETE</a>
                                          
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
