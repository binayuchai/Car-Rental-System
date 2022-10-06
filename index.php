<?php
require('./config.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Css Links -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="fonts-source/css/all.min.css">
</head>

<body>

  <!-- Header Section Start -->

  <?php include('includes/header.php');?>

  
  <!-- header part ends-->

  <section id="main-content">

    <!-- Home Section starts -->
    <section id="home" >
      <?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
  {
    echo "
    <div class='mb-0
    alert alert-primary alert-dismissible fade show' role='alert'>
    <strong>$_SESSION[username] </strong> Welcome to our car rental site.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  
    ";
  }
  ?>
      <div class="container-fluid img-fluid home-section ">
        <div class="container">
          <div class="col-lg-5 col-md-6 text-center text-sm-start text-white home-text">
            <h4>Plan your trip now</h4>
            <h1>Save <span class="text-primary">big</span> with our<br>car rental</h1><br>
            <h4 class="text-white">To contribute to positive change and achieve our sustainability goals with many extraordinary</h4>
          </div>
        </div>
      </div>


      <div class="container book-area">

        <form class="row">
          <div class="col-lg col-md-3 mb-3 mb-lg-0">
            <label for="pick-up-location" class="form-label">Pick up location</label>
            <input type="text" id="pick-up-location" class="form-control" name="pick-up-location" placeholder="location">
          </div>
          <div class="col-lg col-md-3 mb-3 mb-lg-0">
            <label for="pick-up-date" class="form-label">Pick up Date</label>
            <input type="date" id="pick-up-date" class="form-control" name="pick-up-date">
          </div>
          <div class="col-lg col-md-3 mb-3 mb-lg-0">
            <label for="pick-up-time" class="form-label">Drop off Time</label>
            <input type="time" id="pick-up-time" class="form-control" name="pick-up-time">
          </div>
          <div class="col-lg col-md-3 mb-3 mb-lg-0">
            <label for="drop-off-location" class="form-label">Drop off location</label>
            <input type="text" id="drop-off-location" class="form-control" name="drop-off-location" placeholder="location">
          </div>
          <div class="col-lg col-md-5 mb-3 mb-lg-0">
            <label for="drop-off-date" class="form-label">Drop off Date</label>
            <input type="date" id="drop-off-date" class="form-control" name="drop-off-date">
          </div>

          <div class="col-lg col-md-5 mb-2 mb-lg-0">
            <label for="drop-off-time" class="form-label">Drop off Time</label>
            <input type="time" id="drop-off-time" class="form-control" name="drop-off-time">
          </div>
          <div class="col-lg-4 mb-1 mb-lg-0 pt-4">
            <button type="button" class="btn btn-secondary bg-primary">Search</button>

          </div>



        </form>


      </div>
    </section>
    <!-- Home Section ends -->




    <!-- Main Section -->
    <div id="main-section">
      <section class="about-section">
        <div class="container-fluid px-0">
          <div class="container">
            <div class="col">

              <h3>Plan your trip now</h3>
              <h1 class="my-4">Quick & easy car rental</h1>

              <div class="card-group">
                <div class="card my-3 card-width">
                  <div class="card-body">
                    <img src="images/car-insurance.png" class="car img-fluid" alt="select car">
                    <h3 class="card-title mt-3">Select Car</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                  </div>
                </div>


                <div class="card my-3 card-width">
                  <div class="card-body">
                    <img src="images/support.png" class="car img-fluid" alt="contact support">
                    <h3 class="card-title mt-3">Contact Support</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                  </div>
                </div>


                <div class="card my-3 card-width">
                  <div class="card-body">
                    <img src="images/guidepost.png" class="car img-fluid" alt="let's drive">
                    <h3 class="card-title mt-3">Let's Drive</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>



      <!-- Why us? -->
      <div id="whyUs">
        <div class="container-fluid">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <h3>Why Choose Us</h3>
                <h1 class="fw-bold mb-3">Best valued deals you will ever find</h1>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quis magni recusandae nulla deserunt debitis temporibus perspiciatis nemo! Voluptatem consectetur quia enim tempore voluptatibus ducimus accusamus iure, deserunt reprehenderit eaque!
                  Asperiores sunt velit possimus.</p>
                <button type="button" class="btn btn-primary my-4 p-2">Find More</button>

              </div>


              <div class="col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body row">

                    <img src="images/calendar.png" class="image-size" alt="">

                    <div class="col">
                      <h3>Flexible rentals</h3>
                      <p class="card-text">Cancel or change most bookings for free up to 48 hours before pick-up.</p>
                    </div>

                  </div>

                </div>
                <div class="card">
                  <div class="card-body row">

                    <img src="images/icons8-no-hidden-fees-100.png" class="image-size" alt="">

                    <div class="col">
                      <h3>No hidden fees</h3>
                      <p class="card-text">Know exactly what you’re paying.</p>
                    </div>

                  </div>

                </div>


                <div class="card">
                  <div class="card-body row">
                    <img src="images/best-price.png" class="image-size" alt="">
                    <div class="col">
                      <h3>Price Match Guarantee</h3>
                      <p class="card-text">Found the same deal for less? We’ll match the price.</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Why Us Section ends -->


    <!-- Counter section -->

    <section id="counter" class="counter">
      <div class="container-fluid">
        <div class="container">
          <div class="row text-center">
            <div class="mb-lg-0 col-md-4">
              <h2><span id="count1">40</span>+</h2>
              <p>Years of Experience</p>
            </div>
            <div class="mb-lg-0 col-md-4">
              <h2><span id="count2">40</span>+</h2>
              <p>happy client</p>
            </div>
            <div class="mb-lg-0 col-md-4">
              <h2><span id="count3">40</span>+</h2>
              <p>Awarded</p>
            </div>

          </div>


        </div>

      </div>

    </section>

  </section>




  <!-- Counter section ends-->

  <!-- Footer Section start-->
  <?php include('includes/footer.php');?>
  <!-- Footer Section ends -->


 

  <!-- Js inclusion -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>


<?php 
mysqli_close($con);
?>