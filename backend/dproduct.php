<?php
$pname = $product_id =  "";
$a=1;
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

//selecting required data
$sql = "SELECT Product_Name, Product_ID, Rate FROM product_detials";
$result = $conn->query($sql);
$count=0;


if ($result->num_rows > 0 && $_POST["product_id"] != "" ) {
    while($row = $result->fetch_assoc()) {
        if ($_POST["product_id"] == $row["Product_ID"]) {
            if ($_POST["pname"]=="") {
                echo "<br>Please enter Product_Name<br>";
            }
            elseif ($row["Product_Name"]!=$_POST["pname"]) {
                echo "<br>The Product_ID and Product_Name doesn't match!!!<br>";
            }
            elseif ($row["Product_Name"]==$_POST["pname"]) {
                $temp1=$_POST["product_id"];
                $sql1 = " DELETE FROM product_detials WHERE Product_ID = '$temp1' ";
                $rslt1 = $conn->query($sql1);
                header('location:http://127.0.0.1/frontend/product/product.php'); 
            }
            $count++;
        }            
    }
    if($count==0) {
        echo "<br>There is no such product with Product_ID: ".$_POST["product_id"]."<br>";
    }
} 
elseif ($_POST["product_id"] == "") {
    echo "<br>Please enter Product_ID <br>";
}      
            
            
$conn->close();
?>
