
<div id="dialog">
	<div id="message-list">
		<ul>
		<!-- Вывод запроса на демонстрацию сообщений пользователя, который авторизован -->
		<?php
		if(isset($_GET["user"])){
			$sql = "SELECT * FROM messages" . 
					" WHERE (id_user_to = " . $_GET["user"] ." AND id_user_from = " . $_COOKIE["id"] . ") 
						OR (id_user_to = " . $_COOKIE["id"] ." AND id_user_from=" . $_GET["user"] . ")";
			//создаем перемнную результат запроса (массив)
			$result = mysqli_query($connect, $sql);
			
			$count_message = mysqli_num_rows($result);
			$i = 0;
			// Перебор сообщений, которые соответствуюи запросу для вывода на экран	
			while ($i < $count_message) {
				//берем результат запроса и превращаем его в массив для использования
				$all_message = mysqli_fetch_assoc($result);
					echo "<li>";
						// Запрос для вывода аватарки и имени из таблицы пользователей путем сравнивания id
						$sql1 = "SELECT * FROM user WHERE id ='" . $all_message["id_user_from"] . "'";
						//если я правильно помню это подключение базы и запроса для выполнения
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
		// Добавление сообщений в базу данных, а также айди пользователей, для их последеющего отображения
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
	// Условие для того чтобы при выводе страницы, когда не выбран пользователь не выдавало ошибку
	// А также чтобы при отправке сообщения, пользователь оставаля на странице чата
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