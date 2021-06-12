<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
    <?php 
    
    include 'calculate.php';
    include 'sources.php'; 
    $j=1;
    ?>  
</head>
<body>
    <h1>COMPANY NAME : E-HARDWARE</h1>
    <script type="text/javascript">
        function prints() {
            // let customerId = document.getElementById('costId').innerText ;
            // // let contactNo = document.getElementById('CNo').value;
            // let customerName = document.getElementById('costName').innerText ;
            // // let customerAddress = document.getElementById('costAddress').innerText ;
            // // let sDate = document.getElementById('sDate').innerText ;
            // // let total = document.getElementById('total').innerText;
            // // let deliveredBy = document.getElementById('d_By').value;
            // // let gTotal = document.getElementById('gTotal').innerText;
            // // let checkedBy = document.getElementById('c_By').value;
            // // let paidAmount = document.getElementById('pAmount').value;
            // // let dueAmount = document.getElementById('dAmount').innerText;
            // var emp1 = {};
            // emp1.id = customerId;
            // emp1.name = customerName;  

            // console.log(emp1);

            // $.ajax({
            // URL:"invoice.php",
            // method: "post",
            // data: { emp1 : JSON.stringify(emp1)},
            // success: function(res){
            //     console.log(res);
            // }
            // })
          
        
        }
    </script>
    <main class="border">

        <form class="input" method="POST" 
        >
        <!-- action="http://127.0.0.1/frontend/bill/invoice.php" -->
            
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
                <span id="costName" name="costName"></span>
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
                    <span id="bNo">
                    <?php
                    // include 'connectToInvoice.php' 
                    // $mysql = "SELECT * FROM invoice_detialsp";
                    // $result = $conn->query($mysql);
                    // echo ($mysql -> affected_rows+1);
                    // $conn->close(); 
                    echo "1";
                    ?>
                    </span>
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
                <label style="margin-left: 380px; " for="total">Total: </label>
                <span  id="total" name="total"></span><br>
                <br>
                
                <span style="margin-left: 380px; " id="vat"> VAT: 13% </span><br>
                <br>
                <span style="margin-left:349px;" id="discount"> Discount: 5% </span><br>
                <br>
                <span style="margin-left: 4px;">Delivery By:   <input type="text" id="d_By" name="d_By" required> </span> 
                <label style="margin-left:72px;" for="gTotal">Grand Total: </label>
                <span  id="gTotal" name="gTotal"></span>

                <br>
                <br>

                <span style="margin-left: 2px;">Checked By:<input type="text" id="c_By" name="c_By" required> </span>
                <span style="margin-left:40px; ">Paid amount: <input type="text" id="pAmount" name="pAmount" oninput="PAmount()" required></span> <br><br>
                
                <span> Received By: <input type="text" > </span>
                <label style="margin-left:40px;" for="dAmount">Due amount: </label>
                <span  id="dAmount" name="dAmount"></span><br><br>
            </div>

        
            <div class="bold">
                <span style="line-height: 80px;">Authorized Signature: </span>     
                <span style="margin-left: 70px;">Remarks: <input type="text"></span> <hr color="black" width="150px">  

            </div>
            <br>
            <br>
           
           
        </form>
        <button onclick="prints()">Save</button>

        
    </main>
    <script src="./script.js" defer></script>
</body>
</html>

        <!-- <script type="text/javascript">
        let invoice = {};
        invoice.customerId = "hello";
        invoice.contactNo = "y";
        invoice.customerName = "p";
        invoice.customerAddress = "e";
        invoice.sDate = "q";
        invoice.total = "w";
        invoice.deliveredBy = "q";
        invoice.gTotal = "d";
        invoice.checkedBy = "s";
        invoice.paidAmount = "a";
        $.ajax({
        URL:"invoice.php",
        method: "POST",
        data: { invoice : JSON.stringify(invoice) },
        success: function(res){
        console.log(res);
        }
        }) -->