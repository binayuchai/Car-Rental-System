
<header>
  <div class="container">
<div class="header-info p-2 mb-4">
  <div class="header-right-info">
  
    <span>Contact: +977-9804573424</span>
  <span>Email: carRental@gmail.com</span>
  </div>
</div>
  </div>


<!-- Navigation part -->


<section class="nav-bar">
  <nav class="navbar navbar-expand-lg bg-primary navbar-primary nav-menu">
    <div class="container">
      <h3 class="text-white">Car Rental</h3>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <i class="fas fa-stream navbar-toggler-icon"></i>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav menu-navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="about" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="contact" href="contact.php">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="vehicle" href="vehicles.php">Vehicle Models</a>
          </li>
        </ul>
          


        <div class="btn-nav ms-auto">

          <?php
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            echo "
               <div class=' btn dropdown'>
               <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
               <i class='fas fa-user'></i>
               </button>
               <ul class='dropdown-menu' style='z-index:1000000;'aria-labelledby='dropdownMenuButton1'>
                 <li><a class='dropdown-item' href='logout.php'>Log Out</a></li>
               
               </ul>
             </div>
               ";
          } else {
            echo "  <button type='button' class='btn btn-white bg-white' data-bs-toggle='modal' data-bs-target='#loginModal'>Sign in</button>";
          }

          ?>

          <button type="button" class="btn btn-white bg-white" id="btn-link">Book Now</a></button>
        </div>




      </div>
  </nav>
        </section>


  <!-- Sign up part -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Create your Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="signup-form" action="signup.php" onsubmit="return checkValidation()" autocomplete="off">
            <div class="mb-3">
              <label for="username" class="form-label">Name</label><span class="error">*</span>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter your name">
              <span class="error" id="user_name_error"></span>

            </div>

            <div class="mb-3">
              <label for="useremail" class="form-label">Email address</label><span class="error">*</span>
              <input type="email" class="form-control" id="useremail" name="useremail"  aria-describedby="emailHelp">
              <span class="error" id="user_email_error"></span>


            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label><span class="error">*</span>
              <input type="password" class="form-control" name="password" id="password">
              <span class="error" id="user_pass_error"></span>
            </div>
          <!--   <div class="mb-3">
            <label for="confirm_pass" class="form-label">Confirm Password</label><span class="error">*</span>
            <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
          </div> 
 -->
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>

      </div>
    </div>
  </div>






  <!-- login parts  -->





  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login to Car Rental</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label for="username_email" class="form-label">User name or Email address</label>
              <input type="text" class="form-control" name="username_email" id="username_email" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>


            <button type="submit" class="btn btn-primary">Login</button>
          </form>

        </div>
        <div class="modal-footer">
          <p>Don't have a account? </p>
          <button class="btn btn-success" data-bs-toggle="modal" id="btnClose" data-bs-target="#signupModal" data-bs-dismiss="modal">Sign up</button>

        </div>
      </div>
    </div>
  </div>

  <!-- login parts ends -->


</header>

<script>
let btn_link = document.getElementById("btn-link");

btn_link.addEventListener('click',()=>{
  location.href = "vehicles.php";
})
  </script>


