<?php



include "config/db.php";

if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"]!="" && $_POST["password"]!="" && $_POST["name"]!="" && $_POST["phone"]!="")
{
	$sql = "INSERT INTO user (name, phone, email, password) VALUES ( '". $_POST["name"] ."', '". $_POST["phone"] ."', '". $_POST["email"] ."', '" . $_POST["password"] ."')";
	if(mysqli_query($connect, $sql)){
		header("Location: login.php");
	}
	else{
		echo "<h2>An error has occurred</h2>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "hat.php"
	?>

	<div id="content">
		<form method="POST" id="form">
		<p>
			Print your name:<br/>
			<input type="text" name="name">
		</p>
		<p>
			Print your phone number:<br/>
			<input type="text" name="phone">
		</p>
		<p>
			Print your e-mail address:<br/>
			<input type="text" name="email">
		</p>
		<p>
			Print new password:<br/>
			<input type="password" name="password">
		</p>
		<p>
			<button type="submit">Register</button>
		</p>
	</form>
	

	</div>
	
</body>
</html>
