<?php

require('mysqli_connect.php');
session_start();


$query = "SELECT * FROM inventory"; //You don't need a ; like you do in SQL
$result = mysqli_query($dbc,$query);
echo "<h2> Welcome to the inventory ". $_SESSION['name']. "</h2>";
echo "<table>"; // start a table tag in the HTML
echo "<tr><td>ItemName</td><td>Item Cost</td><td>Quantity</td></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    $itemID = $row['itemID'];
echo "<tr><td><a href=checkout.php?varname=".$itemID.">" . $row['itemname'] . "</a></td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td></tr>";  //$row['index'] the index here is a field name
}
echo "</table>";

?>
