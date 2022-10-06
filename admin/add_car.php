

<?php
require("../config.php");

$add_image_error = "";
$image = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$filetemp = $destfile ="";
$destfile = "";
//validation of image
  $file = $_FILES['add_car_image'];
  $image =$file;
  $filename = $file['name'];
  $filetmp = $file['tmp_name'];
  $fileerror = $file['error'];

  
  //image partition i.e (hello.jpg) => hello and jpg
  $file_part = explode('.',$filename); 

  $file_extension = strtolower(end($file_part));

  $valid_file_ext = array('png','jpg','jpeg');

  if($fileerror == 0)
  {

   if(in_array($file_extension,$valid_file_ext)){
    
  $destfile = 'image_upload/'.$filename;
  
    move_uploaded_file($filetemp,$destfile);


      $car_query = "INSERT INTO `add_car`(`car_model`, `car_desc`, `Image`) VALUES ('$_POST[add_car_title]','$_POST[add_car_desc]','$destfile')";
      if (mysqli_query($con, $car_query)) {
        // if data inserted successfully
        echo "
              <script>
              alert('Successfully registered.');
        window.location.href='add_car.php';
        </script>";
      } else {
        echo "
            <script>
            alert('Doesnot registered');
            window.location.href='add_car.php';
            </script>
            ";
      }
  }
      else{
        $add_image_error = "Format is not supported, only supports jpg,jpeg and png";
        echo "
            <script>
            window.location.href='add_car.php';
            </script>
            ";
      
    }
}
  
// else if 
  else{
      $add_image_error = "Error with file. Try again";
      echo "
      <script>
    
      window.location.href='add_car.php';
      </script>
      ";
     
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../fonts-source/css/all.min.css">

  
</head>
<?php include('./dashboard.php');?>

<body>
<div class="container">
  <div class="data" id="data">
<div class="container px-2 my-5">
  <h2 class="mb-4">Add Car Details</h2>
  <h4><?php echo $image;?></h4>
<form class="col" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype="multipart/form-data" autocomplete="off" method="POST" onsubmit="return validateCarInfo()">
  <div class="mb-3">
    <label for="add_car_title" class="form-label">Car Model Name</label>
    <input type="text" class="form-control" id="add_car_title" name="add_car_title" onblur="validateCarName(this)">
    <span class="error" id="name_error"></span>

  </div>
 
  
  <div class="mb-3">
  <label for="add_car_desc" class="form-label">Car Description</label>
  <textarea class="form-control" id="add_car_desc" rows="3" name="add_car_desc" onblur="validateCarDesc(this)"></textarea>
  <span class="error" id="desc_error"></span>

</div>
<div class="mb-3">
<label class = "form-label" for="add_car_image">Upload Image</label>
  <input type="file" class="form-control" id="add_car_image" name="add_car_image" onblur="validateCarImage(this)">
  <span class="error" id="image_error"><?php echo $add_image_error; ?></span>

 
</div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Add</button>
  
  </div>
</form>
       
</div>

</div>

</div>

<!--Form validation using js-->
<script>
var car_name = document.getElementById("add_car_title");
var car_desc = document.getElementById("add_car_desc");
var car_image = document.getElementById("add_car_image");
const isEmpty = value => value === '' ? true : false;

function showError(ID, value) {
    document.getElementById(ID).innerHTML = value;
}

function validateCarName(car_name){
  car = car_name.value.trim();
  if(isEmpty(car)){
showError("name_error","Please fill the car model");
car_name.classList.add('is-invalid');
return false;
  }
  else{
    showError("name_error","");
    car_name.classList.remove('is-invalid');
    return true;
  }
}

function validateCarDesc(car_desc){
  car_d = car_desc.value.trim();
  if(isEmpty(car_d)){
    showError("desc_error","Please fill the car description.");
    car_desc.classList.add('is-invalid');
    return false;
  }
  else{
    showError("desc_error","");
    car_desc.classList.remove('is-invalid');
    return true;
  }
  
}
function validateCarImage(car_image){
  if(isEmpty(car_image)){
    showError("image_error","Please upload the image of car.");
  car_image.classList.add('is-invalid');
    return false;
  }
  else{
    showError("image_error","");
  car_image.classList.remove('is-invalid');
    return true;
  }
  
}
function validateCarInfo(){
if(validateCarDesc && validateCarImage && validateCarImage){
  return true;
}
else{
  return false;
}
}

  </script>


