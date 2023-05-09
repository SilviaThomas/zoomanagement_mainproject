

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
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link href="img/logo/logo.png" rel="icon"> -->
  <title>Admin - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
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
        <!-- <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div> -->
          <!--  -->
            
<div class="container-fluid">

<!-- Page Heading
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div> -->

<!-- Content Row -->
<div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="text-xs h6 font-weight-bold text-primary text-uppercase mb-1">Select a date & Predict</div><br>
                        
                    <input type="date" id="days"  class="display-inline-block" style="margin-right: 10px;width: 200px;height: 40px;font-size: 20px;font-weight: bold;border-radius: 5px;text-align: center;">
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-100"></i>
                        </div>
                    </div><br>
                    <button style="margin-right: 10px;width: 200px;height: 40px; border-radius: 5px;" onclick="predictNow()">Predict</button>
                </div>
            </div>
        </div>
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>

</div>



    
  
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>



<script src="vendor/jquery/jquery.min.js"></script>
<script>
    const dateInput = document.getElementById("days");
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1); // get tomorrow's date
    const twentyDaysLater = new Date();
    twentyDaysLater.setDate(twentyDaysLater.getDate() + 365); // get the date 20 days from tomorrow
    const minDate = tomorrow.toISOString().split("T")[0]; // convert to ISO string and get date part
    const maxDate = twentyDaysLater.toISOString().split("T")[0]; // convert to ISO string and get date part
    dateInput.min = minDate; // set the minimum date
    dateInput.max = maxDate; // set the maximum date
    $(document).ready(function(){
        
    })

    function getSeason(d) {
      const dateString = d;
      const date = new Date(dateString);

        // Get the month and day of the month from the date
        const month = date.getMonth();
        const day = date.getDate();

        // Determine the season based on the month and day
        if (month === 0 || month === 1 || (month === 2 && day < 20)) {
          return 'winter';
        } else if (month === 2 || month === 3 || (month === 4 && day < 21)) {
          return 'spring';
        } else if (month === 4 || month === 5 || (month === 6 && day < 22)) {
          return 'summer';
        } else if (month === 6 || month === 7 || (month === 8 && day < 23)) {
          return 'fall';
        } else {
          return 'winter';
        }
    }


    function predictNow(){
      const dateInput = document.getElementById("days").value;
      if(dateInput == null || dateInput == ""){
        alert("please provide a date")
        return
      }
      var date = getSeason(dateInput)

      $.get('http://127.0.0.1:5000/predict?q='+date)
      .done(function(response) {
        var xValues = ["Visitors"];
        var yValues = [response.predicted_visitors];
        var barColors = [
          "#b91d47"
        ];

        new Chart("myChart", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Prediction result"
            }
          }
        });

      })
      .fail(function(error) {
        console.error('Request failed:', error);
        alert("error to fetch predicted data from ML server")
      });

     

      
    }
  </script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>/