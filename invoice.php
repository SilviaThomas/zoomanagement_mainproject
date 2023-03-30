<?php

// Connect to the database
require 'dbconnection.php'
?>
<?php


// Retrieve the booking details
$payment_id = $_GET['payment_id'];
$sql = "SELECT * FROM tbl_payment WHERE payment_id = $payment_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>
<body>
    <div id="invoice">
        <h1>Invoice</h1>
        <table>
            <tr>
                <td><strong>Booking ID:</strong></td>
                <td><?php echo $row['payment_id']; ?></td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <td><strong>Date:</strong></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
            <tr>
                <td><strong>Adult:</strong></td>
                <td><?php echo $row['adult']; ?></td>
            </tr>
            <tr>
                <td><strong>Student:</strong></td>
                <td><?php echo $row['student']; ?></td>
            </tr>
            <tr>
                <td><strong>Child:</strong></td>
                <td><?php echo $row['child']; ?></td>
            </tr>
            <tr>
                <td><strong>Total Price:</strong></td>
                <td><?php echo $row['amount']; ?></td>
            </tr>
        </table>
    </div>
</body>
<script>
    window.print();
</script>
