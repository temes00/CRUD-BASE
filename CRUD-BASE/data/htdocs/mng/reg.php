<form method="POST">
<table>
	<tr>
		<td>Регистрация:</td>
		<td><input type = "text" name = "add-user-name" size='30' /></td>
		<td><input type = "password" name = "add-user-password" size = '30'></td>
		<td><input type="submit" name="submit" value="Создать" /></td>
	</tr>
</table>
<a href="index.php">Вернуться</a>
<?php
if(isset($_POST['submit'])){	   
	
	$link = mysqli_connect("localhost", "root", "", "users");
	
	if(isset($_POST['add-user-name'])){
		$new_user_name = mysqli_real_escape_string($link,$_POST['add-user-name']);
		$new_user_password = mysqli_real_escape_string($link,$_POST['add-user-password']);
		$add = ("INSERT INTO datausers VALUES (NULL,'$new_user_name', '$new_user_password')"); 		
		mysqli_query($link,$add);
		<br>
		echo "Регистрация прошла успешно"; 
	}
}


?>