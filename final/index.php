<?php
// Start the session to access session data
session_start();

// Rest of your PHP code
// ...
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/png" href="img/logopro1.png" />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>BookEase | When Booking meets Simplicity</title>

    <script defer src="script.js"></script>
  </head>
  <body>
    <header class="header">
      <header class="main-header">
        <div class="grid-2-col">
          <div>
            <h1 class="welcome">welcome to BookEase</h1>
          </div>
          <div>
            <a class="login-btn btn" href="new.php">login</a>
          </div>
          <div>
            <a class="register-btn btn" href="new.php">register</a>
          </div>
        </div>
      </header>
      
      <!-- ------------------------------------- -->

      <
      
      <!-- ------------------------------------- -->
      <div class="header__title">
        <!-- <h1 onclick="alert('HTML alert')"> -->
        <h1>
          When
          <!-- Green highlight effect -->
          <span class="highlight">booking</span>
          meets<br />
          <span class="highlight">simplicity</span>
        </h1>
        <h4>Streamlined Service Booking for Effortless Experiences.</h4>
        <button class="btn--text btn--scroll-to">Learn more &DownArrow;</button>
        <img
          src="img/hero.png"
          class="header__img"
          alt="Minimalist bank items"
        />
      </div>
    </header>

    <section class="section" id="section--1">
      <div class="section__title">
        <h2 class="section__description">Features</h2>
        <h3 class="section__header">
          Everything you need in a modern booking service and more.
        </h3>
      </div>

      <div class="features">
        <img
          src="https://media.istockphoto.com/id/1406674214/photo/asian-man-on-his-cellphone-texting.jpg?s=612x612&w=0&k=20&c=XGd5EvriMyyZRBe5rw_v5PoGbB5exIU63kdI_GvdmJA="
          data-src="img/digital.jpg"
          alt="Computer"
          class="features__img "
        />
        <div class="features__feature">
          <div class="features__icon">
            <svg>
              <use xlink:href="img/icons.svg#icon-monitor"></use>
            </svg>
          </div>
          <h5 class="features__header">Seamless Service Booking</h5>
          <p>
            Effortless convenience, trusted professionals, secure payments - all in one user-friendly digital platform.
          </p>
        </div>

        <div class="features__feature">
          <div class="features__icon">
            <svg>
              <use xlink:href="img/icons.svg#icon-trending-up"></use>
            </svg>
          </div>
          <h5 class="features__header">Watch Your Services Thrive:</h5>
          <p>
            Effortlessly manage bookings, trusted professionals, and secure transactions for a seamless service booking experience.
          </p>
        </div>
        <img
          src="https://media.istockphoto.com/id/1297412759/photo/water-propagation-monstera-adansonii-house-plant-on-a-white-table.jpg?s=612x612&w=0&k=20&c=OCc6DBVnH1EinDhCr2YmCMBLEA4UaIfmz0rEh8IEvsg="
          data-src="img/grow.jpg"
          alt="Plant"
          class="features__img lazy-img"
        />

        <img
          src="https://media.istockphoto.com/id/1059113688/photo/courier-receiving-cash-payment-for-cardboard-parcel-delivery-express-shipping.jpg?s=612x612&w=0&k=20&c=AHzujRlpzzOnfRqtorfrN6BoetBQnlnwdxmPLT4oitA="
          data-src="img/card.jpg"
          alt="Credit card"
          class="features__img lazy-img"
        />
        <div class="features__feature">
          <div class="features__icon">
            <svg>
              <use xlink:href="img/icons.svg#icon-credit-card"></use>
            </svg>
          </div>
          <h5 class="features__header">Easy payment modes</h5>
          <p>
            Simplify Service Booking with Convenient and Secure Payment Options for a Seamless Experience.
          </p>
        </div>
      </div>
    </section>

    <section class="section" id="section--2">
      <div class="section__title">
        <h2 class="section__description">Operations</h2>
        <h3 class="section__header">
          Everything as simple as possible, but no simpler.
        </h3>
      </div>

      <div class="operations">
        <div class="operations__tab-container">
          <button
            class="btn operations__tab operations__tab--1 operations__tab--active"
            data-tab="1"
          >
            <span>01</span>Instant Booking
          </button>
          <button class="btn operations__tab operations__tab--2" data-tab="2">
            <span>02</span>Instant Services
          </button>
          <button class="btn operations__tab operations__tab--3" data-tab="3">
            <span>03</span>Instant Cancellation
          </button>
        </div>
        <div
          class="operations__content operations__content--1 operations__content--active"
        >
          <div class="operations__icon operations__icon--1">
            <svg>
              <use xlink:href="img/icons.svg#icon-upload"></use>
            </svg>
          </div>
          <h5 class="operations__header">
            
            Effortlessly book services in a snap! Seamless, hassle-free, and no hidden fees.
          </h5>
          <p>
            Experience the convenience of effortlessly booking services with our platform. Say goodbye to the complexities and enjoy a seamless, hassle-free process from start to finish. We believe in transparency, which is why there are no hidden fees involved. With our user-friendly interface, you can easily browse through a wide range of services and book them in a snap. 
          </p>
        </div>

        <div class="operations__content operations__content--2">
          <div class="operations__icon operations__icon--2">
            <svg>
              <use xlink:href="img/icons.svg#icon-home"></use>
            </svg>
          </div>
          <h5 class="operations__header">
            Instantaneous Service Bookings. Effortless, Rapid Gratification. Embrace Instant Convenience Today.
          </h5>
          <p>
            Embrace the power of instantaneous service bookings, where convenience meets rapid gratification. With our platform, you can effortlessly book services and experience instant satisfaction. Say goodbye to lengthy processes and waiting times, as our seamless system provides instant convenience at your fingertips. 
          </p>
        </div>
        <div class="operations__content operations__content--3">
          <div class="operations__icon operations__icon--3">
            <svg>
              <use xlink:href="img/icons.svg#icon-user-x"></use>
            </svg>
          </div>
          <h5 class="operations__header">
            Effortless Cancellations. Streamlined Service. Experience Instant Convenience Today.
          </h5>
          <p>
            Experience the ease of effortless cancellations with our streamlined service. Say goodbye to complicated processes and enjoy the simplicity of canceling bookings with just a few clicks. Our platform ensures a hassle-free cancellation experience, allowing you to make changes effortlessly. 
          </p>
        </div>
      </div>
    </section>

    <section class="section section--sign-up">
      <div class="section__title">
        <h3 class="section__header">
          The best day to join BookEase was one year ago. The second best is
          today!
        </h3>
      </div>
      <a href="new.php">

        <button class="btn btn--show-modal">Open your free account today!</button>
      </a>
    </section>

    <footer class="footer">
      <ul class="footer__nav">
        <li class="footer__item">
          <a class="footer__link" href="#">About</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">Pricing</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">Terms of Use</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">Privacy Policy</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">Careers</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">Blog</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">Contact Us</a>
        </li>
      </ul>
      <img src="img/logopro1.png" alt="Logo" class="footer__logo" />
      <p class="footer__copyright">
        &copy; Copyright by
        <a
          class="footer__link twitter-link"
          target="_blank"
          href="https://instagram.com/jeeva.013"
          >Jeevan</a
        >. Use for learning or your portfolio. Don't use to teach. Don't claim
        as your own product.
      </p>
    </footer>

    <!-- <div class="modal hidden">
      <button class="btn--close-modal">&times;</button>
      <h2 class="modal__header">
        Open your account <br />
        in just <span class="highlight">5 minutes</span>
      </h2>
      <form class="modal__form">
        <div class="form-check" >
          <input class="form-check-input" type="radio" name="registrationType" id="workerRadio" value="worker">
          <label class="form-check-label" for="workerRadio">
            Register as Worker
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="registrationType" id="customerRadio" value="customer">
          <label class="form-check-label" for="customerRadio">
            Register as 
            <br>
            Customer
          </label>
        </div> -->
    
        <!-- Add other form fields as needed -->
        <!-- <label>First Name</label>
        <input type="text" />
        <label>Last Name</label>
        <input type="text" />
        <label>Email Address</label>
        <input type="email" /> -->
<!--     
        <button class="btn">Next step &rarr;</button>
      </form>
    </div>
   -->
    
    <div class="overlay hidden"></div>

    <!-- <script src="script.js"></script> -->
  </body>
</html>
