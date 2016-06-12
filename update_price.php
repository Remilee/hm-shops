<?php
session_start();
session_id();
include("../connect.php");
	$id_edited_product = $_GET['id_product'];
	$new_price = $_GET['new_price'];
	$query_edit_price = "UPDATE product SET price=".$new_price." WHERE id_product=".$id_edited_product;
	mysqli_query($dbc, $query_edit_price) or die ("Не удалось поменять цену");
	mysql_close();
	header('Location: show-my-products.php');
	exit;
?>
