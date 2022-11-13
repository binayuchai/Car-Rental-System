


<?php
require("./config.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Css file -->

    <!-- Css Links -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="fonts-source/css/all.min.css">
</head>
<body>
  

<button
        type="button"
        class="btn btn-primary btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="fas fa-arrow-up"></i>
</button>



<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script>

/* Scroll Up button */
let mybutton = document.getElementById("btn-back-to-top");


window.onscroll = () => {
    scrollFunction();
}

function scrollFunction() {
  console.log(document.body.scrollTop);
  console.log(document.documentElement.scrollTop);
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = 'block';
    } else {
        mybutton.style.display = "none";
    }
}

mybutton.addEventListener('click', backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>