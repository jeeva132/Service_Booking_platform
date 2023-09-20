<?php
// Start the session to access session data
session_start();

// Check if the user is logged in. If not, redirect to the login page or handle the appropriate action.
if (!isset($_SESSION['worker_id'])) {
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
$user_id = $_SESSION['worker_id'];
$sql = "SELECT name, email, phone_number, address, specialization,service_cost,photo FROM employees WHERE id = $user_id"; // Modify the table and column names as per your database schema
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Handle the case when user details are not found
    $user = null;
}


// Check if the form is submitted for updating specialization
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['specialization'])) {
    $specialization = $_POST['specialization'];
    // Update the specialization in the employees table
    $stmt = $conn->prepare("UPDATE employees SET specialization = ? WHERE id = ?");
    $stmt->bind_param("si", $specialization, $user_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to http://localhost/mininew/workerpro.php after updating the specialization
    header("Location: http://localhost/mininew/work/index.php");
    exit();
}

// Check if the URL has query parameters for updating specialization
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['specialization'])) {
    $specialization = $_GET['specialization'];
    // Update the specialization in the employees table
    $stmt = $conn->prepare("UPDATE employees SET specialization = ? WHERE id = ?");
    $stmt->bind_param("si", $specialization, $user_id);
    $stmt->execute();
    $stmt->close();
}



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['photo_link'])) {
    $photo_link = $_POST['photo_link'];

    // Update the photo link in the employees table
    $stmt = $conn->prepare("UPDATE employees SET photo = ? WHERE id = ?");
    $stmt->bind_param("si", $photo_link, $user_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to http://localhost/mininew/workerpro.php after updating the photo link
    header("Location: http://localhost/mininew/work/index.php");
    exit();
}
// Check if the form is submitted for cost
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['service_cost'])) {
    $cost = intval($_POST['service_cost']); // Convert the input to an integer
    // Update the service_cost in the employees table
    $stmt = $conn->prepare("UPDATE employees SET service_cost = ? WHERE id = ?");
    $stmt->bind_param("ii", $cost, $user_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to http://localhost/mininew/workerpro.php after updating the cost
    header("Location: http://localhost/mininew//work/index.php");
    exit();
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
                            <a href="#"><span class="fa fa-user mr-3"></span> Bookings</a>
                        </div>
                    </li>
                    <li>
                        <div id="sidemessage">
                            <a href="#"><span class="fa fa-briefcase mr-3"></span> Message</a>
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
                            <div class="col-md-4 mb-3">
                                <div class="card profile-card">
                                    <div class="card-body text-center profile-info">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User" class="profile-image">
                                        <h4 class="profile-name"><?php echo $user['name']; ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $user['specialization']; ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $user['address']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <?php if ($user) { ?>
                                            <div class="profile-details">
                                                <div class="row">
                                                    <div class="col-sm-3 profile-label">Full Name</div>
                                                    <div class="col-sm-9 profile-value"><?php echo $user['name']; ?></div>
                                                </div>
                                            </div>
                                            <hr>
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
                                            <div class="profile-details">
                                                <div class="row">
                                                    <div class="col-sm-3 profile-label">Address</div>
                                                    <div class="col-sm-9 profile-value"><?php echo $user['address']; ?></div>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php if ($user['specialization']) { ?>
                                                <div class="profile-details">
                                                    <div class="row">
                                                        <div class="col-sm-3 profile-label">Specialization</div>
                                                        <div class="col-sm-9 profile-value"><?php echo $user['specialization']; ?></div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <form method="POST" action="index.php" id="serviceForm">
                                                    <div class="profile-details">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="input-group mb-3">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            Select Service
                                                                        </a>
                                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Electrician">Electrician</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Plumber">Plumber</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Gardener">Gardener</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=House%20Cleaner">House Cleaner</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Handyman">Handyman</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=HVAC%20Technician%20(Heating,%20Ventilation,%20and%20Air%20Conditioning)">HVAC Technician (Heating, Ventilation, and Air Conditioning)</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Painter">Painter</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Roofing%20Contractor">Roofing Contractor</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Pest%20Control%20Services">Pest Control Services</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Locksmith">Locksmith</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Appliance%20Repair%20Technician">Appliance Repair Technician</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Moving%20Company">Moving Company</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Carpet%20Cleaner">Carpet Cleaner</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Interior%20Designer">Interior Designer</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Home%20Security%20System%20Installation">Home Security System Installation</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Home%20Theater%20Installation">Home Theater Installation</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Landscaping%20Services">Landscaping Services</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Auto%20Mechanic">Auto Mechanic</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Mobile%20Phone%20Repair">Mobile Phone Repair</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Computer%20Repair%20Technician">Computer Repair Technician</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Pet%20Grooming">Pet Grooming</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Personal%20Trainer">Personal Trainer</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Massage%20Therapist">Massage Therapist</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Catering%20Services">Catering Services</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Event%20Planner">Event Planner</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Graphic%20Designer">Graphic Designer</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Web%20Developer">Web Developer</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Tutoring%20Services">Tutoring Services</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Personal%20Chef">Personal Chef</a></li>
                                                                            <li><a class="dropdown-item" href="index.php?specialization=Car%20Wash%20and%20Detailing%20Service">Car Wash and Detailing Service</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <input type="hidden" id="selectedService" name="specialization" value="">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php } ?>
                                            <hr>
                                            <?php if ($user['service_cost'] !== null) { ?>
                                                <div class="profile-details">
                                                    <div class="row">
                                                        <div class="col-sm-3 profile-label">Service Cost</div>
                                                        <div class="col-sm-9 profile-value"><?php echo $user['service_cost']; ?></div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <form method="POST" action="index.php">
                                                    <div class="profile-details">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" name="service_cost" placeholder="Enter Cost of your Service" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php } ?>
                                            <hr>
                                            <?php if ($user['photo'] === null) { ?>
                                                <form method="POST" action="index.php">
                                                    <div class="profile-details">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" name="photo_link" placeholder="Enter link of your photo" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php } ?>
                                            <!-- Edit button and no user details found section -->
                                        <?php } else { ?>
                                            <p>No user details found.</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container2" style="padding-top: 0px;">
                <h3 class="bookings-title mt-5 mb-3">Bookings</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Booking Id</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>date</th>
                                <th>status</th>
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
                            $user_id = $_SESSION['worker_id'];
                            $sql = "SELECT bookings.booking_id, customers.name AS customer_name, customers.address AS customer_location, customers.phone_number AS customer_phone,
                                    bookings.booking_date, bookings.status
                                    FROM bookings
                                    INNER JOIN customers ON bookings.customer_id = customers.id
                                    WHERE bookings.worker_id = ?"; // Using a placeholder for the user_id to prevent SQL injection

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
                                        <td><?php echo $row["customer_name"]; ?></td>
                                        <td><?php echo $row["customer_location"]; ?></td>
                                        <td><?php echo $row["customer_phone"]; ?></td>
                                        <td><?php echo $row["booking_date"]; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="statusDropdown<?php echo $row["booking_id"]; ?>"
                                                    data-mdb-toggle="dropdown" aria-expanded="false">
                                                    <?php echo ucfirst($row["status"]); ?>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="statusDropdown<?php echo $row["booking_id"]; ?>">
                                                    <li><a class="dropdown-item" href="http://localhost/mininew/update_booking_status.php?booking_id=<?php echo $row["booking_id"]; ?>&status=Accept">Accept</a></li>
                                                    <li><a class="dropdown-item" href="http://localhost/mininew/update_booking_status.php?booking_id=<?php echo $row["booking_id"]; ?>&status=Cancel">Cancel</a></li>
                                                    <li><a class="dropdown-item" href="http://localhost/mininew/update_booking_status.php?booking_id=<?php echo $row["booking_id"]; ?>&status=Complete">Complete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="6">No bookings found.</td></tr>';
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
                    <h4 class="mb-4">Send a query to admin.</h4>
                    <br>
                    <form method="post" action="messages.php">
                        <div class="message-form">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['worker_id']; ?>">
                                <label for="textAreaExample">Send your message to admin.</label>
                                <textarea class="form-control" name="message" style="height: 600px; width:500px;" id="textAreaExample" rows="4" placeholder="Include the booking id and name of the worker."></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
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
    <script src="http://localhost/work/script.js"></script>
</body>

</html>