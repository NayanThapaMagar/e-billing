
 
<?php include 'select.php'; ?>


    <td class="sn">  
      1
    </td>

    <td> 
    
         
        <select data-placeholder="Select Product_ID" id="pid" style="width:100%" onchange="productid(this.value)"> 
            <option>---select---</option>
            <?php 
                select('Product_ID');
            ?>
        </select> 

        <script>
            function productid(data) {
                if (data==""){
                    document.getElementById(id).innerHTML="";
                    return;                               
                }
                const ajaxreq0 = new XMLHttpRequest();
                ajaxreq0.open('GET','http://127.0.0.1/frontend/bill/prdtid.php?prdtid='+data,'TRUE');
                ajaxreq0.send();  

                ajaxreq0.onreadystatechange = function () {
                    if (ajaxreq0.readyState == 4 && ajaxreq0.status == 200) {
                        document.getElementById('pname').innerHTML = ajaxreq0.responseText;
                    }                                                                          
                } 

                const ajaxreq1 = new XMLHttpRequest();
                ajaxreq1.open('GET','http://127.0.0.1/frontend/bill/prdtid0.php?prdtid0='+data,'TRUE');
                ajaxreq1.send();  

                ajaxreq1.onreadystatechange = function () {
                    if (ajaxreq1.readyState == 4 && ajaxreq1.status == 200) {
                        document.getElementById('rate').innerHTML = ajaxreq1.responseText;
                    }                                                                          
                }                                     
            }
             
            $(document).ready(
                function () {
                    $('#pid').select2();
                }
            );
        </script>
    </td>


    <td>
        <select class="" id="pname" data-placeholder="Select a Product" style="width:100%">
        </select>  
        <script>
            $(document).ready(
                function () {
                    $('#pname').select2();
             
                }
            );
        </script> 
    </td>


    <td>  
        <select id="rate" style="width:100%">
            </select>     
        <script>
            $(document).ready(
                function () {
                    $('#rate').select2();
                }
            );
        </script> 
    </td>


    <td style="width:200px">  
        <input type="text" id="qty" style="width:90%; margin-left:1px; height:90%;" oninput="quantity()">   
        <script>
            function quantity() {
                const x = parseFloat(document.getElementById('qty').value);
                const y = parseFloat(document.getElementById('rate').value);
                const z = x * y;
                document.getElementById('amount').innerHTML = z;   
            }    
        </script>   
    </td>

    <td>  
        <select style="width:100%; height:100%;" >
            <option id="amount"></option>
            </select>
    </td>


 
    

