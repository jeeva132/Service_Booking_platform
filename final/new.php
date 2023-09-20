<?php
session_start(); // Start the session to store user information

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (strpos($email, "@admin.com") !== false) {
      // Prepare and execute the SQL query to check login details in the admin table
      $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows === 1) {
          $row = $result->fetch_assoc();
          // Check if the entered password matches the password in the admin table
          if ($password === $row["password"]) {
              // Login successful for admin
              $_SESSION["admin_id"] = $row["id"];
              $_SESSION["admin_email"] = $email; // Store the admin's email in the session
              header("Location: http://localhost/mininew/admin/index.php"); // Redirect to the admin dashboard after successful login
              exit();
          } else {
              // Login failed (incorrect password)
              echo "<script>alert('Incorrect password. Please try again.');</script>";
          }
      } else {
          // Login failed (user not found)
          echo "<script>alert('User not found. Please check your email.');</script>";
      }
  } else {
      
    // Check if the entered email has an extension of @worker.com
    if (strpos($email, "@worker.com") !== false) {
        // Prepare and execute the SQL query to check login details in the employees table
        $stmt = $conn->prepare("SELECT * FROM employees WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
  
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Check if the entered password matches the password in the employees table
            if ($password === $row["phone_number"]) {
                // Login successful for workers
                $_SESSION["worker_id"] = $row["id"];
                $_SESSION["worker_email"] = $email; // Store the worker's email in the session
                $_SESSION["worker_name"] = $row["name"];
                header("Location: http://localhost/mininew/work/index.php"); // Redirect to the worker dashboard after successful login
                exit();
            } else {
                // Login failed (incorrect password)
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            // Login failed (user not found)
            echo "<script>alert('User not found. Please check your email.');</script>";
        }
    } else {
        // Prepare and execute the SQL query to check login details in the customers table
        $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
  
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Check if the entered password matches the phone_number in the customers table
            if ($password === $row["phone_number"]) {
                // Login successful for customers
                $_SESSION["customer_id"] = $row["id"];
                $_SESSION["customer_email"] = $email; // Store the customer's email in the session
                $_SESSION["customer_name"] = $row["name"];
                header("Location: http://localhost/mininew/index.php"); // Redirect to the main page after successful login
                exit();
            } else {
                // Login failed (incorrect password)
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            // Login failed (user not found)
            echo "<script>alert('User not found. Please check your email.');</script>";
        }
    }
  }













    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Register</title>
  <!-- Link to Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: "Poppins", sans-serif; /* Use Poppins font for the whole body */
      color: #343a40;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      padding: 20px;
    }

    .form-section {
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Styling for Login Section */
    .login-section {
      background-color: #f9f9f9;
    }

    /* Styling for Register Section */
    .register-section {
      background-color: #4caf50;
      color: #fff;
    }

    /* Additional Styling for Register Section */
    .register-section input[type="text"],
    .register-section input[type="email"],
    .register-section input[type="date"],
    .register-section select,
    .register-section button {
      background-color: rgba(255, 255, 255, 0.5);
      border: none;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .register-section button {
      color: #fff;
      background-color: #8bc34a; /* Light green color */
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s ease;
    }

    .register-section button:hover {
      background-color: #7cb342; /* Slightly darker light green color on hover */
    }
  </style>
</head>
<body class="form-v10">
  <div class="container">
    <!-- Login Section -->
    <div class="form-section login-section">
      <form class="form-detail" action="#" method="post" id="loginForm">
        <h2>Login</h2>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: green;">Login</button>
      </form>
    </div>
    
    <!-- Register Section -->
    <div class="form-section register-section">
      <form class="form-detail" action="register.php" method="post" id="registerForm">
        <h2>Register</h2>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="phone_number">Phone Number</label>
          <input type="text" name="phone_number" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="date_of_birth">Date of Birth</label>
          <input type="date" name="date_of_birth" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Register As:</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="register_as" value="customer" id="registerAsCustomer" checked>
            <label class="form-check-label" for="registerAsCustomer">
              Customer
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="register_as" value="worker" id="registerAsWorker">
            <label class="form-check-label" for="registerAsWorker">
              Worker
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: green;">Register</button>
      </form>
    </div>
  </div>
</body>
</html>
