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

<!doctype html>
<html lang="en">
  <head>
  	<title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
	
		<style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f3f3;
        }
        body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5; /* Light gray background */
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
    <style>
    #sidebar {
        background-color: #4bbb7d;
    }
</style>
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="index.html" class="logo">Menu</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <div id="sidehome">
                            <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
                        </div>
                    </li>
                    <li>
                        <div id="sidebookings">
                            <a href="#"><span class="fa fa-user mr-3"></span> Employees messages</a>
                        </div>
                    </li>
                    <li>
                        <div id="sidemessage">
                            <a href="#"><span class="fa fa-briefcase mr-3"></span> Complaints</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container1">
                <h2 class="mb-4">Profile</h2>
                <div class="row">
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
                    </div>
                </div>
            </div>

            <div class="container2" style="padding-top: 0px;">
                <h3 class="bookings-title mt-5 mb-3">Messages</h3>
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
                                        <td><?php echo $row["worker_name"]; ?></td>
                                        <td><?php echo $row["worker_phone"]; ?></td>
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

            <div class="container3">
                <div class="row">








                            
                <div class="table-responsive">
                <h3 class="bookings-title mt-5 mb-3">Complaints</h3>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Complaint ID</th>
                                <th>Customer ID</th>
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

                            // Fetch complaint details from the database
                            $sql = "SELECT id, customerid, message FROM complaints";

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
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["customerid"]; ?></td>
                                        <td><?php echo $row["message"]; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="3">No complaints found.</td></tr>';
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="http://localhost/mininew/admin/script.js"></script>
</body>

</html>