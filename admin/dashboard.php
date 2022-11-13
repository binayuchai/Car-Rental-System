<?php
require("../config.php");


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>


  <!-- Css Links -->
  <link rel="stylesheet" href="../css/dashboard.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"> -->
  <link rel="stylesheet" href="../fonts-source/css/all.min.css">


  <style>
   .scrollHorizontal{
    overflow-x: auto;
   }

</style>
</head>

<body>
  <!-- Navbar -->
  <header class="header-dashboard">

  
      
        <div class="topbar">


              <div class="toggle-menu" id="toggle-menu">
                <i class="fa fa-bars open" aria-hidden="true"></i>
              </div>
            
              <div class='btn dropdown dashboard_sign_off' style="position: absolute; top: 0; right: 4rem;">
               <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton2' data-bs-toggle='dropdown' aria-expanded='false'>
               <i class='fas fa-user'></i>
               </button>
               <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton2'>
                 <li><a class='dropdown-item' href='admin-logout.php'>Log Out</a></li>
               
               </ul>
             </div>
              
        </div>
    
      <div class="navigation" id="navigation">
        
        <ul>
          <li class="nav-list"><a href="status.php" class="nav-link"><span class="nav-title">Status</span></a></li>
          <li class="nav-list"><a href="Registered_client.php" class="nav-link"><span class="nav-title">Registered Client</span></a></li>
          <li class="nav-list"><a href="add_car.php" class="nav-link"><span class="nav-title">Car Add</span></a></li>
          <li class="nav-list"><a href="contact_message.php" class="nav-link"><span class="nav-title">User's message</span></a></li>
      



          
        </ul>    
      </div>
  </header>
 




 
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.min.js"></script> 

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script>

var navbar = document.getElementById('navigation');
let toggle_menu = document.getElementById('toggle-menu');
let data = document.getElementById('data');
let navLink = document.querySelectorAll('nav-list');
toggle_menu.addEventListener('click',(e)=>{

  navbar.classList.toggle('active');
  
  e.preventDefault();
  console.log("clicked")
  
})

navLink.forEach(n => n.addEventListener("click", closeMenu));

  function closeMenu() {
      navbar.classList.remove("active");
  }


</script>
 <?php
 if(isset($_SESSION['status']) && $_SESSION['status']!=''){

 ?>
 <script>
 swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok,Done!",
});
</script>
 
<?php 
unset($_SESSION['status']);
 }
?>

</body>



</html>

