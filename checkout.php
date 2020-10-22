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
          echo "alert('inventory updated successfully')";
    header("Location: http://localhost/project1/bookstore.php");
}
?>
<html>
<body>
    <p><h4>How many you wanted to pick for chekcout</h4>
    <form action="#" method="POST">
        <input type='text' name='quantity' placeholder='quantity'>
        <input type='submit' value='submit'>
    </form>
</body>

</html>