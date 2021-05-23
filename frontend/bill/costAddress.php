<?php 

include 'connectToCostumer.php';
$val = $_GET['costAddress'];
 $sql = "SELECT Costumer_Address FROM costumer_detials WHERE Contact_Number='$val'";
 $result = $conn->query($sql);
 if ($result==TRUE){
     if( $result->num_rows>0) {
         while($row = $result->fetch_assoc()){
            echo $cAddress=$row["Costumer_Address"];
         }
     }
     
 }
 $conn->close();
?>