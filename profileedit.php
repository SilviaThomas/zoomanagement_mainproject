
<?php
session_start();
$userid = $_SESSION['sid'];
$conn = mysqli_connect('localhost','root','','zooproject');
  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
}

if(isset($_POST['update'])){
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
    $userid = $_SESSION['sid'];

    $update_sql = "UPDATE tbl_registration SET firstname='$firstname', lastname='$lastname', email='$email', housename='$housename', street='$street', city='$city', state='$state', pincode=$pincode, adharno=$adharno, gender='$gender', contactno=$contactno WHERE userid=$userid";

    if(mysqli_query($conn, $update_sql)){
        echo "<script>alert('Profile updated successfully');</script>";
    } else{
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

// Fetch user data for pre-filling the form
$userid = $_SESSION['sid'];
$fetch_sql = "SELECT * FROM tbl_registration WHERE userid=$userid";
$result = mysqli_query($conn, $fetch_sql);
if($result){
    $user_data = mysqli_fetch_assoc($result);
} else{
    echo "Error fetching user data: " . mysqli_error($conn);
}

?>


<!-- Add the following HTML code to your existing form -->

<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <form action="profile.php" method="POST" id="profile-form">
                    <h2 class="form-title">Edit Profile</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $user_data['firstname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $user_data['lastname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="<?php echo $user_data['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="housename" id="housename" placeholder="House Name" value="<?php echo $user_data['housename']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="street" id="street" placeholder="Street" value="<?php echo $user_data['street']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="city" id="city" placeholder="City" value="<?php echo $user_data['city']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="state" id="state" placeholder="State" value="<?php echo $user_data['city']; ?>" required>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-input" name="pincode" id="pincode" placeholder="pincode" value="<?php echo $user_data['pincode']; ?>" required>
                        </div>
</form>
</div>  </div>  </section>  </div>


