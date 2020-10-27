
<html>
<head>
<style>
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
body{  
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;

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
<?php

require('mysqli_connect.php');
session_start();


$query = "SELECT * FROM inventory"; //You don't need a ; like you do in SQL
$result = mysqli_query($dbc,$query);
echo "<h2> Welcome to the inventory ". $_SESSION['name']. "</h2>";
echo "<div id='wrapper'><table>"; // start a table tag in the HTML
echo "<tr><th>ItemName</th><th>Item Cost</th><th>Quantity</th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    $itemID = $row['itemID'];
echo "<tr><td><a href=checkout.php?varname=".$itemID.">" . $row['itemname'] . "</a></td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td></tr>";  //$row['index'] the index here is a field name
}
echo "</table></div>";

?>
</div>
</body>
</html>