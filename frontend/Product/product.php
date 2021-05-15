<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style1.css">
    <?php
        $count = 1;
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
    <div class="head">
        <h1 class="heading">PRODUCT<br>PANNEL</h1> 
    </div>
    <div class="search">
        <h2 class="rate">Rate List</h2>
        <div class="searchbox">
            <form method="post">
                <table class=filter>
                    <tr>
                        <th><label for="p_Name">Product Name</label> </th>
                        <th><label for="product_ID">Product ID</label></th>
                        <th rowspan="2" ><input type="submit" class="s" name="submit" value="Search" ></th>
                        <th rowspan="2" >
                            <form method="post" action="http://127.0.0.1/frontend/product/product.php">
                                <input type="submit" class="s" value="Chancel" >
                            </form>
                         </th>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="eg:Hammer" id="p_Name" name="p_Name"></td>
                        <td><input type="text" placeholder="eg:hm3322" id="product_ID" name="product_ID"></td>
                    </tr>
                </table>
            </form>  
        </div>
        <div class="ov">
            <table class="a">
                <tr>
                    <th class="sn">S.N</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Rate</th>
                </tr>
                <?php
                    $p_Name = $product_ID = ""; 
                        if (isset($_POST["submit"])) {
                        if ($_POST["product_ID"] == "") {
                            echo "Please enter Product_ID";
                        }
                        elseif ($_POST["p_Name"] == "") {
                            echo "Please enter Product_Name";
                        }
                        elseif($_POST["product_ID"] != "" && $_POST["p_Name"] != "" ) {
                            $temp1= $_POST["product_ID"];
                            $sql = "SELECT Product_Name, Product_ID, Rate FROM product_detials WHERE Product_ID = '$temp1' ";
                            $result = $conn->query($sql);
                            if ($result==TRUE){
                                if( $result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        if ($row["Product_Name"] != $_POST["p_Name"]) {
                                            echo "Product_ID and Product_Name doesn't match!!!";
                                        }
                                        elseif ($row["Product_Name"] == $_POST["p_Name"]) {
                                            $pname=$row["Product_Name"];
                                            $product_id=$row["Product_ID"];
                                            $rate=$row["Rate"];
                                            ?>
                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $pname;?></td>
                                                <td><?php echo $product_id;?></td>
                                                <td><?php echo $rate;?></td>
                                            </tr>
                                            <?php $count++; ?>
                                            <?php
                                        }
                                    }
                                }
                                else {
                                   echo "There is no such product with Product_ID: ".$temp1."<br>";
                                } 
                            }
                        }
                    }
                    else {                
                        $sql = "SELECT Product_Name, Product_ID, Rate FROM product_detials";
                        $result = $conn->query($sql);
                        if ($result==TRUE){
                            if( $result->num_rows>0) {
                                while($row = $result->fetch_assoc()){
                                    $pname=$row["Product_Name"];
                                    $product_id=$row["Product_ID"];
                                    $rate=$row["Rate"];

                                    ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $pname;?></td>
                                        <td><?php echo $product_id;?></td>
                                        <td><?php echo $rate;?></td>
                                    </tr>
                                    <?php $count++; ?>
                                    <?php
                                }
                            }
                            
                        }
                    }
                ?>
            </table>
        </div>
    </div>
    <form method="post" action="http://127.0.0.1/backend/product.php">
        <div class="addproduct">
            <div class="udp">
                <label class="ts" for="pname">Product Name: </label>
                <input type="text" placeholder="eg:Hammer" id="pname" name="pname">
            </div>
            <div class="udp">
                <label class="ts" for="product_id">Product ID: </label></th>
                <input type="text" placeholder="eg:hm3322" id="product_id" name="product_id">
            </div>
            <div class="udp">
                <label class="ts" for="rate">Rate: </label></th>
                <input type="text" placeholder="eg:xxxxx" id="rate" name="rate"> 
            </div>
            <br><br><br><br>
            <div class="btn">
                <input type="submit" class="s1" value="Add">
            </div>
            <div class="btn">    
                <form method="post" action="http://127.0.0.1/frontend/product/product.php">
                    <input type="submit" class="s1" value="Chancel" >
                </form>
            </div>
        </div>
    </form>
    <form method="post" action="http://127.0.0.1/backend/uproduct.php">
        <div class="uprate">
            <div class="udp">
                <label class="ts" for="pname">Product Name: </label>
                <input type="text" placeholder="eg:Hammer" id="pname" name="pname">
            </div>
            <div class="udp">
                <label class="ts" for="product-id">Product ID: </label></th>
                <input type="text" placeholder="eg:hm3322" id="product_id" name="product_id">
            </div>
            <div class="udp">
                <label class="ts" for="urate">Update Rate: </label></th>
                <input type="text" placeholder="xxxxx" id="urate" name="urate">
            </div>
            <br><br><br><br>
            <div>
            <div class="btn">
                <input type="submit" class="s1" value="Update">
            </div>
            <div class="btn">    
                <form method="post" action="http://127.0.0.1/frontend/product/product.php">
                    <input type="submit" class="s1" value="Chancel" >
                </form>
            </div>
            </div>
        </div>
    </form>
    <div class="uprate">
        <form class="inline" method="post" action="http://127.0.0.1/backend/dproduct.php">
            <div class="udp">
                <label class="ts" for="pname">Product Name: </label>
                <input type="text" placeholder="eg:Hammer" id="pname" name="pname">
            </div>
            <div class="udp">
                <label class="ts" for="product-id">Product ID: </label></th>
                <input type="text" placeholder="eg:hm3322" id="product_id" name="product_id">
            </div>
            <br><br><br><br>
            <div class="btn">
                <input type="submit" class="s1" value="Delete">
            </div>
        </form>
        <form class="inline" method="post" action="http://127.0.0.1/frontend/product/product.php">
            <div class="btn">    
                <input type="submit" class="s1" value="Chancel" >
            </div>
        </form>
    </div>

    <?php $conn->close();?>
</body>