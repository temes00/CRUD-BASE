<?php
session_start();
if(!isset($_SESSION['logged_user'])){
     header("Location: index.php");
     exit();
}
$link = mysqli_connect("localhost","root","","users");
$id =$_REQUEST['id'];

$result = mysqli_query($link, "SELECT * FROM products WHERE id  = $id");
$test = mysqli_fetch_array($result);

$last_product_name = $test['product_name'] ;
$last_product_price = $test['product_price'];

if(isset($_POST['save'])) {	
	$new_product_name = $_POST['edit-product-name'];
	$new_product_price = $_POST['edit-product-price'];

	mysqli_query($link,"UPDATE products SET product_name ='$new_product_name', product_price = '$new_product_price' WHERE id = $id");
	
	header("Location: products.php");			
}
?>


<html>
<head>
<meta content="text/html; charset=utf-8" />
<title>Редактирование</title>
</head>
<body>
<form method="POST">
<table>
	<tr>
		<td>Изменение:</td>
		<td><input type="text" name="edit-product-name" value="<?php echo $last_product_name ?>" size='30' /></td>
		<td><input type="text" name="edit-product-price" value="<?php echo $last_product_price ?>" size='15' /></td>
		<td><input type="submit" name="save" value="Сохранить" /></td>
	</tr>
</table>
<a href="products.php">Вернуться</a>
</body>
</html>