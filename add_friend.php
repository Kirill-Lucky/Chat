<?php
include "config/db.php";

if(isset($_GET["user_id"])){
	$sql = "INSERT INTO friends (user_1, user_2) VALUES ('" . $_COOKIE["id"] . "', '" . $_GET["user_id"] . "') ";
	if(mysqli_query($connect, $sql)){
		header("Location: /index.php ");
	} else {
		echo "<h2>Этот пользователь уже добавлен</h2>";
	}
}

?>