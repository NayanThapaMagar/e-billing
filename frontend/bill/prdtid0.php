<?php

//connecting to Database
include 'connecttoproduct.php'; 

$val = $_GET['prdtid0'];                   
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
