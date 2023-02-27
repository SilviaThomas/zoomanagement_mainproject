<?php
	include('dbconnection.php');
	$animal_id=$_GET['animal_id'];
    $AnimalName = $_GET['AnimalName'];
    $CageNumber = $_GET['CageNumber'];
    $FeedNumber= $_GET['FeedNumber'];
    $Breed = $_GET['Breed'];
    $img=$_FILES["image"]["name"];
 
	
 
    mysqli_query($conn,"update `tbl_animals` set AnimalName='$AnimalName', CageNumber='$CageNumber', FeedNumber='$FeedNumber', Breed='$Breed', AnimalImage='$AnimalImage' where animal_id='$animal_id'");
	header('location:index.php');
?>