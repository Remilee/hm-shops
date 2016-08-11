<?php
//shop
function show_all_product ($dbc) {
	$query = "SELECT id, path, name_product from img, product where id_img = img.id";
	$show_list = mysqli_query($dbc, $query) or die ("Ошибка загрузки списка товаров");
	return $show_list;
}
function show_product_info ($dbc, $id) {
	$query = "SELECT name, users.surname, name_product, made, price, subway, path FROM product, img, users WHERE img.id =".$id." and product.id_img = img.id and users.id = product.id_user";
	$info_product = mysqli_query($dbc, $query) or die("Ошибка вывода информации о товаре");
	$info_array = mysqli_fetch_array($info_product);
	return $info_array;
}
//добавление в корзину session-add-product.php
function get_temp_user ($dbc, $id) {
	$query_temp_user = "Select id from temp_user where id ='".$id."'";
	$get_user = mysqli_query($dbc, $query_temp_user) or die("Ошибка в получении запроса id пользователя");
	$Array = mysqli_fetch_array($get_user);
	//временный старый
	if (session_id() == $Array['id']) {
		return $id_user = $Array['id'];
	}
	else {
		//временный новый
		$new_temp_user = "INSERT INTO temp_user VALUES('".session_id()."')";
		$res_new_user = mysqli_query($dbc, $new_temp_user) or die("Ошибка в запросе временного пользователя");
		return $id_user = session_id();
	}
}
function info_to_basket ($dbc,$id) {
	$query = "SELECT id_product, price from product where id_img = ".$id;
	$get_price_id = mysqli_query($dbc, $query_price) or die("Ошибка в получении информации о товаре");
	$priceAndId = mysqli_fetch_array($get_price_id);
	return $priceAndId;
}
function add_to_basket ($dbc, $id_user, $price) {
	$new_basket = "INSERT INTO `basket`(`id_basket`, `id_product`, `id_user`, `cost`) VALUES ('NULL', '".$id_product."', '".$id_user."', $price);";
	$result_basket = mysqli_query($dbc, $new_basket) or die ("Ошибка добавления в корзину");
}
//basket
function get_user_basket($dbc, $id) {
		$query = "Select basket.id_basket, name_product, cost from product, basket where basket.id_product = product.id_product and basket.id_user = '".$id."'";
		$result_get_user = mysqli_query($dbc, $query) or die("Ошибка вывода корзины пользователя");
		return $result_get_user;
}
//registrate
function new_user ($dbc, $login, $password, $email, $telephone) {
	$query = "INSERT INTO users (login, password, email, telephone) VALUES ('$login', '$password', '$email', '$telephone')";
	$result = mysqli_query($dbc, $query);
	return $result;
}

function get_users_product ($dbc, $id) {
	$query_get = "SELECT id_product, name_product, made, price, status from product where id_user = ".$id;
	$info_users_product = mysqli_query($dbc, $query_get);
	return $info_users_product;
}

?>