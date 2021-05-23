


<?php 
include 'sources.php';
include 'select.php'; 
?>
<script>
var sum=m=0;
</script>
<?php 
$id=$name=$rate=$qty=$amount="";
function autofill($prdtid,$prdtname,$prdtrate,$prdtqty,$prdtamount){ 
    $GLOBALS['id']=$prdtid; 
    $GLOBALS['name']=$prdtname;
    $GLOBALS['rate']=$prdtrate;
    $GLOBALS['qty']=$prdtqty;
    $GLOBALS['amount']=$prdtamount; 
    ?>

    <td class="sn">  
        <?php 
            echo $q=$GLOBALS['id'];
        ?> 
    </td>

    <td> 
        <select data-placeholder="Select Product_ID" id="<?php echo $GLOBALS['id']; ?>" style="width:100%" onchange="productid(this.value,this.id)"> 
        <option>----select----</option>
            <?php 
                select('Product_ID','product_detials');
            ?>
        </select> 
    </td>


    <td>
        <span class="" id="<?php echo $GLOBALS['name']; ?>" data-placeholder="Select a Product" style="width:100%" >
        </span>  
 
    </td>


    <td>  
        <span id="<?php echo $GLOBALS['rate']; ?>" style="width:100%">
            </span>     
 
    </td>


    <td style="width:200px">  
        <input type="text" id="<?php echo $GLOBALS['qty']; ?>" style="width:90%; height:90%" oninput="quantity(this.id)">   
      
    </td>

    <td id="<?php echo $GLOBALS['amount']; ?>"> </td>

    
<?php
}
?>
