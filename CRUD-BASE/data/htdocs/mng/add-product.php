<?php
if(isset($_POST['submit'])){	   
	
	$link = mysqli_connect("localhost", "root", "", "users");
	
	if(isset($_POST['add-product-name'])){
		$product_name = mysqli_real_escape_string($link,$_POST['add-product-name']);
		$product_price = mysqli_real_escape_string($link,$_POST['add-product-price']);
		print($product_price);
		$add = ("INSERT INTO products VALUES (NULL,'$product_name', '$product_price')"); 		
		mysqli_query($link,$add); 
	}

}

header("Location: products.php");
if (isset($_POST['exit'])) {
		session_destroy();
		header("Location: index.php");
	}
?>