<div id="hat">
	<div id="logo">
		<h2><img src="/img/logo.png"></h2> <span><b>Web chat</b></span>
	</div>
	<div id="menu">
		<?php 
		if(isset($_COOKIE["id"])){
			$sql = "SELECT * FROM user WHERE id = " . $_COOKIE["id"];
			$result = mysqli_query($connect, $sql);
			$newUser = mysqli_fetch_assoc($result);
			echo "<a href = \"#\"><img src = \"" . $newUser["avatar"] . "\"></a>";
			echo "<a href = \"#\">" . $newUser["name"] . "</a>";
		}

		?>
		<a href="index.php">Main page</a>
		<a href="#" id="open-contact">Contacts</a>
		<a href="#">Setting</a>

		<?php 
		if(isset($_COOKIE["id"])){
			?>
			<a href="logout.php">Log out</a>
			<?php	
		}
		else{
		?>
			<a href="login.php">Log in</a>
		<?php
		}
		?>
	</div>
</div>
