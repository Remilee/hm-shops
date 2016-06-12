<?php
session_start();
include("../connect.php");
$query_get_user = "SELECT id from users where login='".$_SESSION['login']."'";
$result0 = mysqli_query($dbc, $query_get_user) or die("Ошибка выполнения запроса0");
$user_Array = mysqli_fetch_array($result0);
$user = $user_Array[0];
$query_get = "SELECT id_product, name_product, made, price, status from product where id_user = ".$user;
$result1 = mysqli_query($dbc, $query_get);
include("../Classes/Product.php");
$product = new Product();
?>
<!DOCTYPE>
<head>
    <title>Показать мои товары</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="../css/indexcss.css" />
    <link rel="stylesheet" href="user_style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src = "../js/uikit.js"></script>
    <link rel="stylesheet" href="../css/uikit.almost-flat.css" />
</head>
    <body>
<?php include("../header.php");?>
<div class = "content">
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	<div class = "uk-grid uk-grid-small">
	<?php include("user-navigation.php");?>
    
    <div class = "uk-container uk-text-center">
    	<div class = "uk-panel uk-panel-box ">

				<?php
				if (empty ($result1)) {
					echo "У вас нет добавленных товаров"; }
				else {
					?>
                    <h2>Все мои товары</h2>
    			<div class = "table-style">
    			<table class = 'uk-table uk-table-striped uk-table-hover'>
    				<tr>
		    			<th>Название</th>
		    			<th>Из чего сделано</th>
		    			<th>Цена</th>
		    			<th>Статус</th>
		    		</tr>
    			<?php
             		while($Array = mysqli_fetch_array($result1)) {
             			$product->name = $Array['name_product'];
						$product->made = $Array['made'];
						$product->id = $Array['id_product'];
    				if ($Array['status'] == 'y') {$status = 'есть в наличии';} elseif ($Array['status'] == 'n') {$status = 'нет в наличии';}
					echo "<tr><td>".$product->name."</td><td>".$product->made."</td>
					<td><form action = 'update_price.php'method='get' class='uk-form'><input type='hidden' name='id_product' value='".$product->id."'><input name='new_price' type='text' size='4'value='".$Array['price']."'><a title='Обновить цену'><input type='submit' value='&#10003'></a></form></td>
					<td>".$status."</td></tr>";}
?>
    			</table>
    			</div>
    			<?php
				}
				?>
</div>
</div>
</div>
</div>
</div>
<?php include("../footer.php");?>
</body>
</html>