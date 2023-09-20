<?php
// Start the session to access session data
session_start();

// Rest of your PHP code
// ...
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new"; // Replace with your actual database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO employees (name, email, phone_number, date_of_birth, gender, address, service_cost, specialization, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement and check for any errors
$stmt = $conn->prepare($sql);
if (!$stmt) {
  die("Error: " . $conn->error);
}

// Bind the parameters to the statement
$stmt->bind_param("ssssssdss", $name, $email, $phone_number, $date_of_birth, $gender, $address, $service_cost, $specialization, $photo);

// Set the values of the parameters from the form data
$name = $_POST['name'] ?? "";
$email = $_POST['email'] ?? "";
$phone_number = $_POST['phone_number'] ?? "";
$date_of_birth = $_POST['date_of_birth'] ?? "";
$gender = $_POST['gender'] ?? "";
$address = $_POST['address'] ?? "";
$service_cost = $_POST['service_cost'] ?? "";
$specialization = $_POST['specialization'] ?? "";
$photo = $_POST['photo'] ?? ""; // Assuming the input field name for photo link is "photo"

// Execute the statement and check for any errors
if ($stmt->execute()) {
  echo "Employee details inserted successfully.";
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>