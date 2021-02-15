
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="transfer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "basic_banking_system");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$from = $_GET['from'];
$to = mysqli_real_escape_string($link, $_REQUEST['tto']);
$amount = mysqli_real_escape_string($link, $_REQUEST['amnt']);
 
// Attempt insert query execution
$sql = "INSERT INTO transactions (TransferFrom_Id, TransferedTo, Amount) VALUES ('$from', '$to', '$amount')";
// $update1 = "UPDATE customers SET current_balance =current_balance-$amount WHERE Customer_Id = $from";
// $update2 = "UPDATE customers SET current_balance =current_balance+$amount WHERE first_name = $to";

$update1 = "UPDATE customers SET current_balance = current_balance+$amount WHERE Name='$to'";
$update2 = "UPDATE customers SET current_balance = current_balance-$amount WHERE Customer_Id=$from";


if(mysqli_query($link, $sql) && mysqli_query($link, $update1) && mysqli_query($link, $update2)){
    echo "<p>Transaction successfull.</p>";
    echo "<button><a href='index.html'>Back to home</a></button>";
} else{
    echo "ERROR: Could not able to execute . " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>    
</body>
</html>