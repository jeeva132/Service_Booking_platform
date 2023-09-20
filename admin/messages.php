<?php
session_start();

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

// Get the user ID and message from the form
$user_id = $_SESSION['worker_id'];
$message = $_POST['message'];

// Prepare and execute the SQL query to insert the message
$sql = "INSERT INTO messages (employee_id, message) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $message);

if ($stmt->execute()) {
    // Message inserted successfully
    echo "<script>alert('Message sent successfully!');</script>";
} else {
    // Error inserting message
    echo "Error sending message: " . $conn->error;
}


// Close the database connection
$conn->close();
?>
