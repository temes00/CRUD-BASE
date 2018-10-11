<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "users");
	if (isset($_POST['click-to-submit-go'])) 
	{
		$qwery = mysqli_query($link,"SELECT password FROM dataUsers WHERE name = '".mysqli_real_escape_string($link, $_POST['username'])."'LIMIT 1");
		$data = mysqli_fetch_assoc($qwery); 

		if (($data['password']) === ($_POST['password'])) {
			print("sovpali");
			$_SESSION['logged_user'] = $_POST['username'];
			header("Location: products.php");
		}
		else{
			print("Incorrect password!"); 
			//echo "<a href="index.php">";
		}

	}

?>
<a href="index.php">Вернуться</a>