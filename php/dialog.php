
<div id="dialog">
	<div id="message-list">
		<ul>
		<!-- Displaying a request to display messages of a user who is authorized -->
		<?php
		if(isset($_GET["user"])){
			$sql = "SELECT * FROM messages" . 
					" WHERE (id_user_to = " . $_GET["user"] ." AND id_user_from = " . $_COOKIE["id"] . ") 
						OR (id_user_to = " . $_COOKIE["id"] ." AND id_user_from=" . $_GET["user"] . ")";
			//create query result variable (array)
			$result = mysqli_query($connect, $sql);
			
			$count_message = mysqli_num_rows($result);
			$i = 0;
			// Iterating over messages that match a query for display
			while ($i < $count_message) {
				//take the query result and turn it into an array to use
				$all_message = mysqli_fetch_assoc($result);
					echo "<li>";
						// Query to display avatar and name from user table by comparing id
						$sql1 = "SELECT * FROM user WHERE id ='" . $all_message["id_user_from"] . "'";
						//if I remember correctly this is the connection of the base and the query to execute
						$result1 = mysqli_query($connect, $sql1);
						$users = mysqli_fetch_assoc($result1);
						echo "<div class=\"avatar\">
							<img src=" . $users["avatar"] . ">
							</div>";
						echo "<h2>" . $users["name"] . "</h2>";
						echo "<p>" . $all_message["text"] . "</p>";
						echo "<div class=\"time\">" . $all_message["time"] . "</div>";

					echo "</li>";							

					$i = $i + 1;
			}
		}
		else{
			echo "<h2>Выбирите пользователя</h2>";
		}
	
		?> 
		</ul>
		<?php
		// Adding messages to the database, as well as user IDs, for their subsequent display
		if(isset($_POST["text"]) && $_POST["text"]!=""){
			$sql = "INSERT INTO messages (text, id_user_to, id_user_from) VALUES ('". $_POST["text"] ."', '" . $_POST["id_user_to"] ."', '" . $_COOKIE["id"] . "')";
			if(mysqli_query($connect, $sql)){
				
			}
			else{
				echo "<h2>Произошла ошибка</h2>";
			}
		}
		?>
	</div>

	<?php 
	// Condition so that when the page is displayed, when the user is not selected, it does not give an error
	// And also so that when sending a message, the user stays on the chat page
	if (isset($_GET["user"])) {
		?>
		<form id="message-form" action='index.php?user=<?php echo $_GET["user"] ?>' method="POST">
			<input type="hidden" name="id_user_to" value=<?php echo $_GET["user"] ?>>
			<input type="hidden" name="id_user_from" value=<?php echo $_COOKIE["id"] ?>>
			<textarea name="text"></textarea>
			<button type="submit"><img src="img/send.png"></button>
		</form>
	<?php 
	} else {
		?>
		<form id="message-form" action='index.php' method="POST">
			<input type="hidden" name="id_user_to" value="1" ?>
			<input type="hidden" name="id_user_from" value="2" ?>
			<textarea name="text"></textarea>
			<button type="submit"><img src="img/send.png"></button>
		</form>
		<?php
	} 
	?>
	
</div>
