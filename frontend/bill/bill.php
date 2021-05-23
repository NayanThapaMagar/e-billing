<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="style.css">
    <?php 
    include 'connecttoproduct.php'; 
    include 'calculate.php';
    include 'sources.php'; 
    $j=1;
    ?>  
</head>
<body>
    <h1>COMPANY NAME : E-HARDWARE</h1>

    <main class="border">

        <form class="input" >
            <div class="margin">
            <label for="customer id">Customer Id:</label>
                <input type="text" placeholder="Enter customer Id" id="customer id" oninput="CId()">

                <label style="margin-left:33px;" for="contact">Contact no:</label>
                <input type="tel" id="contact" placeholder="Enter Contact no" oninput="CNo()">
                <br>
            </div>
                
            <div class="margin">
            <label style="margin-left:40px" for="name">Name:</label>
                <!-- <input type="text" placeholder="Enter your name" minlength="6" maxlength="20" id="name" > -->

                <label style="margin-left:46px;" for="address">Address:</label>
                <!-- <input type="text" placeholder="Enter address" id="address"> -->
                <br>
            </div>

            <div >
                <label style="margin-left:50px" for="date">Date:</label>
                <!-- <input type="date" placeholder="Enter date" id="date"> -->
                <span><?php echo date("Y-m-d") ?></span>

                <label style="margin-left:80px" for="day">Bill No:</label>
                <!-- <input type="text" placeholder="Enter day"  id="day"> -->
            </div>
        </form>
    
        <div style="margin-top:40px;">
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
                    <form method="GET" action="http://127.0.0.1/frontend/bill/addtodatabase.php">
                        <?php 

                            autofill($j,sprintf("name%s",$j),sprintf("rate%s",$j),sprintf("qty-%s",$j),sprintf("amount%s",$j));
                            
                          
                        ?>           
                          
                    </form>

                </tr>               
            </table>
            <br>
            <button onclick="addField()">Add</button>
        </div>


        <br>
        <div class="bold"> 
 
            <span style="margin-left: 380px; " id="total">Total: </span><br>
            <br>
            
            <span style="margin-left: 380px; " id="vat"> VAT: 13% </span><br>
            <br>
            <span style="margin-left:349px;" id="discount"> Discount: 5% </span><br>
            <br>
            <span style="margin-left: 4px;">Delivery By: <input type="text"></span> 
            <span style="margin-left:72px;" id="gTotal">Grand Total: </span>

            <br>
            <br>

            <span style="margin-left: 2px;">Checked By: <input type="text"></span>
            <span style="margin-left:69px; ">Paid amount: <input type="text" id="pAmount" oninput="PAmount()"></span> <br><br>
            
            <span> Received By: <input type="text" > </span>
            <span style="margin-left:73px;" id="dAmount">Due amount: </span><br><br>
        </div>

        
        <div class="bold">
            <span style="line-height: 80px;">Authorized Signature: </span>     <span style="margin-left: 70px;">Remarks: <input type="text"></span> <hr color="black" width="150px">  

        </div>
        <br>
        <br>
        <input type="Submit" value="Print"></input>
    </main>
    <script src="./script.js" defer></script>
</body>
</html>