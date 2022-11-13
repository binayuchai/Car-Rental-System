
<?php
require('./config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")

{
    if (empty(trim($_POST['username_email']))) {
        
          
        $_SESSION['status'] = 'Username or Email is required';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');
      
      } 
    if (empty(trim($_POST['password']))) {
        $_SESSION['status'] = 'password is required';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');
     
      }
    
 
    $query = "SELECT * FROM `userls` WHERE (`username` = '$_POST[username_email]' OR `useremail` = '$user')";
    $result = mysqli_query($con,$query);

                 if($result)
                {

                     if(mysqli_num_rows($result) > 0)
                    {

                        while($row = mysqli_fetch_assoc($result))
                        {

                            if(password_verify($_POST['password'],$row['password']))
                            {
                                         
                                if($row['role'] == "1")
                                {
                                    $_SESSION['status'] = "Welcome to dashboard";
                                    $_SESSION['status_code'] = "info";
                                    header("location: ./admin/status.php");
                                    $_SESSION['admin'] = true;
                                    $_SESSION['admin_logged_in'] = true;
                                    exit(0);

                            
                                }
                                if($row['role'] == "0")
                                {
                                    $_SESSION['logged_in'] = true;
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['count'] = true;
                                    header("location: index.php");

                                
                                
                                }
                            }
                            else
                            {
                                    // if password do not matched
                                    $_SESSION['status'] = 'Incorrect password . Password do not matched';
                                    $_SESSION['status_code'] = 'error';
                                    $_SESSION['count'] = true;
                                    header('location:index.php');
                            }

                        }
                    }
                    else
                    {
                        // if password or username doesnot match
                        $_SESSION['status'] = 'Username or Email is not registered';
                        $_SESSION['status_code'] = 'error';
                        $_SESSION['count'] = true;
                        header('location:index.php');
                  
                    
                    }
                }
        
                else
                {
                    // if password or username doesnot match
                    $_SESSION['status'] = 'Username or Email is not registered';
                    $_SESSION['status_code'] = 'error';
                    $_SESSION['count'] = true;
                    header('location:index.php');
              

                }

}
    else
    {
        $_SESSION['status'] = 'Something went wrong. Please try again';
        $_SESSION['status_code'] = 'error';
        $_SESSION['count'] = true;
        header('location:index.php');
    }


mysqli_close($con);


?>




















