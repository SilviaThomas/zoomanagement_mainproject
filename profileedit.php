<?php
session_start();
include ('dbconnection.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['update_profile']))
{
    $reg_id=$_POST['reg_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email= $_POST['email'];
    $housename = $_POST['housename'];
    $street = $_POST['street'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $adharno=$_POST['adharno'];
    $gender=$_POST['gender'];
    $contactno=$_POST['contactno'];
    // $Description = $_POST['Description'];
    $query="UPDATE tbl_registration SET firstname='$firstname',lastname='$lastname',email='$email',housename='$housename',street='$street',city='$city',state='$state,pincode='$pincode',adharno='$adharno',gender='$gender',contactno='$contactno' where reg_id=$reg_id";
    $query_run=mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['status'] = "updated successfully";
		echo "
		<script>alert('Updation successfully done.');
		window.location.href= 'manage_animals.php';
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
		$reg_id=$_GET['id'];
		$query=mysqli_query($conn,"select * from tbl_registration where reg_id=$reg_id");
		if(mysqli_num_rows($query)==1){
			$row=mysqli_fetch_array($query);
		}
		else{
			$row=null;
		}
	}
?> 
<?php
    // ...

    if (isset($_GET['id'])) {
        $reg_id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM tbl_registration WHERE reg_id=$reg_id");
        
        if ($query && mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
        } else {
            $row = null;
        }
    } else {
        $row = null;
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="css/registercss.css" rel="stylesheet" />
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form action="profileedit.php" method="POST" class="signup-form">
                        <h2 class="form-title">Edit Profile</h2>

                        <input type="hidden" name="reg_id" value="<?php echo $row['reg_id']; ?>">

                        <div class="form-group">
                            <input type="text" class="form-input" name="firstname" id="fname" placeholder="First Name" value="<?php echo $rows['firstname']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="lastname" id="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="housename" id="housename" placeholder="House Name" value="<?php echo $row['housename']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="street" id="street" placeholder="Street" value="<?php echo $row['street']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="city" placeholder="City" value="<?php echo $row['city']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="state" placeholder="State" value="<?php echo $row['state']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $row['pincode']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="adharno" placeholder="Aadhar Number" value="<?php echo $row['adharno']; ?>" required>
                        </div>

                        <div class="form-group">
                            Gender:
                            <input type="radio" name="gender" value="male" <?php if ($row['gender'] == 'male') echo 'checked'; ?>> Male
                            <input type="radio" name="gender" value="female" <?php if ($row['gender'] == 'female') echo 'checked'; ?>> Female
                            <input type="radio" name="gender" value="other" <?php if ($row['gender'] == 'other') echo 'checked'; ?>> Other
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                        </div>

                        

                        <div class="form-group">
                            <input type="text" class="form-input" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to all the information</label>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update_profile" class="btn btn-warning" value="Update Profile">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="reg/vendor/jquery/jquery.min.js"></script>
    <script src="reg/js/main.js"></script>
    <script src="script.js"></script>
</body>
</html>
