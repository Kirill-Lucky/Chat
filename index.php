<?php
include "config/db.php";
include "config/setting.php";

if($id == null){
 	header("Location: /login.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Веб-чат</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "hat.php"
	?>

	<div id="content">

		
		
		<?php
		include "php/users.php"
		?>

		<?php
		include "php/dialog.php"
		?>

		<?php
		include "php/contact_window.php"
		?>




	<script src="script.js"></script>
</body>
</html>