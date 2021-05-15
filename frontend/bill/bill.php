<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="style.css">
    <?php 
    include 'connecttoproduct.php'; 
    include 'calculate.php';
    ?>  
</head>
<body>
    <h1>COMPANY NAME : E-HARDWARE</h1>

    <main class="border">

        <form class="input" >
            <div class="margin">
                <label style="margin-left:40px" for="name">Name:</label>
                <input type="text" placeholder="Enter your name" minlength="6" maxlength="20" id="name" >

                <label style="margin-left:33px;" for="contact">Contact no:</label>
                <input type="tel" id="contact" placeholder="Enter Contact no">
                <br>
            </div>
                
            <div class="margin">
                <label for="customer id">Customer Id:</label>
                <input type="text" placeholder="Enter customer Id" id="customer id">

                <label style="margin-left:46px;" for="address">Address:</label>
                <input type="text" placeholder="Enter address" id="address">
                <br>
            </div>

            <div >
                <label style="margin-left:50px" for="date">Date:</label>
                <input type="date" placeholder="Enter date" id="date">

                <label style="margin-left:80px" for="day">Day:</label>
                <input type="text" placeholder="Enter day"  id="day">
            </div>
        </form>
    
        <div style="margin-top:40px;">
            <table class="fit" style="background-color: white;">
                <tr>
                    <th> SN</th>
                    <th>Product_ID</th>
                    <th style=" width:40%" >Product</th>
                    <th>Rate</th>
                    <th>QTY</th>
                    <th>Amount</th>
                </tr>
                
                <?php 
                for ($i=1; $i <8; $i++) { 
                ?>
                    <tr >
                        <form method="GET">
                            <?php 
                            autofill($i,sprintf("name%s",$i),sprintf("rate%s",$i),sprintf("qty-%s",$i),sprintf("amount%s",$i));
                            ?>
                        </form>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <br>
        
        <div class="bold"> 
 
            <span style="margin-left: 375px;"  > Total: 
            <td id="total" ></td>
            <input type="text" >
            </span><br>
            <br>
            
            <span style="margin-left: 380px; "> VAT: <input type="text"></span><br>
            <br>
            <span style="margin-left:349px;"> Discount: <input type="text"></span><br>
            <br>
            <span style="margin-left: 4px;">Delivery By: <input type="text"></span> 
            <span style="margin-left:72px;">Grand Total: <input type="text"></span>

            <br>
            <br>

            <span style="margin-left: 2px;">Checked By: <input type="text"></span>
            <span style="margin-left:69px; ">Paid amount: <input type="text"></span> <br><br>
            
            <span> Received By: <input type="text" > </span>
            <span style="margin-left:73px;">Due amount: <input type="text"></span><br><br>
        </div>

        
        <div class="bold">
            <span style="line-height: 80px;">Authorized Signature: </span>     <span style="margin-left: 70px;">Remarks: <input type="text"></span> <hr color="black" width="150px">  

        </div>
    </main>
</body>
</html>