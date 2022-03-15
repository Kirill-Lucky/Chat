<?php

include "config/db.php";
  		

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "hat.php"
	?>
	<div id="content">
		<form method="POST" id="form">
		<p>
			Введите вашу почту:<br/>
			<input type="text" name="mail">
		</p>
		<p>
			Введите ваш пароль:<br/>
			<input type="password" name="pass-word">
		</p>
		<p>
			<button type="submit">Войти</button>
		</p>
		<p>
			<h2><a href="registr.php">Зарегестрироваться</a></h2>
		</p>
	</form>
	<?php
	if(isset($_POST["mail"]) && isset($_POST["pass-word"]) && $_POST["mail"]!="" && $_POST["pass-word"]!=""){
			// Запрос для сравнения введеных данных, с данными из базы данных
			
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