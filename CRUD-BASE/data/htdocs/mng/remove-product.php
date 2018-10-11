<?php
$link = mysqli_connect("localhost", "root", "", "users");  

$id =$_REQUEST['id'];
		
// sending query
mysqli_query($link,"DELETE FROM products WHERE id = '$id'");	
	
header("Location: products.php");
?>