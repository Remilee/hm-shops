<?php
session_start();
?>
<!DOCTYPE>
<head>
    <title>Показать новые заказы</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/uikit.css" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    <link href = "../fonts/FontAwesome.otf">
    <link rel="stylesheet" href="../css/uikit.almost-flat.css" />
        <link rel="stylesheet" href="../css/indexcss.css" />
        <link rel="stylesheet" href="user_style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src = "../js/uikit.js"></script>
</head>
<body>

<?php include("../header.php");?>
<div class = "content">
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	<div class = "uk-grid uk-grid-small ">
	<?php include("user-navigation.php");?>

    <div class = "uk-container  uk-text-center">
    	<div class = "uk-panel uk-panel-box ">
    			<div class = "uk-overflow-container">
    			<h2>Посмотреть заказы</h2>
    				<form method="post">
				<table class = "uk-table uk-table-striped uk-table-hover uk-table-condensed little-table">
					<tr>
					<th width="20px">Название</th>
					<th>Дата <br>оформления</th>
					<th>Имя <br>покупателя</th>
					<th width="20px">Адрес <br>доставки</th>
					<th>Телефон <br>покупателя</th>
					<th>Стоимость <br>товара</th>
					</tr>
	<?php
			include("../connect.php");
			$get_unreading = "SELECT name_product, date_order, name, address, telephone, total from order_product, basket, product where order_product.product_order = basket.id_basket and basket.id_product = product.id_product and order_product.reading = 'n' and product.id_user = ".$_SESSION['id'];
			$result_reading = mysqli_query($dbc, $get_unreading);
			while ($array_result = mysqli_fetch_array($result_reading)) {
				?>
					<tr>
						<td><?php echo $array_result['name_product'];?></td>
						<td><?php echo $array_result['date_order'];?></td>
						<td><?php echo $array_result['name'];?></td>
						<td><?php echo $array_result['address'];?></td>
						<td><?php echo $array_result['telephone'];?></td>
						<td><?php echo $array_result['total'];?></td>
					</tr>
				<?php
			}
	?>
				</table>
				</form>
				</div>
</div>
</div>
</div>
</div>
</div>

<?php include("../footer.php");?>
</body>
</html>
