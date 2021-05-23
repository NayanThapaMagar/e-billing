

<?php
include 'connecttoproduct.php'; 

        
        // if ($d1=="") {
        //     echo "<br>Please enter Product_Name<br>";
        // }
        // elseif ($d1 != "" ) {
            //preparing statements to bound parameters
            $stmt = $conn->prepare("INSERT INTO products_selected (Product_ID,Product_Name,Rate,Qty,Amount)
            VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss",$p_id, $p_name , $Rate , $Qty , $Amount);
            $p_id= $a1;
            $p_name= $a2;
            $Rate= $a3;
            $Qty=$a4;
            $Amount=$a5;
            $stmt->execute();
            $stmt->close();
            // header('location:http://127.0.0.1/frontend/bill/bill.php');
        // }


// $conn->close();
?>
