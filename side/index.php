
<?php
// Start the session to access session data
session_start();

// Check if the user is logged in. If not, redirect to the login page or handle the appropriate action.
if (!isset($_SESSION['customer_id'])) {
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
$user_id = $_SESSION['customer_id'];
$sql = "SELECT name, email, phone_number, address FROM customers WHERE id = $user_id"; // Modify the table and column names as per your database schema
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
                            <a href="#"><span class="fa fa-user mr-3"></span> Bookings</a>
                        </div>
                    </li>
                    <li>
                        <div id="sidecomplaint">
                            <a href="#"><span class="fa fa-briefcase mr-3"></span> Raise a complaint</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
        
            <div class="container1 ">
                <h2 class="mb-4">Profile</h2>
                    <div class="row">
                    
                        <div class="col-md-3">
                            <div class="card profile-card">
                                <div class="card-body text-center profile-info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User"
                                        class="profile-image">
                                    <h4 class="profile-name"><?php echo $user['name']; ?></h4>
                                    <p class="profile-address"><?php echo $user['address']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                        

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
                                                <div class="col-sm-3 profile-label">Phone</div>
                                                <div class="col-sm-9 profile-value"><?php echo $user['phone_number']; ?></div>
                                            </div>
                                        </div>

                                            <hr>
                                        
                                            <div class="profile-details" >
                                                <div class="row">
                                                    <div class="col-sm-3 profile-label">Address</div>
                                                    <div class="col-sm-9 profile-value"><?php echo $user['address']; ?></div>
                                                </div>
                                            </div>
                                        
                                            <!-- Add more profile details as needed -->
                                        
                                        
                                    <?php } else { ?>
                                        <p class="text-muted">No user details found.</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        
       
            <div class="container2 " style="padding-top: 0px;">
                <h3 class="bookings-title mt-5 mb-3">Bookings</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Booking Id</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    $user_id = $_SESSION['customer_id'];
                                    $sql = "SELECT bookings.booking_id, employees.name, employees.specialization, bookings.booking_date, bookings.status
                                            FROM bookings
                                            INNER JOIN employees ON bookings.worker_id = employees.id
                                            WHERE bookings.customer_id = ?"; // Using a placeholder for the user_id to prevent SQL injection

                                    // Prepare the statement
                                    $stmt = $conn->prepare($sql);

                                    // Bind the user_id parameter to the placeholder
                                    $stmt->bind_param("i", $user_id);

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
                                                <td><?php echo $row["booking_id"]; ?></td>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["specialization"]; ?></td>
                                                <td><?php echo $row["booking_date"]; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row["status"] === "Complete") {
                                                        echo '<span class="badge badge-success rounded-pill d-inline">Completed</span>';
                                                    } elseif ($row["status"] === "Accept") {
                                                        echo '<span class="badge badge-secondary d-inline">On the Way</span>';
                                                    } elseif ($row["status"] === 'Pending'){
                                                        echo '<span class="badge badge-light d-inline">Active</span>';
                                                    }elseif ($row["status"] === 'Cancel'){
                                                        echo '<span class="badge badge-danger d-inline">Cancelled</span>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="5">No bookings found.</td></tr>';
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
                <h4 class="mb-4">Raise a complaint</h4>
                <br>
                <form method="post"  action="complaintupdate.php">
                    <div class="message-form">
                        <div class="form-group" >
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['customer_id']; ?>">
                            <label for="textAreaExample">Include the booking id and name of the worker.</label>
                            <textarea class="form-control" name="message" style="height: 600px; width:500px;" id="textAreaExample" rows="4" placeholder="Include the booking id and name of the worker."></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            
            </div>
        
        </div>
            </div>

            
        
        
      </div>
	</div>
		
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
        <script src="http://localhost/side/script.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="http://localhost/mininew/side/script.js"></script>
  </body>
</html>