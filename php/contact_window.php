<?php 

$sql  = "SELECT * FROM user WHERE id != " . $_COOKIE["id"] ."";
$result = mysqli_query($connect, $sql);
$amount_users = mysqli_num_rows($result);

?>


<div class="modal-window" id="contact-window">
		<div class="close" id="close">X</div>
		<div class="contact">
			<ul>
				<?php
					$i = 0;
					while ($i < $amount_users) {
						$contacts = mysqli_fetch_assoc($result);
						echo "<li>";
							echo "<div class=\"avatar\">
									<img src=" . $contacts["avatar"] . ">
								</div>";
							echo "<h2>" . $contacts["name"] . "</h2>";
							$sql = "SELECT * FROM friends WHERE (user_1 = " . $contacts["id"] ." AND user_2 = " . $_COOKIE["id"] . ") OR (user_1 = " . $_COOKIE["id"] ." AND user_2 = " . $contacts["id"] . ")";
							$result1 = mysqli_query($connect, $sql);
							$amount_friend = mysqli_num_rows($result1);
							if($amount_friend > 0){
								echo "<a href = 'delete_friend.php?user_id= ". $contacts["id"] ."'>Удалить из друзей</a>" ;
							} else {
								echo "<a href = 'add_friend.php?user_id= ". $contacts["id"] ."'>Добавить в друзья</a>" ;
							}
													

						echo "</li>";

						$i = $i + 1;
					}
				?>
			</ul>
		</div>
	</div>