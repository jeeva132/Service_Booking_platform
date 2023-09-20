<?php
session_start();
// book_appointment.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the worker_id and customer_id from the form
    $worker_id = $_POST["worker_id"];
    $worker_id_int = intval($worker_id);
    
    // Check if the customer ID is present in the session
    if (isset($_SESSION["customer_id"])) {
        $customer_id = $_SESSION["customer_id"]; // Retrieve the customer ID from the session
    } else {
        // If the customer ID is not present in the session, handle the case as required (e.g., redirect to login page)
        die("Customer ID not provided. Please log in.");
    }
    $customer_id_int = intval($customer_id);

    // Get the current date in Y-m-d format
    $booking_date = date("Y-m-d");

    // Your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "new";

    // Create a connection to the MySQL database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the INSERT query
    $sql = "INSERT INTO bookings (worker_id, customer_id, booking_date) VALUES ('$worker_id_int', '$customer_id_int', '$booking_date')";

    if ($conn->query($sql) === TRUE) {
        
        // header("Location: http://localhost/mininew/index.php");
        echo "<script>alert('Booking Successful!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
