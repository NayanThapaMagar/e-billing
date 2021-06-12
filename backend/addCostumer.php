<?php include 'connectToCostumer.php';

$mysql = "SELECT Costumer_Name, Costumer_ID, Contact_Number, Costumer_Address FROM costumer_detials";
$result = $conn->query($mysql);
$count=0;

if (is_integer($_GET["contactNumber"])==1) {
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            if ($_GET["costumerId"] == $row["Costumer_ID"]) {
                $count++;
                echo "Costumer with Costumer_ID: ". $_GET["costumerId"] . " already exist in the inventory <br> Please enter unique Costumer_ID!!!";
            }     
            elseif ($_GET["contactNumber"] == $row["Contact_Number"]) {
                echo "Costumer with Contact_Number: ". $_GET["contactNumber"] . " already exist in the inventory <br> Please enter unique Contact_Number!!!";
                $count++;
            }
        }
        if ($count==0) {
                //preparing statements to bound parameters
            $stmt = $conn->prepare("INSERT INTO costumer_detials (Costumer_Name, Costumer_ID, Contact_Number, Costumer_Address)
            VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $cost_name, $cost_id, $cont_number, $cost_address);
            $cost_name= $_GET["costumerName"];
            $cost_id= $_GET["costumerId"];
            $cont_number= $_GET["contactNumber"]; 
            $cost_address= $_GET["costumerAddress"];
            $stmt->execute();
            $stmt->close();
            header('location:http://127.0.0.1/frontend/Home/Home.php');
        }
    }
}   
elseif (is_integer($_GET["contactNumber"])!=1) {
    echo "Please go back and enter Correct contact number";
} 
$conn->close();
?>
