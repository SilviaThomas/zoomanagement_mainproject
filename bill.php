<!-- Existing code -->

<?php
// Initialize variables
$sub_total = 0;
$tax_amount = 0;
$total_amount = 0;

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'zooproject');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
} else {
    // echo "Success";
}

// Check if the form is submitted
if (isset($_POST['cal_price_submit'])) {
    // Existing code for ticket booking and database insertion

    // Calculate the subtotal, tax amount, and total amount
    $sub_total = $adult * $adult_price + $student * $student_price + $child * $child_price;
    $tax_rate = 0.1;
    $tax_amount = $sub_total * $tax_rate;
    $total_amount = $sub_total + $tax_amount;
}

?>

<!-- Display the bill information -->
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">TOTAL AMOUNT</h5>
        <p class="card-text" id="total_price_txt">
            Subtotal: <?php echo number_format($sub_total, 2); ?> INR<br>
            Tax: <?php echo number_format($tax_amount, 2); ?> INR<br>
            Total: <?php echo number_format($total_amount, 2); ?> INR
        </p>
        <input type="submit" class="btn btn-primary" name="cal_price_submit" value="Save">
        <!-- Add payment button here -->
    </div>
</div>

<!-- Remaining code -->
