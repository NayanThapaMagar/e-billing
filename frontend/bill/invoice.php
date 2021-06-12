<?php
// $invoice = json_decode($_POST['invoice'], TRUE);
// foreach ($invoice as $invc) {
//     // print_r($invc['customerId']);
//     print_r($invoice);
// }
$emp1 = JSON_decode($_POST['emp1']);
print_r($emp1->name);
?>


<?php 
// include 'connectToInvoice.php';




// $stmt = $conn->prepare("INSERT INTO invoice_detials (Costumer_ID, Costumer_Name, Contact_Number, Costumer_Address)
//  VALUES(?,?,?,?)");
//     $stmt->bind_param("ssss", $cost_id, $cost_name, $cont_number, $cost_address);
//     $cost_id= $_GET["j"];
//     $cost_name= $_GET["i"];
//     $cont_number= $_GET["k"];
//     $cost_address= $_GET["l"];
//     $stmt->execute();
//     $stmt->close();



// $stmt0 = $conn->prepare("INSERT INTO invoice_detialsp (Bill_No, Total, Paid_Amount, Delivered_By, Checked_BY, Spot_Date, Costumer_ID)
// VALUES(?,?,?,?,?,?,?)");
//    $stmt0->bind_param("sssssss", $BillNo, $Total, $PAmount, $Dby, $CBy, $SDate, $cost_id);
//    $cost_id= $_GET["j"];
//    $BillNo=$_GET["m"];
//    $Total=$_GET["total"];
//    $PAmount=$_GET["pAmount"];
//    $Dby=$_GET["d_By"];
//    $CBy=$_GET["c_By"];
//    $SDate=$_GET["p"];
//    $stmt0->execute();
//    $stmt0->close();


// $stmt1 = $conn->prepare("INSERT INTO products_selected (Costumer_ID, Product_ID, Product_Name, Rate, Qty, Bill_No)
// VALUES(?,?,?,?,?,?)");
//     $stmt1->bind_param("ssssss", $cost_id, $prdt_id, $prdt_name, $rate, $qty, $billNo);
//     $cost_id = $_GET["j"];
//     $prdt_id = $_GET["q"];
//     $prdt_name = $_GET["r"];
//     $rate = $_GET["s"];
//     $qty = $_GET["t"];
//     $billNo = $_GET["m"];
//     $stmt1->execute();
    // $stmt1->close();
    // header('location:http://127.0.0.1/frontend/bill/bill.php');




// $conn->close();

?>