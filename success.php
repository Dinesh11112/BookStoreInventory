
<html>
<head>
<link rel="stylesheet" href="stylesheet.css"/>
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
td{
    border: solid 1px black;
    font-size: large;
}
body{  
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;

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
    <h2>Your order has been placed thank you.</h2>
    <form action="bookstore.php" request="post">
        <input type=submit value=GoToHome>
    </form>
 </div>
</body>

</html>
