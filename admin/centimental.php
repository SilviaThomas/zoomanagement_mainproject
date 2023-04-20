<?php

require 'dbconnection.php';
$sql1 = "SELECT * FROM tbl_review ";
$result1 = $conn->query($sql1);

?>
<style>
  body{
    background:whitesmoke;
  }
 .container-fluid{
    height:fit-content;
 }
</style>

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
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4 style">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <ol class="breadcrumb">
              
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
                <body>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 style="color:black;">Site Rating Analysis</h2>  
                <?php
if ($result1->num_rows > 0) {
    $texts = array();
    while ($row = $result1->fetch_assoc()) {
        $texts[] = $row["user_review"];
    }
    $url = 'http://127.0.0.1:5000/sentiment';
    $data = json_encode(array('texts' => $texts));
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => $data,
        ),
    );
    $context  = stream_context_create($options);
    $result1 = file_get_contents($url, false, $context);
    $result1 = json_decode($result1, true);
  
    $positive = $result1['positive'];
    $negative = $result1['negative'];
    $neutral = $result1['neutral'];
    $total = $positive + $negative + $neutral;
  
    $pos_percent = ($positive / $total) * 100;
    $neg_percent = ($negative / $total) * 100;
    $neu_percent = ($neutral / $total) * 100;
    $pos_accuracy = ($pos_percent >( $neu_percent+$neg_percent)) ? $pos_percent : (100 -( $neu_percent+$neg_percent));
      $neg_accuracy = ($neg_percent > ($neu_percent+$pos_percent)) ? $neg_percent : (100 - ($neu_percent+$pos_percent));
    $neutral_accuracy = ($neu_percent > ($pos_percent + $neg_percent)) ? $neu_percent : (100 - ($pos_percent + $neg_percent));
  
   } else {
    echo "No comments.";
    $pos_percent = 0;
    $neg_percent = 0;
    $neu_percent=0;
    $neu_percent = 0;
    $pos_accuracy = 0;
    $neg_accuracy = 0;
    $neu_accuracy = 0;
    $neutral_accuracy=0;
  }
  ?>
  <div class="container-fluid">        
      <!-- <h1>Sentiment Analysis </h1> -->
      <div class="chart-container" style="margin-left:10%; width: 50%;
    height: 50%;">
          <canvas id="sentiment-chart"></canvas>
      </div>
      <div>
      <p>Positive: <?php echo $pos_accuracy ; ?></p>
      <p>Negative: <?php echo $neg_accuracy; ?></p>
      <p>Neutral: <?php echo $neutral_accuracy; ?></p>
  </div>
  </div>
  
      <script>
          var ctx = document.getElementById('sentiment-chart').getContext('2d');
          var chart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ['Positive: <?php echo $positive ."/".$total ?>', 'Negative: <?php echo $negative ."/".$total;?>', '<?php echo $neutral ."/".$total; ?>'],
                  datasets: [{
                      label: 'Performance Analysis percentage',
                      data: [<?php echo $pos_percent; ?>, <?php echo $neg_percent; ?>, <?php echo $neu_percent; ?>],
                      backgroundColor: [
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)'
                      ],
                      borderColor: [
                          'rgba(75, 192, 192, 1)',
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)'
                      ],
                      borderWidth: 1,
                    
                  }]
              },
              
              options: {
                  scales: {
                      y: {
                          beginAtZero: true,
                          ticks: {
                              stepSize: 10,
                              max: 100
                          }
                      }
                  }
              }
          });
      </script>

            <div class="text-center">
                <label for="builders">Reviewers</label>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                        <th>Serial No:</th>
                        <th>User Name</th>
                        <th>Rating Value</th>
                        <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql2="SELECT * FROM tbl_review";
                            $result2=mysqli_query($conn,$sql2);
                            $count=1;
                            while($rows=mysqli_fetch_assoc($result2))
                            { 
                                if(mysqli_num_rows($result2)>0)   
                                {                            
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $count ?></th>
                                        <td><?php echo $rows['user_name']; ?></td>
                                        <td><?php echo $rows['user_rating']; ?></td>
                                        <td><?php echo $rows['user_review']; ?></td>
                                    </tr>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            No Data To Show
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $count+=1;
                            }
                            ?>                        
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

