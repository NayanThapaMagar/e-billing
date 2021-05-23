<?php 

include 'connectToCostumer.php';
$val = $_GET['costId'];
 $sql = "SELECT Costumer_Name, Costumer_ID, Costumer_Address FROM costumer_detials WHERE Contact_Number='$val'";
 $result = $conn->query($sql);
 if ($result==TRUE){
     if( $result->num_rows>0) {
         while($row = $result->fetch_assoc()){
            echo $cId=$row["Costumer_ID"];
         }
     }
     
 }
 $conn->close();
?>