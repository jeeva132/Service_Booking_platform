<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["booking_id"]) && isset($_GET["status"])) {
        $booking_id = intval($_GET["booking_id"]);
        $status = $_GET["status"];

        // Validate the status
        $valid_statuses = ["Accept", "Cancel", "Complete", "Pending"];
        if (!in_array($status, $valid_statuses)) {
            $status = "Pending"; // Set default status to "Pending" if the status is not valid
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

        // Prepare the update statement
        $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE booking_id = ?");

        // Bind the parameters to the statement
        $stmt->bind_param("si", $status, $booking_id);

        // Execute the update
        $stmt->execute();

        // Close the statement and the database connection
        $stmt->close();
        $conn->close();
    }
}

// Redirect back to the main page
header("Location: http://localhost/mininew/work/index.php"); // Replace "your_main_php_file.php" with the name of your main PHP file.
exit();
?>
