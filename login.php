
<?php
require('./config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    
    
 
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
                                    $_SESSION['message'] = "Welcome to dashboard";
                                    header("location: ./admin/dashboard.php");
                                    $_SESSION['admin'] = true;
                                    $_SESSION['admin_logged_in'] = true;
                                    exit(0);

                            
                                }
                                if($row['role'] == "0")
                                {
                                    $_SESSION['logged_in'] = true;
                                    $_SESSION['username'] = $row['username'];
                                    header("location: index.php");
                                
                                
                                }
                            }
                            else
                            {
                                    // if password do not matched
                                echo "
                                <script>
                                alert('Incorrect password . Password do not matched');
                                window.location.href='index.php';
                                </script>
                                "; 
                            }

                        }
                    }
                    else
                    {
                        // if password or username doesnot match
                        echo "
                        <script>
                        alert('Username or Email is not registered');
                        window.location.href='index.php';
                        </script>
                        "; 
                    
                    }
                }
        
                else
                {
                    // if password or username doesnot match
                    echo "
                        <script>
                        alert('Username or Email is not registered');
                        window.location.href='index.php';
                        </script>
                        "; 

                }

}
    else
    {
        echo "
        <script>
        alert('Something is wrong. Please try again');
        window.location.href='index.php';
        </script>
        "; 
    }


mysqli_close($con);


?>


















