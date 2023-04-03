<?php
    session_start();
    error_reporting(0);
    include('dbconnection.php');
    $n =$_SESSION['sid'];

	// session_start();
  //   error_reporting(0);
  //   include('dbconnection.php');
  //   $login_id =$_SESSION['sid'];


  /*
$ticketTable = new Table('tickets');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $totalPrice = $_POST['adult_num'] * 60 + $_POST['child_num'] * 20 + $_POST['student_num'] * 30;
    if ($totalPrice == 0) {
        header('Location:ticket_booking?msg=Booking failed. You must select at least one ticket&type=danger');
    } else {
       
        header('Location:ticket_booking.php?msg=Ticket booked successfully!! Your total price is: Rs' . $totalPrice . '&type=success');
    }
}
$title = "Zoo - Ticket";
*/
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
    <meta charset="utf-8" />
    <title>ticket-booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <script src="js/booking.js"></script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="js/tbooking.js"></script>
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number]{
			-moz-appearance: textfield;
		}

	</style>
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-map-marker-alt text-primary me-2"></small>
            <small>123 Street, Thiruvanamthapuram, KERALA</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center py-3">
            <small class="far fa-clock text-primary me-2"></small>
            <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
          </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-phone-alt text-primary me-2"></small>
            <small>+012 345 6789</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-sm-square bg-white text-primary me-1" href=""
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" href=""
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" href=""
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-0" href=""
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <a href="index.html" class="navbar-brand p-0">
        <img class="img-fluid me-3" src="img/icon/icon-10.png" alt="Icon" />
        <h1 class="m-0 text-primary">Zoofari</h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
          <a href="userhome.php" class="nav-item nav-link active">Home</a>
          <a href="about.php" class="nav-item nav-link">About</a>
          <a href="service.php" class="nav-item nav-link">Services</a>
          <a href="Gallery.php" class="nav-item nav-link">Gallery</a>
          
          <a href="viewuservaccancy.php" class="nav-item nav-link">Vaccancies</a>
          <!-- <a href="Register.php" class="nav-item nav-link">Registration</a>
          <a href="Login.php" class="nav-item nav-link">Login</a> -->
          
          <!-- <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              >Animals</a -->
            <!-- > -->
            <a href="animals.php" class="nav-item nav-link">Animals</a>
            <!-- <div class="dropdown-menu rounded-0 rounded-bottom m-0">
              <a href="animals.php" class="dropdown-item"> Animals</a> -->
              <!-- <a href="membership.html" class="dropdown-item">Membership</a>
              <a href="visiting.html" class="dropdown-item">Visiting Hours</a>
              <a href="testimonial.html" class="dropdown-item">Testimonial</a>
              <a href="404.html" class="dropdown-item">404 Page</a> -->
            </div>
           </div>
           
          <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>
        <a href="ticket_booking.php" class="btn btn-primary"
          >Buy Ticket<i class="fa fa-arrow-right ms-3"></i
        ></a>
      </div>
      <a href="logout.php" class="nav-item nav-link">Logout</a>
    </nav>
    <div id="wrapper">
		
		<!-- start header -->
    
		
