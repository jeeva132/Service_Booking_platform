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
$dbname = "new";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone_number = $_POST["phone_number"];
  $date_of_birth = $_POST["date_of_birth"];
  $address = $_POST["address"];
  $register_as = $_POST["register_as"];

  // Modify email based on registration type
  if ($register_as === "worker") {
    $email = str_replace("@gmail.com", "@worker.com", $email);
  }

  if ($register_as === "customer") {
    // Insert the data into the 'customers' table
    $sql = "INSERT INTO customers (name, email, phone_number, date_of_birth, address) VALUES ('$name', '$email', '$phone_number', '$date_of_birth', '$address')";
  } else if ($register_as === "worker") {
    // Insert the data into the 'employees' table
    $sql = "INSERT INTO employees (name, email, phone_number, date_of_birth, address) VALUES ('$name', '$email', '$phone_number', '$date_of_birth', '$address')";
  } else {
    // Invalid registration option
    echo "Invalid registration option.";
    exit();
  }

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Registration successful! Your login credentials are: Email: $email, Password: your phone number');
            window.location.href = 'index.php'; // Redirect to the login page after the alert
          </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>
