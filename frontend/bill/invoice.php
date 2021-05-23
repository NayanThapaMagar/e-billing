<?php 
include 'connectToInvoice.php';



$stmt = $conn->prepare("INSERT INTO `invoice_detials` (`Costumer_ID`, `Costumer_Name`, `Contact_Number`, `Costumer_Address`, `Bill_No`, `Total`, `Grand_Total`, `Paid_Amount`, `Deu_Amount`, `Delivered_By`, `Checked_BY`, `Spot_Date`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssss", $cost_name, $cost_id, $cont_number, $cost_address, $BillNo, $Total, $GTotal, $PAmount, $DAmount, $Dby, $CBy, $SDate);
    $cost_name= $_GET["i"];
    $cost_id= $_GET["j"];
    $cont_number= $_GET["k"]; 
    $cost_address= $_GET["l"];
    $Dby = $_GET["d_By"];
    $BillNo=$_GET["m"];
    $Total=$_GET["o"];
    $GTotal=$_GET["n"];
    $PAmount=$_GET["p"];
    $SDate=$_GET["r"];
    $CBy=$_GET["c_By"];
    $DAmount=$_GET["q"]
    $stmt->execute();
    $stmt->close();
    header('location:http://127.0.0.1/frontend/bill/bill.php');

$conn->close();

?>