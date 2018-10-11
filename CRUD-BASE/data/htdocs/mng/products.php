<html>
<body>
<form method="POST" action="add-product.php">
<input type="submit" name = "exit" value = "Exit">
<table>
	<tr>
		<td>Добавить:</td>
	</tr>
	<tr>
		<td><label>Товар:</label><input type = "text" name = "add-product-name" size='30' /></td>
		<td><label>Цена:</label><input type = "text" name = "add-product-price" size = '15'></td>
		<td><input type="submit" name="submit" value="Создать" /></td>
	</tr>
</table>
</form>
<?php
	session_start();
	if(!isset($_SESSION['logged_user'])){
     header("Location: index.php");
    exit();
	}
	$link = mysqli_connect("localhost", "root", "", "users");
	$qwery = "SELECT * FROM products";
	$products = mysqli_query($link,$qwery);
	if ($products) {
		$rows = mysqli_num_rows($products);
		echo "<table><tr><th>Id</th><th>Товар</th><th>Цена</th></tr>";
		for ($i=0; $i < $rows; $i++) { 
			$row = mysqli_fetch_row($products);
        		echo "<tr>";
            	for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            		$id = $i + 1;
            		echo "<td> <a href ='edit-product.php?id=$id'>Редактировать</a>";
					echo"<td> <a href ='remove-product.php?id=$id'><center>Удалить</center></a>";
        		echo "</tr>";
		}
		echo "</table>";
		mysqli_free_result($products);
	}
	
	mysqli_close($link);

?>
<h1>Добро пожаловать!</h1>
</body>
</html>