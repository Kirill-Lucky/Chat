<?php



include "config/db.php";

if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"]!="" && $_POST["password"]!="" && $_POST["name"]!="" && $_POST["phone"]!="")
{
	$sql = "INSERT INTO user (name, phone, email, password) VALUES ( '". $_POST["name"] ."', '". $_POST["phone"] ."', '". $_POST["email"] ."', '" . $_POST["password"] ."')";
	if(mysqli_query($connect, $sql)){
		header("Location: login.php");
	}
	else{
		echo "<h2>Произошла ошибка</h2>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "hat.php"
	?>

	<div id="content">
		<form method="POST" id="form">
		<p>
			Введите ваше имя:<br/>
			<input type="text" name="name">
		</p>
		<p>
			Введите ваш номер телефона:<br/>
			<input type="text" name="phone">
		</p>
		<p>
			Введите вашу почту:<br/>
			<input type="text" name="email">
		</p>
		<p>
			Введите ваш пароль:<br/>
			<input type="password" name="password">
		</p>
		<p>
			<button type="submit">Зарегистрироваться</button>
		</p>
	</form>
	<!-- Функция для авторизации, сравнение введенных даных с данными из базы данных -->

	</div>
	
</body>
</html>