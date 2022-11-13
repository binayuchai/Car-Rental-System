
<?php
require("../config.php");
session_start();



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
<style>
   .scrollHorizontal{
    overflow-x: auto;
   }

</style>
</head>

<body>
    <div class="container">
        <div class="data" id="data">
<div class="container px-2 my-5">
<div class="scrollHorizontal">


<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email Address</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $show_sql = "SELECT * FROM `complete_reservation`";
        $result = mysqli_query($con, $show_sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>" . $sno . " </th>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['p_no'] . "</td>
            <td>" . $row['user_email'] . "</td>
            <td>" . $row['user_address'] . "</td>
            <td>" . $row['user_city'] . "</td>
            <td>" . $row['state'] . "</td>
            <td>" . $row['zip_code'] . "</td>
          
            </tr>";
        }

        ?>
    </tbody>
</table>
</div>
</div>

        </div>
    </div>



<?php include('./dashboard.php');?>


<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>

// Include dataTable with the help of js

$(document).ready( function () {
    $('#myTable').DataTable();
} );

    
</script>
</body>
</html>