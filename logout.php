<?php
include "config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log out</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	setcookie("id", "", 0);
	header("Location: login.php");
	?>

</body>
</html>