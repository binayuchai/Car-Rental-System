<?php
require("config.php");
session_start();

//Import PHPMailer classes 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('phpMailer/Exception.php');
require('phpMailer/PHPMailer.php');
require('phpMailer/SMTP.php');


// Define variables and intialize with empty values
$user_first_name = $user_last_name = $user_email = $user_phone = $user_address = $user_city = $user_age = $user_state= "";


$user_first_name_err = $user_last_name_err = $user_email_err = $user_phone_err = $user_address_err = $user_city_err = $user_age_err = $user_state_err = "";

// Processing form data when form get submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $user_first_name = test_input($_POST['user_first_name']);
  $user_last_name = test_input($_POST['user_second_name']);
  $user_email = test_input($_POST['user_email']);
  $user_phone = test_input($_POST['user_phone']);
  $user_address =test_input($_POST['user_address']); 
  $user_city = test_input($_POST['user_city']);
  $user_age = test_input($_POST['user_age']);
  $user_state = test_input($_POST['user_state']);
  

 if(empty( $user_first_name) && empty( $user_last_name) && empty($user_email) && empty($user_phone) && empty($user_address) && empty($user_city) && empty($user_age) && empty($user_state)){
  $_SESSION['status'] = 'Fields cannot be empty.';
  $_SESSION['status_code'] = 'error';
  header('location:vehicles.php');
  $_SESSION['count'] = true;
  

 }
$register_query = "INSERT INTO `complete_reservation`(`first_name`, `last_name`, `age`, `p_no`, `user_email`, `user_address`, `user_city`, `state`, `zip_code`) 
VALUES ('$_POST[user_first_name]','$_POST[user_second_name]','$_POST[user_age]','$_POST[user_phone]','$_POST[user_email]','$_POST[user_address]','$_POST[user_city]','$_POST[user_state]','$_POST[user_zip]') ";
 if (mysqli_query($con, $register_query)) {
   // if data inserted successfully

    $_SESSION['status'] = 'Registration successfull, please check your email for more details.';
    $_SESSION['status_code'] = 'success';
    header('location:vehicles.php');
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings

      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'arjun.191405@ncit.edu.np';                     //SMTP username
      $mail->Password   = 'Web&Developer191405@';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('arjun.191405@ncit.edu.np', 'Arjun uchai');
      $mail->addAddress($user_email);     //Add a recipient
      


      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Confirmation Reservation';
      $mail->Body    = "<h1><b>Reservation Successfull!</b></h1><h3>Please receive your rented car at location: <b>Balkumari,Lalitpur</b></h3><br>
      <h2><a href='https://goo.gl/maps/w3M5FXoSpv6Ckak6A' target='_blank'>Visit the link to get location in the map.</a></h2>";


      $mail->send();

    } catch (Exception $e) {
      $_SESSION['status'] = 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
      $_SESSION['status_code'] = 'success';
      header('location:vehicles.php');
 
    }

} 
else {
  $_SESSION['status'] = 'Doesnot registered. Please try again';
  $_SESSION['status_code'] = 'error';
  header('location:vehicles.php');
  $_SESSION['count'] = true;

}



}
function test_input($data)
{
$data = trim($data); // to remove extra space ,tab 
$data = stripslashes($data); // to remove backslashes
$data = htmlspecialchars($data); // to overcome from exploitation of input 
return $data;
}

mysqli_close($con);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicles</title>

  <!-- Css Links -->
  <link rel="stylesheet" href="./css/style.css" type="text/css">
  <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="./fonts-source/css/all.min.css">
</head>

