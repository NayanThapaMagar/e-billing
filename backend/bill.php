<?php
$pname = $product_id = $rate = "";
//connecting to Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

//create a connection
$conn = new mysqli($servername,$username,$password, $dbname);

//Die if connection was not successful
if($conn->connect_error){
    die("Sorry we failed to connect: ". $conn->connect_error);
}

$conn->close(); ?>