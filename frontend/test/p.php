
<?php
include 'connecttoproduct.php';
?>
<select data-placeholder="Select Product_ID" id="prdtid" style="width:100%" onchange="productid(this.value)">
<?php
include 't.php';
$m="Product_ID";
select($m);
?>
</select>

