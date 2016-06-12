<?php
	session_start();
	include("../connect.php");
	//Добавление картинки
	include("../Classes/Image.php");
	$image = new Image;
	$image->id = $_GET['img_id'];
	$image->path = "img/Original/".$image->id.".jpg";
	$image->discription = $_GET['discription'];
	$query_img = "INSERT INTO img(id,path,discription) VALUES ('NULL', '".$image->path."', '".$image->discription."')";
	mysqli_query($dbc, $query_img) or die("Ошибка в запросе0");
	//добавление информации
	$id_query = "SELECT id from users where login='".$_SESSION['login']."'";
	$id_result = mysqli_query($dbc, $id_query) or die ("Ошибка выполнения запроса1");
	$array_user = mysqli_fetch_array($id_result);
	$id_user = $array_user[0];
	include("../Classes/Product.php");
	$product = new Product;
	$product->name = $_GET['name'];
	$product->made = $_GET['made'];
	$product->price = $_GET['price'];
	$query_info = "INSERT INTO product(id_product, id_user, name_product, made, price, id_img, status)VALUES ('NULL', '".$id_user."', '".$product->name."', '".$product->made."', '".$product->price."', '".$image->id."', 'y')";
	?>
<!DOCTYPE>
<head>
    <title>Добавление товара</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/uikit.css" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/uikit.almost-flat.css" />
        <link rel="stylesheet" href="../css/indexcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src = "../js/uikit.js"></script>
</head>
    <body>
<?php include("../header.php");?>
<div class = "content">
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
    <div class = "uk-grid uk-grid-small">
    <?php include("user-navigation.php");?>

    <div class = "uk-container">
    <div class = "uk-panel uk-panel-box">
	<?php
	$result_info = mysqli_query($dbc, $query_info) or die("Товар не добавлен");
	if ($result_info == 'TRUE') {
		echo "Товар добавлен";
	}
	mysqli_close($dbc);
	?>
    </div>

</div>
</div>
</div>
</div>
<?php include("../footer.php");?>
</div>
</body>
</html>