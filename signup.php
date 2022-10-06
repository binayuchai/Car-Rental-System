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
    echo "
        <script>
        alert('Username is required');
    window.location.href='index.php';
    </script>
        ";
  } elseif (!preg_match("/^[a-zA-Z-' ]*$/", trim($_POST['username']))) {

    echo "
        <script>
        alert('Invalid user name format');
    window.location.href='index.php';
    </script>
        ";
  }

  // Checking  valid input for user email
  elseif (empty(trim($_POST['useremail']))) {
    echo "
        <script>
        alert('Email is required');
    window.location.href='index.php';
    </script>
        ";
  } elseif (!filter_var(trim($_POST['useremail']), FILTER_VALIDATE_EMAIL)) {
    echo "
        <script>
        alert('Invalid email format');
    window.location.href='index.php';
    </script>
        ";
  } elseif ($result) {
    // check if username or email is already registered
    if (mysqli_num_rows($result) > 0) {

      $result_fetch = mysqli_fetch_assoc($result);

      
      if ($result_fetch['username'] == trim($_POST['username'])) {
        // Username is already taken
      //  $username_err = "* Username is already taken";
        echo "
        <script>
        alert(' $result_fetch[username] is already taken');
        window.location.href='index.php';
        </script>
        "; 
      } else {

        // Email is already taken
        //$useremail_err = "* Email is already taken";
        echo "
                <script>
                alert('$result_fetch[useremail] is already taken');
            window.location.href='index.php';
            </script>
                ";
      }
    } else {
      // check for password length at first
      if(strlen($_POST['password'])<6)
      {
            echo "<script>
            alert('password should at least of length six');
        
          </script>";
      }
     
      else{
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $query = "INSERT INTO `userls`(`username`, `useremail`, `password`) VALUES ('$_POST[username]','$_POST[useremail]','$password')";
      if (mysqli_query($con, $query)) {
        // if data inserted successfully
        echo "
               <script>
               alert('Successfully registered.');
         window.location.href='index.php';
         </script>";
      } else {
        echo "
            <script>
            alert('Doesnot registered');
            window.location.href='index.php';
            </script>
             ";
      }
      }
    }
  } else {
    echo "
        <script>
        alert('Cannot run query');
        window.location.href='index.php';
        </script>";
  }

  mysqli_close($con);
}

?>



