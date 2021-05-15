

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<?php include 'connecttoproduct.php'; ?>  
<?php include 'select.php'; ?>

<?php 
$id=$name=$rate=$qty=$amount="";
function autofill($prdtid,$prdtname,$prdtrate,$prdtqty,$prdtamount){ 
    $GLOBALS['id']=$prdtid; 
    $GLOBALS['name']=$prdtname;
    $GLOBALS['rate']=$prdtrate;
    $GLOBALS['qty']=$prdtqty;
    $GLOBALS['amount']=$prdtamount; 
    ?>

    <td> 
    
         
        <select data-placeholder="Select Product_ID" id="<?php echo $GLOBALS['id']; ?>" style="width:100%" onchange="productid(this.value,this.id)"> 
            <?php 
                select('Product_ID');
            ?>
        </select> 

        <script>
            function productid(data,id) {
                if (data==""){
                    document.getElementById(id).innerHTML="";
                    return;                               
                }
                const ajaxreq0 = new XMLHttpRequest();
                ajaxreq0.open('GET','http://127.0.0.1/frontend/bill/prdtid.php?prdtid='+data,'TRUE');
                ajaxreq0.send();  

                ajaxreq0.onreadystatechange = function () {
                    if (ajaxreq0.readyState == 4 && ajaxreq0.status == 200) {
                        document.getElementById(`name${id}`).innerHTML = ajaxreq0.responseText;
                    }                                                                          
                } 

                const ajaxreq1 = new XMLHttpRequest();
                ajaxreq1.open('GET','http://127.0.0.1/frontend/bill/prdtid0.php?prdtid0='+data,'TRUE');
                ajaxreq1.send();  

                ajaxreq1.onreadystatechange = function () {
                    if (ajaxreq1.readyState == 4 && ajaxreq1.status == 200) {
                        document.getElementById(`rate${id}`).innerHTML = ajaxreq1.responseText;
                    }                                                                          
                }                                     
            }
             
                                $(document).ready(
                                    function () {
                                        $('#<?php echo $GLOBALS['id']; ?>').select2();
                                    }
                                );
        </script>
    </td>

    <br><br>

    <td>
        <select class="" id="<?php echo $GLOBALS['name']; ?>" data-placeholder="Select a Product" style="width:100%" onchange="product(this.value)">
        </select>  
        <script>
            $(document).ready(
                function () {
                    $('#<?php echo $GLOBALS['name']; ?>').select2();
                }
            );
        </script> 
    </td>


    <td>  
    <select id="<?php echo $GLOBALS['rate']; ?>" style="width:100%">
        </select>     
    <script>
        $(document).ready(
            function () {
                $('#<?php echo $GLOBALS['rate']; ?>').select2();
            }
        );
    </script> 
</td>


<td style="width:200px">  
    <input type="text" id="<?php echo $GLOBALS['qty']; ?>" style="width:100%" oninput="quantity(this.id)">   
    <script>
        function quantity(param) {
            const id = param.split("-")[1];
            const x = parseFloat(document.getElementById(`qty-${id}`).value);
            const y = parseFloat(document.getElementById(`rate${id}`).value);
            const z = x * y;
        document.getElementById(`amount${id}`).innerHTML = z;
        }
    </script>
</td>

<td id="<?php echo $GLOBALS['amount']; ?>" style="width:150px">  </td>


<?php
}
?>
