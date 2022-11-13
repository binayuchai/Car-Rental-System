
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


  <nav id="nav-menu" class="navbar navbar-expand-lg bg-primary navbar-primary nav-menu">
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
               <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
               <i class='fas fa-user'></i>
               </button>
               <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
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
  

        
<?php include('scrollUpBtn.php');?>

  <!-- Sign up part -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Create your Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="signup-form" action="signup.php" autocomplete="off" onsubmit="return checkValidation()" >
            <div class="mb-3">
              <label for="username" class="form-label">Name</label><span class="error">*</span>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter your name" onblur="checkUserName(this)">
              <span class="error" id="user_name_error"></span>

            </div>

            <div class="mb-3">
              <label for="useremail" class="form-label">Email address</label><span class="error">*</span>
              <input type="email" class="form-control" id="useremail" name="useremail" onblur="checkUserEmail(this)">
              <span class="error" id="user_email_error"></span>


            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label><span class="error">*</span>
              <p>
              <input type="password" class="form-control" name="password" id="password" onblur="checkUserEmail(this)">
              <i class="bi bi-eye-slash" id="togglePassword"></i></p>
              <span class="error" id="user_pass_error"></span>
            </div>
            <div class="mb-3">
            <label for="confirm_pass" class="form-label">Confirm Password</label><span class="error">*</span>
            <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" onblur="checkPasswordEqual(this)">
            <span class="error" id="confirm_pass_error"></span>
          </div> 
            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
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
          <h5 class="modal-title" id="loginModalLabel">Sign in</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST" onsubmit="return checkLoginValidation()">
            <div class="mb-3">
              <label for="username_email" class="form-label">User name or Email address</label>
              <input type="text" class="form-control" name="username_email" id="username_email" aria-describedby="emailHelp" onblur="checkLoginUser(this)">
              <span class="error" id="login_username_email_error"></span>
            </div>
            <div class="mb-3">
              <label for="login_password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="login_password" onblur="checkLoginPass(this)">
              <span class="error" id="login_pass_error"></span>
              
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
<script src="../js/bootstrap.min.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../js/script.js"></script>

<script>


let id = (id) => document.getElementById(id);
// Declaring variable 
let validName = false,
validEmail = false,
validPass = false,
validConfirmPass = false;



let signup_form = id('signup-form'),
    user_name = id('username'),
    user_pass = id('password'),
    confirm_pass = id('confirm_pass'),
    user_email = id('useremail');



function showError(ID, value) {
    document.getElementById(ID).innerHTML = value;
}


const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
let isRequired = value => value === '' ? true : false;

let regex = /^[a-zA-Z]([0-9a-zA-Z]){4,20}$/;

// Validation of user name
function checkUserName() {
    user_name_value = user_name.value.trim();
    let valid_regex = regex.test(user_name_value);
    if (isRequired(user_name_value)) {
        showError("user_name_error", "Username is required");
        user_name.classList.add('is-invalid');
    } else if (!valid_regex) {
        showError("user_name_error", "Spaces is not allowed and Length should be more than 5 and less than 11");
        user_name.classList.add('is-invalid');
    } else {
      validName = true;
        showError("user_name_error", "");
        user_name.classList.remove('is-invalid');
    }
    console.log(validName);

}

// Validation of email
function checkUserEmail() {
    user_email_value = user_email.value.trim();
    if (isRequired(user_email_value)) {
        showError("user_email_error", "Email is required");
        user_email.classList.add('is-invalid');
    } else if (!isEmailValid(user_email_value)) {
        showError("user_email_error", "Email is in invalid format");
        user_email.classList.add('is-invalid');

    } else {
      validEmail = true;
        showError("user_email_error", "");
        user_email.classList.remove('is-invalid');
    }
    console.log(validEmail);
}
// Validation of password
function checkUserPassword() {
    let user_pass_value = user_pass.value.trim();
    if (isRequired(user_pass_value)) {
        showError("user_pass_error", "Password is required");
        user_pass.classList.add('is-invalid');

    } else if (user_pass_value.length() < 6) {
        showError("user_pass_error", "Length of password is must be atleast 6 character");
        user_pass.classList.add('is-invalid');

    } else {
      
        showError("user_pass_error", "");
        user_pass.classList.remove('is-invalid');
        validPass = true;
    }
    return validPass;
}

//Validate the confirm password
function checkPasswordEqual() {
    let confirm_pass_value = confirm_pass.value.trim();
    let user_pass_value = user_pass.value.trim();
    if (confirm_pass_value != user_pass_value) {
        showError("confirm_pass_error", "Confirm password is not equal");
        user_pass.classList.add('is-invalid');

    } else {
      validConfirmPass = true;
        showError("confirm_pass_error", "");
        user_pass.classList.remove('is-invalid');

    }
  
}




function checkValidation() {

    result = validName && validEmail && checkUserPassword() && validConfirmPass;
  
    if (result) {
    
        return true;
    }
    else{
      
        return false;
    }

}

//Login Validation

let login_pass = document.getElementById('login_password');
let login_username_email = document.getElementById('username_email');

function checkLoginUser(){
        login_username_email_value = login_username_email.value.trim();
        if(isRequired(login_username_email_value)){
        showError("login_username_email_error", "Username or email is required");
        login_username_email.classList.add('is-invalid');
        return false;
        }
        showError("login_username_email_error", "");
        login_username_email.classList.remove('is-invalid');
        return true;
}


function checkLoginPass(){
  login_pass_value = login_pass.value;
  if(isRequired(login_pass_value)){
        showError("login_pass_error", "Password is required");
        login_pass.classList.add('is-invalid');
        return false;
  }
       showError("login_pass_error", "");
       login_pass.classList.remove('is-invalid');
       return true;


}

function checkLoginValidation(){
  if(checkLoginPass() && checkLoginUser()){
    return true;
  }
  else{
    return false;
  }
}


let btn_link = document.getElementById("btn-link");

btn_link.addEventListener('click',()=>{
  location.href = "vehicles.php";
})



// Code to show password 

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click',()=>{
     // Toggle the type attribute using
    // getAttribute() method
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("typr",type);
    
     // toggle the icon
     this.classList.toggle("bi-eye");

})

  </script>



