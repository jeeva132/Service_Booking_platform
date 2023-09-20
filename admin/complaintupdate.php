<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user_id from session
    $user_id = $_SESSION['customer_id'];
    
    // Get message from the form
    $message = $_POST['message'];
    
    // Prepare and execute the SQL query
    $sql = "INSERT INTO complaints (customerid, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $message);
    
    if ($stmt->execute()) {
        echo "<script>alert('Complaint Submitted successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>