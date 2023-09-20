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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .custom-table {
            width: 100%;
        }

        body {
            margin: 25px;
            font-family: 'Poppins', sans-serif;
            color: #444;
            background-color: #f3f3f3;
            height: 100vh;
            padding: 2rem;
        }
        <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f3f3;
        }

        .profile-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 15px;
        }

        .profile-address {
            font-size: 1rem;
            color: #777;
        }

        .profile-info {
            padding: 20px;
        }

        .profile-details {
            margin-bottom: 2rem;
        }

        .profile-label {
            font-size: 0.875rem;
            color: #777;
        }

        .profile-value {
            font-size: 1rem;
            color: #444;
        }

        .bookings-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2rem;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    </style>
</head>

<body>
    <div class="container-fluid py-5">
        




        
        
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-3">
                    <div class="card profile-card">
                        <div class="card-body text-center profile-info">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="profile-image">
                            <h4 class="profile-name"><?php echo $user['name']; ?></h4>
                            <p class="profile-address"><?php echo $user['place']; ?></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="card profile-card">
                        <div class="card-body profile-info">
                            <?php if ($user) { ?>
                                <div class="profile-details">
                                    <div class="row">
                                        <div class="col-sm-3 profile-label">Full Name</div>
                                        <div class="col-sm-9 profile-value"><?php echo $user['name']; ?></div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Add other profile details here in a similar manner -->
                                <div class="profile-details">
                                    <div class="row">
                                        <div class="col-sm-3 profile-label">Email</div>
                                        <div class="col-sm-9 profile-value"><?php echo $user['email']; ?></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="profile-details">
                                    <div class="row">
                                        <div class="col-sm-3 profile-label">Address</div>
                                        <div class="col-sm-9 profile-value"><?php echo $user['place']; ?></div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Add more profile details as needed -->
                            <?php } else { ?>
                                <p class="text-muted">No user details found.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <br>
                <h3>messages</h3>
                <br>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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

                        // Fetch booking details for the currently logged-in user from the database and join with employees table
                        $user_id = $_SESSION['admin_id'];
                        $sql = "SELECT messages.employee_id, employees.name AS worker_name, employees.phone_number AS worker_phone, messages.message
                                FROM messages
                                INNER JOIN employees ON messages.employee_id = employees.id";
                        
                        // Prepare the statement
                        $stmt = $conn->prepare($sql);

                        // Execute the query
                        $stmt->execute();

                        // Get the result set
                        $result = $stmt->get_result();

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // The rest of the code to display data in the table remains the same as before
                                // ...
                        ?>
                                <tr>
                                    <td><?php echo $row["employee_id"]; ?></td>
                                    <td><?php echo $row["worker_name"];?></td>
                                    <td><?php echo $row["worker_phone"];?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="4">No messages found.</td></tr>';
                        }

                        // Close the statement and the database connection after use
                        $stmt->close();
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
