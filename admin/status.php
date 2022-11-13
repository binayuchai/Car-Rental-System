

<?php
require("../config.php");
session_start();


// Edit 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_model = $car_desc = $price ="";
$sno = "";

    if (isset($_POST['snoEdit'])) {
        //update the record
        $car_model = $_POST['titleEdit'];
        $car_desc = $_POST['descEdit'];
        $price = $_POST['priceEdit'];
        $sno = $_POST['snoEdit'];
        $filetemp = $destfile ="";
        $destfile = "";
        

        //validation of image
          $file = $_FILES['file'];
          $image =$file;
          $filename = $file['name'];
          $filetmp = $file['tmp_name'];
          $fileerror = $file['error'];
          $uploadOk = 1;
         
          //image partition i.e (hello.jpg) => hello and jpg
          $file_part = explode('.',$filename); 
        
          $file_extension = strtolower(end($file_part));
        
          $valid_file_ext = array('png','jpg','jpeg');
        
        
          if($fileerror != 0)
          {
            $uploadOk = 0;
            
              $add_image_error = "Error with file. Try again";
              $_SESSION['status'] = 'Error with file. Try again';
              $_SESSION['status_code'] = 'error';
              header('location:status.php');
        
        
          }
        //Check the extension of file 
           if(!in_array($file_extension,$valid_file_ext)){
           
            $uploadOk = 0;
            
            $add_image_error = "Format is not supported, only supports jpg,jpeg and png";
            $_SESSION['status'] = 'Format is not supported, only supports jpg,jpeg and png';
            $_SESSION['status_code'] = 'error';
            header('location:status.php');
        
           }
      
        
            if($uploadOk == 0){
      
              $_SESSION['status'] = 'Unsuccessful';
              $_SESSION['status_code'] = 'error';
              header('location:status.php');
  
            }
            else{
                  $destfile = 'upload/'.$filename;
                  
 
        
        $sql = "UPDATE `add_car` SET  `car_model` = '$car_model' , `car_desc` = '$car_desc' , `Image` ='$destfile' ,`price` = '$price' WHERE `add_car`.`car_id` = $sno";
        if (mysqli_query($con, $sql)) {
     
            $_SESSION['status'] = 'Successfully Changed';
            $_SESSION['status_code'] = 'success';
            $update = true;

            move_uploaded_file($filetmp,$destfile);
        } else {
            echo "Record is not updated" . mysqli_error($con);
        }
    } 
        
}
}
// delete the record
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];

    $sql = "DELETE FROM `add_car` WHERE `car_id` = $sno";
    if (mysqli_query($con, $sql)) {
        $delete = true;
        $_SESSION['status'] = 'Successfully deleted';
        $_SESSION['status_code'] = 'success';
    } else {
        echo "Record is not deleted" . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../fonts-source/css/all.min.css">
<style>

   .scrollHorizontal{
    overflow:auto;

    
   }

</style>
</head>



    <!--Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" style="z-index:100000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="titleEdit" class="form-label">Note Title</label>
                            <input type=" text " class=" form-control " name="titleEdit" id="titleEdit" placeholder="Enter car model">
                        </div>
                        <div class=" mb-3 ">
                            <label for="description " class=" form-label ">Car details</label>
                            <textarea class=" form-control " id="descEdit" name="descEdit" rows=" 3 "></textarea>
                        </div>
                        <div class=" mb-3 ">
                            <label for="price " class=" form-label ">Price</label>
                            <input type = "text" class=" form-control " id="priceEdit" name="priceEdit" placeholder="Enter price of car">
                        </div>
                        <div class="mb-3">
                            <label class = "form-label" for="file">Change image</label>
                            <input type="file" class="form-control" id="file" name="file">
                        

                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



        <div class="data" id="data">
<div class="container">            
<div class="px-2 my-5">
    <div class="container">
<div class="scrollHorizontal">


<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Car Model</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          
        </tr>
    </thead>
    <tbody>

        <?php
        $show_sql = "SELECT * FROM `add_car`";
        $result = mysqli_query($con, $show_sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>" . $sno . " </th>
            <td>" . $row['car_model'] . "</td>
            <td>" . $row['car_desc'] . "</td>
            <td>" . $row['price'] . "</td>
            <td> <img src='./".$row['Image']."' class='card-img-top' alt=". $row['car_model']."></td>
            <td><button type='button' id=" . $row['car_id'] . " class='edit btn btn-primary'>Edit</button></td>
            <td><button type='button' id=d" . $row['car_id'] . " class='delete btn btn-danger'>Delete</button></td>
          
            </tr>";
        }

        ?>
    </tbody>
</table>
</div>
    </div>
</div>

</div>
        </div>
        <?php include('./dashboard.php');?>
    <script>
       


        //for edit 
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit", );
                tr = e.target.parentNode.parentNode;
                console.log(tr)
                title = tr.getElementsByTagName('td')[0].innerText;
                description = tr.getElementsByTagName('td')[1].innerText;
                price = tr.getElementsByTagName('td')[2].innerText;
                image = tr.getElementsByTagName('td')[3].src;
                console.log("image = " + image);
                titleEdit.value = title;
                descEdit.value = description;
                priceEdit.value = price;
            
                snoEdit.value = e.target.id;
                console.log(snoEdit);
                var myModal = new bootstrap.Modal(document.getElementById('editModal'), {
                    keyboard: false
                })
                myModal.toggle();




            })

        })

        //for delete
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("delete", );
                sno = e.target.id.substr(1, );

                console.log(sno);
                console.log(e.target);

                if (confirm("Are your sure?")) {
                    console.log('yes'); 
                    window.location = `/carRentalProject/admin/status.php?delete=${sno}`;
                } else {
                    console.log('No');
                }


            })

        })
    </script>
 


<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>




<script>
        // Include dataTable with the help of js

        $(document).ready( function () {
                        $('#myTable').DataTable();
                    } );

</script>
<?php
 if(isset($_SESSION['status']) && $_SESSION['status']!=''){

 ?>
 <script>
 swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
</script>
 
<?php 
unset($_SESSION['status']);
 }
?>


    </body>
</html>