<?php

include "config/db.php";
  		

?>

<!DOCTYPE html>
<html>
<head>
	<title>Authorization</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "hat.php"
	?>
	<div id="content">
		<form method="POST" id="form">
		<p>
			Enter your email:<br/>
			<input type="text" name="mail">
		</p>
		<p>
			Enter your password:<br/>
			<input type="password" name="pass-word">
		</p>
		<p>
			<button type="submit">Log in</button>
		</p>
		<p>
			<h2><a href="registr.php">Register</a></h2>
		</p>
	</form>
	<?php
	if(isset($_POST["mail"]) && isset($_POST["pass-word"]) && $_POST["mail"]!="" && $_POST["pass-word"]!=""){
			// Query to compare the entered data with the data from the database
			
			$sql = "SELECT * FROM user WHERE email LIKE '" . $_POST["mail"] . "' AND password LIKE '" . $_POST["pass-word"] . "'";
			$result = mysqli_query($connect, $sql);
			$count_users = mysqli_num_rows($result);
			
			if($count_users == 1){
				$all_user = mysqli_fetch_assoc($result);
				setcookie("id", $all_user["id"], time() + 60*60*30);
				header("Location: index.php");
			}
			else{
  			echo "Не получилось";
  			}
 	}
	?>
	
	</div>
	
</body>
</html>
