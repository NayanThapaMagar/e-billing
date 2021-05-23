<?php
function select($sel){ ?>
   <?php $sql = sprintf("SELECT %s FROM product_detials",$sel);
    $result = $GLOBALS['conn']->query($sql);
    if ($result==TRUE){
        if( $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $ptemp=$row["$sel"];?>
                <?php
                echo "<option value = \"$ptemp\">$ptemp</option>";
            }
        }
    } 
}
?>