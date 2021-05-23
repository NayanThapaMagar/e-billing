<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="style.css">
    <?php 
    
    include 'calculate.php';
    include 'sources.php'; 
    $j=1;
    ?>  
</head>
<body>
    <h1>COMPANY NAME : E-HARDWARE</h1>

    <main class="border">

        <form class="input" method="GET" action="">
            <div>
                <div class="margin">
                    <label style="margin-left:33px;" for="CNo">Contact no:</label>
                    
                    <select id="CNo"  onchange="CNumber(this.value)" style="width:130px"> 
                        <option>----select----</option>
                        <?php 
                            include 'connectToCostumer.php';
                            select('Contact_Number','costumer_detials');
                        
                        ?>
                    </select> 
                        
                    
                    <script>

                        $(document).ready(
                            function () {
                                $('#CNo').select2();
                            }
                        );

                    
                    
                        function CNumber(CN) {


                            const ajaxreq0 = new XMLHttpRequest();
                            ajaxreq0.open('GET','http://127.0.0.1/frontend/bill/costId.php?costId='+CN,'TRUE');
                            ajaxreq0.send();  

                            ajaxreq0.onreadystatechange = function () {
                                if (ajaxreq0.readyState == 4 && ajaxreq0.status == 200) {
                                    document.getElementById('costId').innerHTML = ajaxreq0.responseText;
                                }                                                                          
                            } 

                            const ajaxreq1 = new XMLHttpRequest();
                            ajaxreq1.open('GET','http://127.0.0.1/frontend/bill/costName.php?costName='+CN,'TRUE');
                            ajaxreq1.send();  

                            ajaxreq1.onreadystatechange = function () {
                                if (ajaxreq1.readyState == 4 && ajaxreq1.status == 200) {
                                    document.getElementById('costName').innerHTML = ajaxreq1.responseText;
                                }                                                                          
                            } 

                            const ajaxreq2 = new XMLHttpRequest();
                            ajaxreq2.open('GET','http://127.0.0.1/frontend/bill/costAddress.php?costAddress='+CN,'TRUE');
                            ajaxreq2.send();  

                            ajaxreq2.onreadystatechange = function () {
                                if (ajaxreq2.readyState == 4 && ajaxreq2.status == 200) {
                                    document.getElementById('costAddress').innerHTML = ajaxreq2.responseText;
                                }                                                                          
                            } 

                            // const ajaxreq3 = new XMLHttpRequest();
                            // ajaxreq3.open('GET','='+CN,'TRUE');
                            // ajaxreq3.send();  

                            // ajaxreq3.onreadystatechange = function () {
                            //     if (ajaxreq3.readyState == 4 && ajaxreq3.status == 200) {
                            //         document.getElementById('').innerHTML = ajaxreq3.responseText;
                            //     }                                                                          
                            // } 
                

                        }
                    
                    </script> 


                    <label for="customer id">Customer Id:</label>
                    <span id="costId"></span>
                    <!-- <input type="text" placeholder="Enter customer Id" id="customer id" oninput="CId()"> -->
                    <br>
                </div>
                    
                <div class="margin">
                <label style="margin-left:40px" for="name">Name:</label>
                <span id="costName"></span>
                    <!-- <input type="text" placeholder="Enter your name" minlength="6" maxlength="20" id="name" > -->

                    <label style="margin-left:46px;" for="address">Address:</label>
                    <span id="costAddress"></span>
                    <!-- <input type="text" placeholder="Enter address" id="address"> -->
                    <br>
                </div>

                <div >
                    <label style="margin-left:50px" for="sdate">Date:</label>
                    <!-- <input type="date" placeholder="Enter date" id="date"> -->
                    <span id="sDate"><?php echo date("Y-m-d") ?></span>

                    <label style="margin-left:80px" for="bNo">Bill No:</label>
                    <span id="bNo">1</span>
                    <!-- <input type="text" placeholder="Enter day"  id="day"> -->
                </div>
                <?php $conn->close();?>
            </div>    
        
    
            <div style="margin-top:75px;">
                <table class="fit" style="background-color: white;">
                    <tr>
                        <th>SN</th>
                        <th>Product_ID</th>
                        <th style=" width:40%" >Product</th>
                        <th>Rate</th>
                        <th>QTY</th>
                        <th>Amount</th>
                    </tr>
                    <tr >
                        <form method="GET">
                            <?php 
                                include 'connecttoproduct.php'; 
                                autofill($j,sprintf("name%s",$j),sprintf("rate%s",$j),sprintf("qty-%s",$j),sprintf("amount%s",$j));
                                
                            
                            ?>           
                            
                        </form>

                    </tr>               
                </table>
                <br>
                <button onclick="addField()">Add</button>
                <?php $conn->close();?>
            </div>


            <br>
            <div class="bold"> 
    
                <span style="margin-left: 380px; " id="total">Total: </span><br>
                
                $conn->prepare("INSERT INTO `invoice_detials` (`Total`) VALUES("<?php echo $Total ?>");
                
                <br>
                
                <span style="margin-left: 380px; " id="vat"> VAT: 13% </span><br>
                <br>
                <span style="margin-left:349px;" id="discount"> Discount: 5% </span><br>
                <br>
                <span style="margin-left: 4px;">Delivery By: </span> 
                <span style="margin-left:72px;" id="gTotal">Grand Total: </span>

                <br>
                <br>

                <span style="margin-left: 2px;">Checked By: </span>
                <span style="margin-left:40px; ">Paid amount: <input type="text" id="pAmount" oninput="PAmount()"></span> <br><br>
                
                <span> Received By: <input type="text" > </span>
                <span style="margin-left:40px;" id="dAmount">Due amount: </span><br><br>
            </div>

        
            <div class="bold">
                <span style="line-height: 80px;">Authorized Signature: </span>     
                <!-- <span style="margin-left: 70px;">Remarks: <input type="text"></span> <hr color="black" width="150px">   -->

            </div>
            <br>
            <br>

            </form>
            <form method="GET" action="invoice.php">
            <input type="text" id="d_By" required>
            <input type="text" id="c_By" required>
            <input type="text" id="i" required>
            <input type="text" id="j" required>
            <input type="text" id="k" required>
            <input type="text" id="l" required>
            <input type="text" id="m" required>
            <input type="text" id="n" required>
            <input type="text" id="o" required>
            <input type="text" id="p" required>
            <input type="text" id="q" required>
            <input type="text" id="r" required>
            <input type="Submit" value=" Print ">
            </form>
    </main>
    <script src="./script.js" defer></script>
</body>
</html>
