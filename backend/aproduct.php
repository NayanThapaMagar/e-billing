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
    
    
$sql = "SELECT Product_Name, Product_ID, Rate FROM product_detials";
$result = $conn->query($sql);
$count=0;

if( $result->num_rows>0 && $_POST["product_id"]!="" ) {
    while($row = $result->fetch_assoc()) {
        if ($_POST["product_id"] == $row["Product_ID"]) {
            $count++;
        }   
    }
    if ($count>0) {
        echo "Product with Product_ID: ". $_POST["product_id"] . " already exist in the inventory <br> Please enter unique Product_ID!!!";
    }
    elseif ($count==0) {
        if ($_POST["pname"]=="") {
            echo "<br>Please enter Product_Name<br>";
        }
        elseif ($_POST["rate"]=="") {
            echo "<br>Please enter Rate<br>";
        }
        elseif ($_POST["pname"] != "" && $_POST["rate"] != "") {
            //preparing statements to bound parameters
            $stmt = $conn->prepare("INSERT INTO product_detials (Product_Name, Product_ID, Rate)
            VALUES(?,?,?)");
            $stmt->bind_param("ssi", $p_name, $p_id, $Rate);
            $p_name= $_POST["pname"];
            $p_id= $_POST["product_id"];
            $Rate= $_POST["rate"];
            $stmt->execute();
            $stmt->close();
            header('location:http://127.0.0.1/frontend/product/product.php');
        }
    }
}    
elseif ($_POST["product_id"] == "") {
    echo "<br>Please enter Product_ID <br>";
} 

$conn->close();
?>
