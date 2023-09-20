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
  <title>Document</title>
  <link rel="shortcut icon" type="image/png" href="/icon.png" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://localhost/mininew/style.css">
  <style>
    .container1 {
      position: relative;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5; /* Light gray background */
    }

    .container1 {
      position: relative;
      padding: 50px 0;
    }

    .logo-container {
      position: fixed;
      top: 0;
      padding-top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1;
    }

    .logo-img {
      width: 250px;
      height: 60px;
    }

    .card {
      background-color: #ffffff; /* White card background */
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .container1 {
      position: relative;
      background: url('path/to/background-image.jpg') center/cover no-repeat;
      padding: 50px 0;
    }

    .logo-container {
      position: fixed;
      top: 0;
      padding-top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1;
    }

    .logo-img {
      width: 250px;
      height: 60px;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
      transform: translateY(-5px);
      transition: transform 0.3s ease-in-out;
    }

    .container1::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 35vh;
      background-color: #37b24d;
      z-index: -1;
      transition: opacity 0.3s ease-in-out;
      opacity: 1;
    }

    .container1.sticky::before {
      opacity: 0;
    }

    .container1 .container {
      position: relative;
      z-index: 2;
    }

    .logo-container {
      position: fixed;
      top: 0;
      padding-top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1;
    }

    .logo-img {
      width: 250px;
      height: 60px;
    }

    .search-form {
      border: none;
      background: #f8f9fa;
      border-radius: 10px;
      padding: 0;
    }

    .form-control {
      border: none;
      border-radius: 10px;
      padding: 15px;
    }

    .form-control:focus {
      box-shadow: none;
    }

    .btn-base {
      background-color: #4bbb7d;
      color: #fff;
      border-radius: 10px;
      padding: 10px 20px;
      border: none;
    }

    .btn-base:hover {
      background-color: #3a936e;
    }

    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
      width: 100%;
      height: 225px;
      object-fit: cover;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    .card-title {
      font-size: 18px;
      font-weight: 600;
      margin: 10px 0;
    }

    .card-text {
      font-size: 14px;
      color: #777;
      margin-bottom: 5px;
    }

    .card-subtitle {
      font-size: 16px;
      color: #4bbb7d;
      margin-top: 5px;
    }

    .card-button {
      background-color: #4bbb7d;
      border-radius: 10px;
      padding: 8px 15px;
      color: #fff;
      border: none;
    }

    .card-button:hover {
      background-color: #3a936e;
    }
  </style>

</head>



<body>

  <!-- ------------------------------------------------------------------------------------------------ -->
  <!-- ------------------------------------------------------------------------------------------------ -->
  <div class="container1 hidden">
  <div class="logo-container">
  <img src="http://localhost/mininew/final/img/logopro1.png" alt="Logo" class="logo-img">
