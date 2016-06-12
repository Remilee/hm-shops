<?php
session_start();
include("../Classes/Product.php");
$product = new Product;
include("../Classes/Image.php");
$image = new Image;
	$product->name = $_POST['name'];
	$product->made = $_POST['made'];
	$product->price = $_POST['price'];
	$image->discription = $_POST['discription'];
?>
<!DOCTYPE>
<head>
<title>Добавление товара</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
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
    <div class = "uk-grid">
    <div class = "uk-grid-small">
    <?php include("user-navigation.php");?></div>
    <div class = "uk-width-1-2">
     <div class = "uk-container uk-text-center">
    <div class = "uk-panel uk-panel-box">   
    <div class = "uk-overflow-container"> 
 
    <?php
	if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   	{
    	include ("../connect.php");
    	$query_id = "SELECT MAX(id) from img";
		$result = mysqli_query($dbc, $query_id) or die ("Ошибка в запросе");
		$myrow = mysqli_fetch_array($result);
  		$newFileId = $myrow[0] + 1;
  		$newFileIdjpg = $newFileId . ".jpg";
     	move_uploaded_file($_FILES["filename"]["tmp_name"], "/var/www/html/img/Original/" . $newFileIdjpg);
    	?>
	<img width= "40%" height = "40%"src = "../img/Original/<?php echo $newFileIdjpg;?>">
	<p>Ваш товар: <?php echo $product->name;?></p>
	<p>Используемые материалы: <?php echo $product->made;?></p>
	<p>Цена: <?php echo $product->price;?> рублей</p>
	<p>Описание: <?php echo $image->discription;?></p>
    <input type="button" onclick="history.back()" value="Вернуться" class="uk-button uk-button-success uk-button-large">
    <a href = "product_added.php<?php echo sprintf('?name=' . $product->name . '&made=' . $product->made . '&price=' . $product->price . '&discription=' . $image->discription.'&img_id=' . $newFileId);?>">
    	<input type="submit" value="Отправить" class = "uk-button uk-button-primary uk-button-large"/></a>
	<?php
   } else {
      echo("Картинка не загружена");
   }
	?>
	


</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("../footer.php");?>
</body>
</html>