<?php

$sql = "SELECT * FROM user where id != " . $_COOKIE["id"] . "";
$result = mysqli_query($connect, $sql);

$count_users = mysqli_num_rows($result);

?>


<div id="users">

		
			<form action="index.php" method="GET" id="search">
				<input type="text" name="text">
				<button><img src="img/search.png"></button>
			</form>
			<div id="list">
				<ul>
				<?php
						$i = 0;
						if(isset($_GET["text"])){

							$sql1 = "SELECT * FROM `user` WHERE `name` LIKE '%" . $_GET["text"] . "%' AND id != " . $_COOKIE["id"] . "";
							$resultat = mysqli_query($connect, $sql1);
							$count_users_2 = mysqli_num_rows($resultat);

							while ($i < $count_users_2) {
							$user_search = mysqli_fetch_assoc($resultat);				
								echo "<a href=\"index.php?user=" . $user_search["id"] . "\"><li>";
									echo "<div class=\"avatar\">
										<img src=" . $user_search["avatar"] . ">
									</div>";
									echo "<h2>" . $user_search["name"] . "</h2>";
									echo "<p>Привет</p>";
									echo "<div class=\"time\">10:28</div>";

								echo "</li></a>";
																
								
							$i = $i + 1;
							}	

						}
						else{
	
							while ($i < $count_users) {
							$all_users = mysqli_fetch_assoc($result);				
								echo "<a href=\"index.php?user=" . $all_users["id"] . "\"><li>";
									echo "<div class=\"avatar\">
										<img src=" . $all_users["avatar"] . ">
									</div>";
									echo "<h2>" . $all_users["name"] . "</h2>";
									echo "<p>Привет</p>";
									echo "<div class=\"time\">10:28</div>";

								echo "</li></a>";
																
								
							$i = $i + 1;	
							}		
						}

						
					?>
				</ul>
			</div>
		
</div>