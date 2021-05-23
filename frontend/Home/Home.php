<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Home.css">
</head>
<body>
        <h1>Add Account</h1><br><br>
        <main class="border">
        <form method="GET" action="http://127.0.0.1/backend/addCostumer.php">
            <label style="margin-left: 80px; margin-top: auto;" for="costumerName">Name:</label>
            <input type="text" id="costumerName" name="costumerName" placeholder="Enter your name" required><br><br>

            <label style="margin-left: 68px;" for="costumerAddress">Address:</label>
            <input type="text" id="costumerAddress" name="costumerAddress" placeholder="Enter address" required><br><br>

            <label style="margin-left:15px;" for="contactNumber">Contact Number:</label>
            <input type="text" id="contactNumber" name="contactNumber" placeholder="Enter contact number" required><br><br>
            
            <label style="margin-left:38px;" for="costumerId">Costumer ID: </label>
            <input type="text" id="costumerId" name="costumerId" placeholder="Enter Costumer Id" required><br><br>

            <input type="submit" style="margin-left: 100px; width: 50px;" value="Add"></input>
            <!-- <form method="POST" action="http://127.0.0.1/frontend/Home/Home.php"> -->
            <input type="submit" value="Chancel" >
            <!-- </form> -->

        </form>
    </main>
</body>
</html>