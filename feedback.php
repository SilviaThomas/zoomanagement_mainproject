<?php
    session_start();
    error_reporting(0);
    include('dbconnection.php');
?>
<?php
$conn = mysqli_connect('localhost','root','','zooproject');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error."<br>");
}

if(isset($_POST['submit'])){
  $rating = $_POST['rating'];
  $description = $_POST['description'];
  echo $description;
  echo $rating;
  
  $sql="INSERT INTO tbl_feedback (`rating`,`description`) 
        VALUES ('$rating','$description')";
        
  $result=mysqli_query($conn,$sql);
  
  if(!$result){
    echo "Error: " . mysqli_error($conn);
    exit();
  }
  
  if($result == true ) {
    echo "<script>
    document.getElementById('success-message').innerHTML = '<p>Thank you for your feedback!</p>';
    </script>";
  }
  
  header('location:feedback.php');
  exit();
}
?>
<script src="validateForm.js"></script>
<div class="feedback-form">
  <h2>Leave your feedback</h2>
  <form>
    <div class="form-group">
      <label for="rating">Rating:</label>
      <fieldset class="star-rating">
        <input type="radio" id="star5" name="rating" value="5"/><label for="star5" title="5 stars">&#9733;</label>
        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">&#9733;</label>
        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">&#9733;</label>
        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">&#9733;</label>
        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">&#9733;</label>
      </fieldset>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="5" required></textarea>
    </div>
    <button type="submit">Submit</button>
  </form>
  <div id="error-messages"></div>
  <div id="success-message"></div>
</div>
<style>
    .feedback-form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.feedback-form h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align: center;
}

.feedback-form form {
  display: flex;
  flex-direction: column;
}

.feedback-form .form-group {
  margin-bottom: 20px;
}

.feedback-form label {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
  display: block;
}

.feedback-form textarea {
  font-size: 16px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.feedback-form button[type="submit"] {
  font-size: 18px;
  font-weight: bold;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

.feedback-form button[type="submit"]:hover {
  background-color: #0056b3;
}

.feedback-form .star-rating {
  display: flex;
  justify-content: center;
}

.feedback-form .star-rating input[type="radio"] {
  display: none;
}

.feedback-form .star-rating label {
  font-size: 32px;
  color: #ccc;
  cursor: pointer;
  transition: color 0.3s ease-in-out;
}

.feedback-form .star-rating input[type="radio"]:checked + label {
  color: #ffcc00;
}
</style>
<!-- <script>
    function validateForm() {
      var rating = document.getElementsByName('rating');
      var description = document.getElementById('description').value;

      // check if a rating is selected
      var ratingSelected = false;
      for (var i = 0; i < rating.length; i++) {
        if (rating[i].checked) {
          ratingSelected = true;
          break;
        }
      }
      if (!ratingSelected) {
        document.getElementById('error-messages').innerHTML = '<p>Please select a rating.</p>';
        return false;
      }

      // check if description is entered
      if (description.trim() == '') {
        document.getElementById('error-messages').innerHTML = '<p>Please enter a description.</p>';
        return false;
      }

      // if all validations pass, return true to submit the form
      return true;
    }
  </script> -->



<!-- <script>
    function validateForm() {
      var rating = document.getElementsByName('rating');
      var description = document.getElementById('description').value;

      // check if a rating is selected
      var ratingSelected = false;
      for (var i = 0; i < rating.length; i++) {
        if (rating[i].checked) {
          ratingSelected = true;
          break;
        }
      }
      if (!ratingSelected) {
        document.getElementById('error-messages').innerHTML = '<p>Please select a rating.</p>';
        return false;
      }

      // check if description is entered
      if (description.trim() == '') {
        document.getElementById('error-messages').innerHTML = '<p>Please enter a description.</p>';
        return false;
      }

      // if all validations pass, return true to submit the form
      return true;
    }
  </script> -->

