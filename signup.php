<?php
// Include config file
require("config.php");

// Define variables and initialize with empty values
$username = $useremail = $password = $confirm_password = "";
$username_err = $useremail_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $user_exist_query = "SELECT * FROM userls WHERE username = '$_POST[username]' OR useremail = '$_POST[useremail]'";
  $result = mysqli_query($con, $user_exist_query);

  // Checking  valid input for user name
  if (empty(trim($_POST['username']))) {
    $_SESSION['status'] = 'Username is required';
    $_SESSION['status_code'] = 'error';
    $_SESSION['count'] = true;
    header('location:index.php');
   
  } else if (!preg_match("/^[a-zA-Z-' ]*$/", trim($_POST['username']))) {
    $_SESSION['status'] = 'Invalid user name format';
    $_SESSION['status_code'] = 'error';
    $_SESSION['count'] = true;
    header('location:index.php');

  }

  // Checking  valid input for user email
  else if (empty(trim($_POST['useremail']))) {
    $_SESSION['status'] = 'Email is required';
    $_SESSION['status_code'] = 'error';
    $_SESSION['count'] = true;
    header('location:index.php');

  } else if (!filter_var(trim($_POST['useremail']), FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status'] = 'Invalid email format';
    $_SESSION['status_code'] = 'error';
    $_SESSION['count'] = true;
    header('location:index.php');

  } else if ($result) {
    // check if username or email is already registered
    if (mysqli_num_rows($result) > 0) {

      $result_fetch = mysqli_fetch_assoc($result);

      
      if ($result_fetch['username'] == trim($_POST['username'])) {
        // Username is already taken
  
      $_SESSION['status'] = '$result_fetch[username] is already taken';
      $_SESSION['status_code'] = 'error';
      $_SESSION['count'] = true;
      header('location:index.php');
      
      } else {

        // Email is already taken
        //$useremail_err = "* Email is already taken";

        $_SESSION['status'] = '$result_fetch[useremail] is already taken';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');

      }
    } 
    else {
      // check for password length at first
      if(strlen($_POST['password'])<6)
      {
        $_SESSION['status'] = 'password should at least of length six';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');
           
      }
      else if($_POST['password'] != $_POST['confirm_pass']){
        $_SESSION['status'] = 'confirm password should be equal to password you entered';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');
   
      }
     
      else{
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $query = "INSERT INTO `userls`(`username`, `useremail`, `password`,`role`) VALUES ('$_POST[username]','$_POST[useremail]','$password',0)";
      if (mysqli_query($con, $query)) {
        // if data inserted successfully
        $_SESSION['status'] = 'Successfully registered.';
        $_SESSION['status_code'] = 'success';
        $_SESSION['count'] = true;
        header('location:index.php');

 
      } else {
        $_SESSION['status'] = 'Does not registered.';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');

             }
      }
    }
  } else {
    $_SESSION['status'] = 'Cannot run query';
    $_SESSION['status_code'] = 'error';
    $_SESSION['count'] = true;
    header('location:index.php');
 
  }

}


mysqli_close($con);

?>


