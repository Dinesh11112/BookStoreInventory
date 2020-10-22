<?php 

	require('mysqli_connect.php');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['name'];
            $password = $_POST['pass'];
            $statement = mysqli_prepare($dbc, "Select * from authentication WHERE username = ? and password=?");
            mysqli_stmt_bind_param($statement, 'ss', $username, $password);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            if(mysqli_stmt_num_rows($statement)==1){           
                    header("Location: http://localhost/project1/bookstore.php");
            }
            else{
                echo "Please try again!";
            }
		}

?>
<html>

<body>
    <form action="main.php" method="POST">

        <input type="text" name="name" placeholder="name">
        <input type="text" name="pass" placeholder="password">
        <input type="submit" value="submit">

    </form>
</body>

</html>