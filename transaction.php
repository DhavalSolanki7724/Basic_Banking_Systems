<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="customerlist.css">
    <link rel="stylesheet" href="transaction.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
</head>
<body class="customers">
    <h1 class="heading"> Transaction Details </h1>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "basic_banking_system";
    
    $from=$_GET['we'];
    
    $conn= mysqli_connect($host,$username,$password,$dbname);

    if(!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }

    echo "<form class='transaction_form' action='transfer.php?from=$from'  method='POST'>";
    ?>
    <!-- <label for="tto">Transfer To:</label> -->
    <input type="text" placeholder="Transfer To" name="tto" id="tto"></br>
    <!-- <label for="amnt">Transfer Amount:</label> -->
    <input type="number" name="amnt" placeholder="Transfer Amount" id="amnt"></br>
    <input type="submit" id="sbmt">
   <?php
    echo "</form>";
    ?>
</body>
</html>
