<?php
function select($sel,$table){
    $sql = sprintf("SELECT %s FROM %s",$sel,$table);
    $result = $GLOBALS['conn']->query($sql);
    if ($result==TRUE){
        if( $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $ptemp=$row["$sel"];
                echo "<option value = \"$ptemp\">$ptemp</option>";
            }
        }
    } 
}
?>

