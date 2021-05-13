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

        //connecting to Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "products";

        //create a connection
        $conn = new mysqli($servername,$username,$password, $dbname);

        //Die if connection was not successful
        if($conn->connect_error)
        {
            die("Sorry we failed to connect: ". $conn->connect_error);
        }
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
    
        <div style="margin-top:60px;">
            <form method="GET">
                <table class="fit" style="background-color: white;">
                    <tr>
                        <th> SN</th>
                        <th style=" width:40%" >Product</th>
                        <th>Product_ID</th>
                        <th>Rate</th>
                        <th>QTY</th>
                        <th>Amount</th>
                    </tr>
                    <tr >
                        <td class="sn">  1. </td>

                        <td> 
                            <select class="" id="prdtname" data-placeholder="Select a Product" style="width:250px; margin-left:10px;" onchange="product(this.value)">
                                <?php
                                    $sql = "SELECT Product_Name FROM product_detials";
                                    $result = $conn->query($sql);
                                    if ($result==TRUE){
                                        if( $result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                                $ptemp=$row["Product_Name"];
                                                ?>
                                                <option value="<?php echo $ptemp;?>"><?php echo $ptemp;?></option>
                                                <?php
                                            }
                                        }
                                    } 
                                ?>
                            </select> 
                            <script>
                                function product(data) {
                                    if (data=="") {
                                        document.getElementById("prdtid").innerHTML="";
                                        return;                               
                                    }
                                    fetch(`http://127.0.0.1/frontend/bill/prdtname.php?prdtname=${data}`)
                                    .then(response => response.json())
                                    .then(data=>console.log(data))
                                    .catch(error=> console.log("ERROR: ", error))
                                    // const ajaxreq = new XMLHttpRequest();
                                    // ajaxreq.open('GET','http://127.0.0.1/frontend/bill/prdtname.php?prdtname='+data,'TRUE');
                                    // ajaxreq.send();  

                                    // ajaxreq.onreadystatechange = function () {
                                    //     if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                                    //         document.getElementById('prdtid').innerHTML = ajaxreq.responseText;
                                    //     }                                                                          
                                    // }  
                                }
                                $(document).ready(
                                    function () {
                                        $('#prdtname').select2();
                                    }
                                );
                            </script>
                        </td>

                        <td>
                            <select data-placeholder="Select Product_ID" id="prdtid" style="width:100px; margin-left:10px;" onchange="productid(this.value)">
                            </select>  
                            <script>
                                function productid(data) {
                                    if (data=="") {
                                        document.getElementById("rate").innerHTML="";
                                        return;                               
                                    }
                                    // fetch(`http://127.0.0.1/frontend/bill/prdtid.php?prdtid=${data}`)
                                    // .then(response => response.json())
                                    // .then(data=>document.getElementById('rate').innerHTML = data.responseText)
                                    // .catch(error=> console.log("ERROR: ", error))
                                    const ajaxreq = new XMLHttpRequest();
                                    ajaxreq.open('GET','http://127.0.0.1/frontend/bill/prdtid.php?prdtid='+data,'TRUE');
                                    ajaxreq.send();  

                                    ajaxreq.onreadystatechange = function () {
                                        if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                                            document.getElementById('rate').innerHTML = ajaxreq.responseText;
                                        }                                                                          
                                    }                                           
                                }
                                $(document).ready(
                                    function () {
                                        $('#prdtid').select2();
                                    }
                                );
                            </script> 
                        </td>

                        
                        <td>  
                            <select id="rate" style="width:50px; margin-left:10px;">
                                </select>     
                            <script>
                                $(document).ready(
                                    function () {
                                        $('#rate').select2();
                                    }
                                );
                            </script> 
                        </td>
                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>

                    <tr >
                        <td class="sn">  2. </td>

                        <td > <input type="text">    </td>



                        <td>  <input type="text">   </td>


                        <td>   <input type="text">   </td>


                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>
                    <tr >
                        <td class="sn">  3. </td>

                        <td > <input type="text">    </td>



                        <td>  <input type="text">   </td>


                        <td>   <input type="text">   </td>


                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>
                    <tr >
                        <td class="sn">  4. </td>

                        <td > <input type="text">    </td>



                        <td>  <input type="text">   </td>


                        <td>   <input type="text">   </td>


                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>
                    <tr >
                        <td class="sn">  5. </td>

                        <td > <input type="text">    </td>



                        <td>  <input type="text">   </td>


                        <td>   <input type="text">   </td>


                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>
                    <tr >
                        <td class="sn">  6. </td>

                        <td > <input type="text">    </td>



                        <td>  <input type="text">   </td>


                        <td>   <input type="text">   </td>


                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>
                    <tr >
                        <td class="sn">  7. </td>

                        <td > <?php
                        echo "Nayan";
                        ?>   </td>



                        <td>  <input type="text">   </td>


                        <td>   <input type="text">   </td>


                        <td>  <input type="text">    </td>
                        <td>  <input type="text">    </td>
                    </tr>
                </table>
            </form>
        </div>
        <br>
        
        <div class="bold"> 
            <span style="margin-left: 375px;"> Total: <input type="text"></span><br>
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