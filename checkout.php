
<html>
<head>
<link rel="stylesheet" href="stylesheet.css"/>
<style>
       body{  
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;

}
h1 {
        display: inline-block;
        width: 3em;
        padding: 0.9em 0;
        margin: 0.5em;
        text-align: center;
        }
#wrapper{
    border:1px solid black;
    text-align:center;
}
td{
    border: solid 1px black;
    font-size: large;
}
table{
    text-align:center;
    width:80%;
    margin-left:auto;
    margin-right:auto;
}
 </style>
</head>
<body>
<div id="wrapper">
<h2> Here is the selected book details </h2>
<?php

require('mysqli_connect.php');
session_start();
$itemID = $_GET['varname'];

 $statement = mysqli_prepare($dbc, "Select * from inventory WHERE itemID = ?");
            mysqli_stmt_bind_param($statement, 's', $itemID);
            mysqli_stmt_execute($statement);
            $result = $statement->get_result();

                                 
        echo "<table>"; // start a table tag in the HTML
echo "<tr><td>ItemID</td><td>ItemName</td><td>Item Cost</td><td>Quantity</td></tr>";
while ($row = $result->fetch_array()) {
  echo "<tr><td>".$itemID."</td><td>" . $row['itemname'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td></tr>"; 
    $quantity = $row['quantity'];
    $_SESSION['price'] = $row['price'];
}
echo "</table>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "quantity : ".$_POST['quantity'];
    echo "itemID : ".$itemID;
    $quantity -=$_POST['quantity'];
    echo "quantity after update : ". $quantity;
    $updatestatement = mysqli_prepare($dbc, "UPDATE inventory SET quantity = ? WHERE itemID = ?");
            mysqli_stmt_bind_param($updatestatement, 'ss',$quantity, $itemID);
            mysqli_stmt_execute($updatestatement);
    header("Location: http://localhost/bookstoreinventory/success.php");
}
?>
    <p><h4>How many you wanted to pick for chekcout</h4>
    <form action="#" method="POST">
        <p><input type='text' name='firstname' placeholder='FirstName' required></p>
        <p><input type='text' name='lastname' placeholder='LastName' required></p>
        <p><input type='text' name='quantity' placeholder='quantity' required></p>
        Payment Options:
<input type="radio" name="paymethod"
<?php if (isset($paymethod) && $paymethod=="cred/deb") echo "checked";?>
value="cred/deb">Credit/debit
<input type="radio" name="paymethod"
<?php if (isset($paymethod) && $paymethod=="COD") echo "checked";?>
value="COD">ash on Delivery
<input type="radio" name="paymethod"
<?php if (isset($paymethod) && $paymethod=="gift") echo "checked";?>
value="gift">Giftcards
        <p><input type='submit' value='CheckOut'>

    </form>
    </div>
</body>

</html>
