<?php
/* Connecting to the database */
$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'car_rental';


$con= mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_NAME);

/* Check the connection */

if(mysqli_connect_error())
{
    die('Error: Cannot connect'.mysqli_error($con));
}


?>