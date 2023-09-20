<?php
// Start the session to access session data
session_start();

// Rest of your PHP code
// ...
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee</title>
</head>
<body>
  <h1>Add Employee</h1>
  <form action="insert_employee.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="phone_number">Phone Number:</label>
    <input type="tel" id="phone_number" name="phone_number" required><br>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" required><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" required></textarea><br>

    <label for="service_cost">Service Cost:</label>
    <input type="number" id="service_cost" name="service_cost" step="0.01" required><br>

    <label for="specialization">Specialization:</label>
    <input type="text" id="specialization" name="specialization" required><br>

    <label for="photo">Photo:</label>
    <input type="text" id="photo" name="photo" required><br> <!-- Input field for photo link -->

    <input type="submit" value="Submit">
  </form>
</body>
</html>