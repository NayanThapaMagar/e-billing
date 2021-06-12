

<span id="nam">1</span>
<a id="a">2</a>
<span id="aaa"></span>
<script>
    document.getElementById('aaa').innerText = "Nayan Magar";
</script>    
<br>

<?php
$test='<script>
const ab=document.getElementById("aaa").innerText;
document.writeln(ab);
</script>';
echo $test;
?>