<?php
require("config.php");
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Css Links -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="fonts-source/css/all.min.css">
</head>

<body>

 <?php include('includes/header.php');?>
<?php

$user_contact_name=$user_contact_email="";

/* For handling error */
$user_email_error=$user_name_error="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // (User name Validation)
if(empty($_POST["contact-user-name"])){
  $user_name_error = "Name is required";
}
else{

  $user_contact_name = test_input($_POST["contact-user-name"]);

  //Checking the valid input user name
  if(!preg_match("/^[a-zA-Z-' ]*$/",$user_contact_name))
  {
    $user_name_error = " * Only letters and white space allowed";
  }

}

//(User email Validation)

if(empty($_POST["contact-user-email"]))
{
  $user_email_error = "Email is required";
}
else{
  $user_contact_email = test_input($_POST["contact-user-email"]);

  //Checking the valid input user email

  if(!filter_var($user_contact_email,FILTER_VALIDATE_EMAIL))
  {
    $user_email_error = "Invalid Email Address format";
  }

}

}






  // To check the whether input given by user is valid or not
function test_input($data)
{
$data = trim($data); // to remove extra space ,tab 
$data = stripslashes($data); // to remove backslashes
$data = htmlspecialchars($data); // to overcome from exploitation of input 
return $data;
}





?>
<section class="contact-section">

      <div class="container">
    <h1>Contact Us</h1>

    <div class="row mb-30 mt-5">
      <div class="col">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.4854748218427!2d85.33654961406988!3d27.67138643368032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e8af4a5fe3%3A0x963d00cdf478c6b6!2sNepal%20College%20of%20Information%20Technology!5e0!3m2!1sen!2sus!4v1657289334170!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    

      <div class="col">
        <form action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="row"  id="form-submission" autocomplete="off" onsubmit="return submitForm()">
        <p><span class="error">* required field</span></p>
          <div class="col-12 mb-3" id=" error-handling-name">
            <label for="contact-user-name" class="form-label">Full name</label><span class="error">*</span>
            <input type="text" class="form-control" name="contact-user-name" id="contact-user-name" placeholder="Enter your full name" required><span class="error"><?php echo $user_name_error; ?></span>
            
          </div>
          <div class="col-12 mb-3 error-handling">
            <label for="contact-user-email" class="form-label">Email Address</label><span class="error">*</span>
            <input type="text" class="form-control" name="contact-user-email" id="contact-user-email" placeholder="Enter your email address" required>
            <span class="error"><?php echo $user_email_error; ?></span>
          </div>
          <div class="col-12 mb-3 error-handling">
            <label for="contact-message" class="form-label">Message</label>
            <textarea name="contact-message" id="contact-message" class="form-control" cols="30" rows="5" placeholder="Enter your message"></textarea>
          </div>


          <div class="col-12">
            <button class="btn btn-primary" type="submit" onclick="submitForm()">Submit form</button>
          </div>
        </form>
      </div>


      </div>
  </div>

</section>


<!-- Footer Section start-->
<?php include('includes/footer.php');?>
  <!-- Footer Section ends -->


  <!-- Js inclusion -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/contact-us.js"></script>
  <script src="js/script.js"></script>

</body>

</html>