</div>

    <div class="container">
      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-12">
          <!-- <a href="http://localhost/mininew/customerpro.php" id="icon-button" class="icon-button"> -->
          <a href="http://localhost/mininew/side/index.php" id="icon-button" class="icon-button">

            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" id="account" style="margin-top: 65px;" class="icon-large">
                <path d="M25 1C11.767 1 1 11.767 1 25c0 7.091 3.094 13.472 8 17.869v.017l.348.3c.061.053.128.097.19.149a24.496 24.496 0 0 0 3.189 2.279c.085.051.172.099.257.148.557.324 1.126.629 1.71.908l.018.008a23.838 23.838 0 0 0 3.915 1.456l.075.021c.641.175 1.293.322 1.954.443l.185.033a24.17 24.17 0 0 0 1.939.262c.075.007.15.011.224.017.659.055 1.323.09 1.996.09s1.337-.035 1.996-.09c.075-.006.15-.01.224-.017.655-.06 1.301-.15 1.939-.262l.185-.033a23.451 23.451 0 0 0 1.954-.443l.075-.021a23.838 23.838 0 0 0 3.915-1.456l.018-.008a24.261 24.261 0 0 0 1.71-.908c.086-.05.172-.097.257-.148a24.123 24.123 0 0 0 1.487-.968c.124-.087.248-.174.371-.264.456-.334.9-.683 1.331-1.047.062-.052.129-.096.19-.149l.348-.3v-.017c4.906-4.398 8-10.778 8-17.869C49 11.767 38.233 1 25 1zm0 24c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm3 2c6.065 0 11 4.935 11 11v3.958c-.042.035-.086.067-.128.102-.395.321-.8.626-1.214.918-.092.065-.182.132-.274.195-.447.305-.906.591-1.373.862l-.257.148a21.799 21.799 0 0 1-6.871 2.468l-.171.031a22.27 22.27 0 0 1-1.715.225c-.079.007-.159.012-.239.018-.583.045-1.169.075-1.758.075s-1.175-.03-1.758-.077l-.239-.018a21.789 21.789 0 0 1-1.886-.256 22.013 22.013 0 0 1-5.212-1.626l-.161-.073a21.799 21.799 0 0 1-1.755-.917c-.467-.27-.926-.557-1.373-.862-.093-.063-.183-.13-.274-.195a21.826 21.826 0 0 1-1.214-.918c-.042-.034-.086-.067-.128-.102V38c0-6.065 4.935-11 11-11h6zm13 13.076V38c0-6.271-4.464-11.519-10.38-12.735A9.996 9.996 0 0 0 35 17c0-5.514-4.486-10-10-10s-10 4.486-10 10a9.996 9.996 0 0 0 4.38 8.265C13.464 26.481 9 31.729 9 38v2.076C5.284 36.135 3 30.831 3 25 3 12.869 12.869 3 25 3s22 9.869 22 22c0 5.831-2.284 11.135-6 15.076z"></path>
              </svg>
            </span>
          </a>
        </div>
        <div class="col-lg-11 col-md-11 col-sm-12">
          <div class="row">
            <div class="col-lg-12 card-margin">
              <div class="card search-form">
                <div class="card-body p-3">
                  <form id="search-form">
                    <div class="row align-items-center">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <input type="text" placeholder="Search for a specialization or service..." class="form-control" id="search" name="search">
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <button type="submit" class="btn btn-base">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                          </svg>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container " style="margin-top:50px;">
      <div class="row ">
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

        // Get the search query from the form
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

        // Query to fetch the information from the database
        $sql = "SELECT id, name, specialization, service_cost, photo,address FROM employees WHERE specialization LIKE '%$searchQuery%' ORDER BY RAND()"; // Update 'employees' as per your table name

        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
          // Loop through the rows and output a card for each employee
          while ($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $specialization = $row["specialization"];
            $service_cost = $row["service_cost"];
            $photo = $row["photo"];
            $worker_id = $row['id'];
            $address = $row['address'];
            // $worker_id = $row["id"];
        ?>
            <div class="col-lg-4 mb-4">
            <div class="card h-100">
              <img src="<?php echo $photo; ?>" class="card-img-top" alt="<?php echo $name; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <p class="card-text"><?php echo $specialization; ?></p>
                <p class="card-text"><?php echo $address; ?></p>
                <h6 class="card-subtitle mb-2 text-muted">₹<?php echo $service_cost; ?></h6>
                <form method="post" action="book_appointment.php">
                  <input type="hidden" name="worker_id" value="<?php echo $worker_id; ?>">
                  <button type="submit" class="btn btn-primary btn-block">Book an Appointment</button>
                </form>
              </div>
            </div>
          </div>

        <?php
          }
        } else {
          echo "No results found.";
        }

        // Close the database connection
        $conn->close();
        ?>

      </div>
    </div>
  </div>
  <!-- -------------------------------------------------------------------------------------------------------- -->

  <div class="container2" style="display:none">
    <nav>
      <p class="welcome">welcome back <?php echo $_SESSION["user_name"]; ?></p>
    </nav>
    <!-- <div class="notification-icon-container">
      <button type="button" class="icon-button" id="bellicon">
        <span class="material-icons">notifications</span>
        <span class="icon-button__badge">2</span>
      </button>
    </div> -->
    <main class="app">
      <div class="balance">
        <div>
          <p class="balance__label">Current bookings</p>
          <p class="balance__date">
  As of <span class="date"><?php echo date('d/m/Y'); ?></span>
</p>

        </div>
        <!-- <p class="balance__value">0000₹</p> -->
      </div>
      <div class="movements">
        <div class="movements__row">
          <div class="movements__type movements__type--deposit">2 deposit</div>
          <div class="movements__date">3 days ago</div>
          <span class="badge rounded-pill text-bg-success">Success</span>
        </div>
        <div class="movements__row">
          <div class="movements__type movements__type--withdrawal">1 withdrawal</div>
          <div class="movements__date">24/01/2037</div>
          <span class="badge rounded-pill text-bg-danger">Danger</span>
        </div>
      </div>
      <div class="summary">
        <!-- <p class="summary__label">In</p>
        <p class="summary__value summary__value--in">0000₹</p>
        <p class="summary__label">Out</p>
        <p class="summary__value summary__value--out">0000₹</p>
        <p class="summary__label">Interest</p>
        <p class="summary__value summary__value--interest">0000₹</p> -->
        <button class="btn--sort">&downarrow; SORT</button>
      </div>
      <div class="operation operation--transfer">
        <h2>Transfer money</h2>
        <form class="form form--transfer">
          <input type="text" class="form__input form__input--to" />
          <input type="number" class="form__input form__input--amount" />
          <button class="form__btn form__btn--transfer">&rarr;</button>
          <label class="form__label">Transfer to</label>
          <label class="form__label">Amount</label>
        </form>
      </div>
      <div class="operation operation--close">
        <h2>Close account</h2>
        <form class="form form--close">
          <input type="text" class="form__input form__input--user" />
          <input type="password" maxlength="6" class="form__input form__input--pin" />
          <button class="form__btn form__btn--close">&rarr;</button>
          <label class="form__label">Confirm user</label>
          <label class="form__label">Confirm PIN</label>
        </form>
      </div>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    window.addEventListener("scroll", function () {
      var container = document.querySelector(".container1");
      if (window.scrollY > 0) {
        container.classList.add("sticky");
      } else {
        container.classList.remove("sticky");
      }
    });
  </script>
  <script src="http://localhost/mininew/script.js"></script>
</body>

</html>
