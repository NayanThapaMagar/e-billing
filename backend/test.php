<?php /*
$uname = $psw = "";
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

$sql = "SELECT Product_Name, Product_ID, Rate FROM product_detials WHERE Product_ID = 'OS33' ";
$result = $conn->query($sql);

if( $result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
       $uname = $row["Product_Name"];
       $psw = $row["Product_ID"];
    }
}
//header('location:http://127.0.0.1:5500/test/test.html'); 
*/ ?>

<html>
<head>
<title>PHP isset() example</title>
</head>
<body>

<form method="post">

Enter value1 :<input type="text" name="str1"><br/>
Enter value2 :<input type="text" name="str2"><br/>
<input type="submit" value="Sum" name="Submit1"><br/><br/>

<?php
if(isset($_POST["Submit1"]))
{
$sum=$_POST["str1"] + $_POST["str2"];
echo "The sum = ". $sum;

}
?>

</form>
</body>
</html>