<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Book Tickets</h2> <!-- needs 600x400 image -->
        <div class="row">
            <div class="col-8">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Ticket Group</th>
                        <th>price</th>
                        
                        
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT * FROM tbl_tickets where status='1'";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0) 
                        {
                            foreach($query_run as $tickets){
                                //echo $vaccancy["vaccancy_position"]
                                ?>
                                <tr>
                                    <td><?=$tickets['ticket_group'];?></td>
                                    <td id="tick_<?=$tickets['ticket_group'];?>"><?=$tickets['price'];?></td>
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
                  

                <div class="mt-5">
                    <h5>Select Number of Tickets</h5>
                    <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-' . $_GET['type'] . ' alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                         </div>';
                    } ?>
                    <form action="ticket_booking.php" method="POST">
                      
                    <table class="table:stripped">
                        <div class="form-group row">
                            <label for="regular" class="col-sm-2 col-form-label">Adult:</label>
                            <div class="col-sm-4">
                            <input type="number" onkeyup="readData(0);" id="adult" name="adult" placeholder="adult" min="1" id="availidate" required onblur="return adultValidate();">
                            <input type="text" name="adult_price" id="adult_price" hidden>
                            <div><span id="adultvalidate" style="color:red;" class="validate"></span></div> 
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="student" class="col-sm-2 col-form-label">Student:</label>
                            <div class="col-sm-4">
                            <input type="number" id="student" onkeyup="readData(1);" name="student" placeholder="student" min="1" id="cvalidate" required onblur="return studentValidate();">
                            <input type="text" name="student_price" id="student_price" hidden>
                            <div><span id="childvalidate" style="color:red;" class="validate"></span></div> 
                          </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="child" class="col-sm-2 col-form-label">Child:</label>
                            <div class="col-sm-4">
                            <input type="number" id="child" onkeyup="readData(2);" name="child" placeholder="child" min="1" id="chvalidate" required onblur="return childValidate();">
                            <input type="text" name="child_price" id="child_price" hidden>
                            <div><span id="cvalidate" style="color:red;" class="validate"></span></div>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-4">
                                <input type="date" id="date" name="date" min= "<?php echo date('Y-m-d');?>"required onblur="return dateValidate();">
                                <div><span id="datevalidate" style="color:red;" class="validate"></span></div>
                            </div>
                        </div>
                        <!-- <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" name="cal_price_submit" value="save">
                            </div> -->
                        </div>
                  </table>
                    </form>

                    <?php
    
 $conn = mysqli_connect('localhost','root','','zoosystem');

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error."<br>");
}
else{
  // echo  "Success";
}
?>
<!-- <php
$price = $price; // the price of the item
$quanti = 2; // the quantity of the item
$tax_rate = 0.1; // the tax rate as a decimal

$sub_total = $price * $quantity; // calculate the subtotal
$tax_amount = $sub_total * $tax_rate; // calculate the tax amount
$total_amount = $sub_total + $tax_amount; // calculate the total amount

echo "Subtotal: $" . number_format($sub_total, 2) . "<br>"; 
echo "Tax: $" . number_format($tax_amount, 2) . "<br>"; 
echo "Total: $" . number_format($total_amount, 2); -->


<tr></div>
<div>
<div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">TOTAL AMOUNT</h5>
    <p class="card-text" id="total_price_txt"></p>
    <td><input type="submit" class="btn btn-primary" name="cal_price_submit" value="save">
    <!-- <a href="#" class="btn btn-primary">Make Payment</a> -->
    <td><input type="button" id="rzp-button1" name="btn" value="pay now"class="btn btn-primary" onclick="pay_now()"/>
  </div>
</div>
</div>
</tr>
    

                </div>

            </div>
        </div>
    </div>
</section>

</div>
                </div>
            </section>
        </div>
        <input type="hidden" id="name1" value="<?php echo $n; ?>">
        <div>
        <div>
        <p class="container-fluid footer bg-dark text-light footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Address</h5>
            <p class="mb-2">
              <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
            </p>
            <p class="mb-2">
              <i class="fa fa-phone-alt me-3"></i>+012 345 67890
            </p>
            <p class="mb-2">
              <i class="fa fa-envelope me-3"></i>info@example.com
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-outline-light btn-social" href=""
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href=""
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href=""
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href=""
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Quick Links</h5>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Contact Us</a>
            <a class="btn btn-link" href="">Our Services</a>
            <a class="btn btn-link" href="">Terms & Condition</a>
            <a class="btn btn-link" href="">Support</a>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Popular Links</h5>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Contact Us</a>
            <a class="btn btn-link" href="">Our Services</a>
            <a class="btn btn-link" href="">Terms & Condition</a>
            <a class="btn btn-link" href="">Support</a>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Newsletter</h5>
            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            <div class="position-relative mx-auto" style="max-width: 400px">
              <input
                class="form-control border-0 w-100 py-3 ps-4 pe-5"
                type="text"
                placeholder="Your email"
              />
              <button
                type="button"
                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                SignUp
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a class="border-bottom" href="#">Your Site Name</a>, All
              Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
              <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              Designed By
              <a class="border-bottom" href="https://htmlcodex.com"
                >HTML Codex</a
              >
              <br />Distributed By:
              <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
      $(document).ready(function() {
          var adult_price= document.getElementById('tick_adult');
          document.getElementById('adult_price').value=adult_price.innerHTML;

          var student_price= document.getElementById('tick_student');
          document.getElementById('student_price').value=student_price.innerHTML;

          var child_price= document.getElementById('tick_child');
          document.getElementById('child_price').value=child_price.innerHTML;
      });
    </script>
    <script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script>
