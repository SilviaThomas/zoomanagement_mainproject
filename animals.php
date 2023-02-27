<?php
    session_start();
    error_reporting(0);
    include('dbconnection.php');
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
    <title>Zoofari - Zoo & Safari Park Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

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
		
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">OUR ANIMALS</h2>
					</div>
				</div>
			</div>
		</section>
		<section id="content">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- <div class="aligncenter"><h2 class="aligncenter">Our Animals</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..</div> -->
						<br/>
					</div>
				</div>
        <div id="wrapper">            
            <section id="animal-content">
                <div class="container">
                    <div class="row box-section">

                        <?php
                            include 'dbconnection.php';
                            $animal_data_res= mysqli_query($conn,"SELECT * from tbl_animals WHERE status='1'");
                            if($animal_data_res){
                                if(mysqli_num_rows($animal_data_res) > 0){
                                    while($row= mysqli_fetch_array($animal_data_res)){
                                        $animal_id= $row['animal_id'];
                                        $animal_name= $row['AnimalName'];
                                        $animal_breed= $row['Breed'];
                                        $animal_image= $row['AnimalImage'];
    
                                        echo '
                                            <div class="animal-card" style="width: 18rem;">
                                                <img class="card-img-top" src="admin/an_image/'.$animal_image.'" alt="'.$animal_name.'">
                                                <div class="card-body">
                                                    <h5 class="card-title">'.$animal_name.'</h5>
                                                    <p class="card-text">'.$animal_breed.'</p>
                                                    <a href="animal_description.php?aid='.$animal_id.'" class="btn btn-primary">View Details</a>
                                                </div>
                                            </div>
                                        ';
                                    }
                                }
                                else{
                                    echo "No data !!";
                                }
                            }
                            else{
                                echo "Wrong query !!";
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    <!-- Navbar End -->

    <!-- Header Start -->
   
    <!-- Header End -->

    <!-- Video Modal Start -->
    
          
    <!-- Video Modal End -->

    <!-- About Start -->
    
    <!-- About End -->

    <!-- Facts Start -->
   
    <!-- Facts End -->

    <!-- Service Start -->
    
    <!-- Service End -->

    <!-- Animal Start -->
    
    <!-- Animal End -->

    <!-- Visiting Hours Start -->
    
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div
      class="container-fluid footer bg-dark text-light footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
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
                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
              >
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
  </body>
</html>
