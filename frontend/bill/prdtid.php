<?php

//connecting to Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

//create a connection
$conn = new mysqli($servername,$username,$password, $dbname);

//Die if connection was not successful
if($conn->connect_error)
{
    die("Sorry we failed to connect: ". $conn->connect_error);
}

$val = $_GET['prdtid'];                   
$sql = "SELECT Rate FROM product_detials WHERE Product_ID ='$val' ";
$result = $conn->query($sql);
if ($result==TRUE){
    if( $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $ptemp=$row["Rate"];
            ?>
            <option value="<?php echo $ptemp;?>"><?php echo $ptemp; ?></option>
            <?php
        }
    }
}

?>