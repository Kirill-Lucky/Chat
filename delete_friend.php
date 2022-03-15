<?php
include "config/db.php";

if(isset($_GET["user_id"])){
	$sql = "DELETE FROM friends WHERE user_1 = " . $_COOKIE["id"] . " AND user_2 = " . $_GET["user_id"] . "";

	if(mysqli_query($connect, $sql)){
		header("Location: /index.php ");
	} else {
		echo "<h2>This user has already been deleted</h2>";
	}
}

?>
