
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $show_sql = "SELECT * FROM `user_query`";
        $result = mysqli_query($con, $show_sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>" . $sno . " </th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['message'] . "</td>
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