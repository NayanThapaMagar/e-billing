<?php
$uname = $psw = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$uname=test_input($_POST["uname"]);
$psw=test_input($_POST["psw"]);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if($_POST["uname"]=="Nayan" && $_POST["psw"]=="bina" ) {
      header('location:http://127.0.0.1/frontend/ledger/ledger.html');
      }else{
      echo "Wrong username or password!";
  }
?>