//   console.log("hello");
// var amt ="100";
    function pay_now(){
		var name = jQuery('#name1').val();
		console.log(name);
    var amount = document.getElementById("total_price_txt").textContent;
     console.log(amount);
        // var amount=<?php echo $n ?>;
        var options =  {
            "key": "rzp_test_CAVq5bb2GLYpRx", // Enter the Key ID generated from the Dashboard
            "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "ZOOFAARII",
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "handler":function(response){
              
               jQuery.ajax({
                   type:"POST",
                   url: "payment_process.php",
                   data:"payment_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name,
                   success:function(result){
                       window,location.href="thankyou.php";
                   }
               });
              
      }
        
    
};
var rzp1 = new Razorpay(options);

    rzp1.open();
    
    }
</script>
  </body>
</html>

<?php
    
    if(isset($_POST['cal_price_submit'])){
		$adult = $_POST['adult'];
		$student = $_POST['student'];
		$child= $_POST['child'];
		$date=$_POST['date'];
		$adult_price= $_POST['adult_price'];
		$student_price= $_POST['student_price'];
		$child_price= $_POST['child_price'];
    $sql="INSERT INTO tbl_booking( `adult`, `student`, `child`, `date`, `reg_id`, `status`) 
    VALUES ('$adult','$student','$child','$date','$login_id',1)";
		// $sql="insert into tbl_booking(`adult`,`student`,`child`,`date`,`reg_id`,`status`) 
    //     VALUES('$adult','$student','$child','$date','$login_id',1)";
        $result=mysqli_query($conn,$sql);
        //echo $sql;
       if($result){
        echo '<script>window.location.href="ticketbooking.php";</script>';
       }else{
        die(mysqli_error($conn));
       }
      
      if($result == true ) {
        echo '<script>alert("sucessfully created");</script>';
   }
  


		// echo "<script>alert('".$adult_price." and ".$student_price."');</script>";
		$total_price= $adult*$adult_price + $student*$student_price + $child*$child_price;
		echo "<script>document.getElementById('total_price_txt').innerHTML = '".$total_price."';</script>";
    } 
?>

<script>
	function readData(field){
		var cadult=document.getElementById('adult').value;
		var cstudent=document.getElementById('student').value;
		var cchild=document.getElementById('child').value;

		if(field==2){
			var adult_count= cadult!="" ? cadult : 0;
			var student_count= cstudent!="" ? cstudent : 0;
			var child_count= cchild!="" ? cchild : 0;
      
		}
		else if(field==1){
			var adult_count= cadult!="" ? cadult : 0;
			var student_count= cstudent!="" ? cstudent : 0;
			var child_count= 0;
		}
		else{
			var adult_count= cadult!="" ? cadult : 0;
			var student_count= 0;
			 var child_count= 0;
		}

		var adult_price= document.getElementById('adult_price').value;
		var student_price= document.getElementById('student_price').value;
		var child_price= document.getElementById('child_price').value;

		var total_price= adult_count*adult_price + student_count*student_price + child_count*child_price;
		document.getElementById('total_price_txt').innerHTML = total_price;
	}
</script>