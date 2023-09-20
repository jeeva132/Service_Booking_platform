<?php
// Start the session to access session data
session_start();

// Check if the user is logged in. If not, redirect to the login page or handle the appropriate action.
if (!isset($_SESSION['admin_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details from the database based on the user_id stored in the session
$user_id = $_SESSION['admin_id'];
$sql = "SELECT name, email, place,specialization FROM admin WHERE id = $user_id"; // Modify the table and column names as per your database schema
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Handle the case when user details are not found
    $user = null;
}

// Close the database connection
$conn->close();
?>




<?php
// Start the session to access session data
session_start();

// Check if the user is logged in. If not, redirect to the login page or handle the appropriate action.
if (!isset($_SESSION['admin_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details from the database based on the user_id stored in the session
$user_id = $_SESSION['admin_id'];
$sql = "SELECT name, email, place,specialization FROM admin WHERE id = $user_id"; // Modify the table and column names as per your database schema
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Handle the case when user details are not found
    $user = null;
}

// Close the database connection
$conn->close();
?>