<body>

  <!-- Header Section Start -->
  
  <?php include('scrollUpBtn.php');?>

  <?php include('includes/header.php'); ?>

  <!-- header part ends-->

  <section class="vehicle-section">
    <div class="container">
      <h2 class="mb-5 pb-4">Vehicles Model</h2>
          <div class="row row-cols-1 row-cols-md-3 g-4">
  

            <?php
              // to fetch data of added cars from database 
               $show_car_sql = "SELECT * FROM `add_car`";
               $result = mysqli_query($con, $show_car_sql);
              
               while($row = mysqli_fetch_assoc($result)){
               ?>
                  
                 <div class='col'>
                  <div class='card'>
                    <img src="./admin/<?php echo $row['Image']; ?>" class='card-img-top'  height = '200' width = '140' alt="<?php echo $row['car_model'];?>">
                

                    <div class='card-body'>
                      <h5 class='card-title'><?php echo $row['car_model']; ?></h5>
                      <p class="card-text"><strong class="text-danger">Rs.<?php echo $row['price']; ?></strong> per day</p>
                      <p class='card-text'><?php echo $row['car_desc']; ?></p>

                      <?php
                
                      if (isset($_SESSION['logged_in'])) {
                        echo "
                                <button type='sbutton' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                Book Now
                              </button>";
                      } else {
                        echo "<a href='#' id='book' class='btn btn-primary' >Book Now</a>";
                     
                      }
                
                      ?>
                    </div>
                  </div>  
                 </div> 
                  <?php }  ?>
              
                 

          </div>
    </div>

  </section>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">COMPLETE RESERVATION</h5>
          <span class="error" id="requiredField"></span>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" autocomplete="off" onsubmit="return completeReservation()">
            <div class="col-md-6">
              <label for="detail-first-name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="detail-first-name" placeholder="John" name = "user_first_name" onblur="validateFirstName(this)">
              <span class="error" id="first_name_error"></span>
            </div>

            <div class="col-md-6">
              <label for="detail-second-name" class="form-label">Second Name</label>
              <input type="text" class="form-control" id="detail-second-name"  name="user_second_name" placeholder="Doe" onblur="validateSecondName(this)">
              <span class="error" id="second_name_error"></span>
            </div>
            <div class="col-md-6">
              <label for="detail-age" class="form-label">Age</label>
              <input type="number" class="form-control" id="detail-age" placeholder="23" name="user_age" onblur="validateAge(this)">
              <span class="error" id="age_error"></span>
            </div>
            <div class="col-md-6">
              <label for="detail-phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="detail-phone" placeholder="9893214441" name="user_phone" onblur="validatePhone(this)">
              <span class="error" id="phone_error"></span>
            </div>
            <div class="col-md-12">
              <label for="detail-user-email" class="form-label">Email</label>
              <input type="email" class="form-control" id="detail-user-email" placeholder="abc@gmail.com" name="user_email" onblur="validateEmail(this)">
              <span class="error" id="user_email_error"></span>
            </div>

            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="detail-address" placeholder="1234 Main St" name="user_address" onblur="validateAddress(this)">
              <span class="error" id="address_error"></span>
            </div>

            <div class="col-md-6">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" class="form-control" id="detail-city" name="user_city" onblur="validateCity(this)">
              <span class="error" id="city_error"></span>
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">State</label>
              <select id="detail-state" class="form-select" name="user_state" onblur="validateState(this)">
                <option value="..." selected>Choose...</option>
                <option value="Province No. 1">Province No. 1</option>
                <option value="Madhesh Province">Madhesh Province</option>
                <option value="Bagmati Province">Bagmati Province</option>
                <option value="Gandaki Province">Gandaki Province</option>
                <option value="Lumbini Province">Lumbini Province</option>
                <option value="Karnali Province">Karnali Province</option>
                <option value="Sudurpashchim Province">Sudurpashchim Province</option>
              </select>
              <span class="error" id="state_error"></span>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="inputZip" name="user_zip">
              <span class="error" id="zip_error"></span>
            </div>
      
             <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      
      </div>
    </div>
  </div>


  <!-- Footer Section start-->
  <?php include('includes/footer.php'); ?>
  <!-- Footer Section ends -->


   <!-- Js inclusion -->

 <script src="./js/reservation.js"></script>
 
 <script src="./js/bootstrap.min.js"></script> 


 <script>



  <?php
 if(isset($_SESSION['status']) && $_SESSION['status']!='' &&  $_SESSION['count'] == true){

 ?>
 <script>
  console.log('click successful');
 swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
</script>
 
<?php 
$_SESSION['count'] = false;
unset($_SESSION['status']);
unset($_SESSION['status_code']);
 }
?>

 


  
</body>

</html>
