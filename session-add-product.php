<?php
session_id();
session_start();
$id = $_GET['id'];
include("../connect.php");
$query_temp_user = "Select id from temp_user where id ='".session_id()."'";
$get_temp_user = mysqli_query($dbc, $query_temp_user) or die("Ошибка в получении идентификатора сессии");
$myrow = mysqli_fetch_array($get_temp_user);
	//временный старый
	if (session_id() == $myrow['id']) {
		$id_user = $myrow['id'];
	}
	else {
		//временный новый
		$new_temp_user = "INSERT INTO temp_user VALUES('".session_id()."')";
		mysqli_query($dbc, $new_temp_user) or die("Ошибка в запросе временного пользователя");
		$id_user = session_id();
	}
$query_price = "SELECT id_product, price from product where id_img = ".$id;
$get_price = mysqli_query($dbc, $query_price) or die("Ошибка в получении информации о товаре");
$row = mysqli_fetch_array($get_price);
$price = $row['price'];
$id_product = $row['id_product'];
$new_basket = "INSERT INTO `basket`(`id_basket`, `id_product`, `id_user`, `cost`) VALUES ('NULL', '".$id_product."', '".$id_user."', $price);";
$result_basket = mysqli_query($dbc, $new_basket) or die (mysql_error());
?>
<!DOCTYPE>
<head>
    <title>Магазин</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   	<link rel="stylesheet" href="../css/uikit.almost-flat.css" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/indexcss.css" />
    <link rel="stylesheet" href="shopstyle.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    	
<?php include("../header.php");?>
<div class = "content">
	<div class = "uk-container uk-container-center uk-margin-top">
		<div class = "uk-panel uk-panel-box uk-text-center">
			<?php
				if ($result_basket=='TRUE') {
				echo "Товар добавлен в корзину";
			}
			else {echo "Не удалось добавить товар";}
			?>
	</div>
	</div>
</div>
<?php include("../footer.php");?>
</body>
</html>