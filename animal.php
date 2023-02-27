<?php
    session_start();
    error_reporting(0);
    include('dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>zoo website - services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="http://webthemez.com" />

        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
        <link href="css/flexslider.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />

    </head>

    <body>
    <div id="wrapper">
		
		<!-- start header -->
		<?php include('includes/header.php');?>
		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">Animals</h2>
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
                            $animal_data_res= mysqli_query($conn,"SELECT * from tbl_animals");
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

        <!-- javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.fancybox.pack.js"></script>
        <script src="js/jquery.fancybox-media.js"></script>  
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/animate.js"></script>
        <!-- Vendor Scripts -->
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>