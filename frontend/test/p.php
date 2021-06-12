
<?php
//connecting to Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "costumer";

//create a connection
 $conn = new mysqli($servername,$username,$password, $dbname);

//Die if connection was not successful
if($conn->connect_error)
{
    die("Sorry we failed to connect: ". $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO abc (Name, Password)
VALUES(?,?)");
$stmt->bind_param("ss", $cost_name, $cost_id);
$cost_name= $_GET["uname"];
$cost_id= $_GET["psw"];
$stmt->execute();
$stmt->close();
header('location:http://127.0.0.1:5500/test/cv.html');
?>
