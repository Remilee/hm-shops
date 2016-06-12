<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/uikit.almost-flat.css" />
    <link rel="stylesheet" href="css/indexcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
<title>Hand Made Shops</title>
<link rel="stylesheet" type="text/css" href="" media="screen" />
</head>
<body>
	<?php
	include("header.php");
	?>
    <div class = "content">
        <img src="img/maxresdefault.jpg" width="auto" height="auto"> 
        <div class="uk-text-large uk-animation-fade">
        <p class = "main">Hand Made Shops - магазин вещей, сделанных своими руками.</p>
        <a class = "main" href = "shop/shop.php">Перейти в магазин</a>
        </div>
	 </div>
        <?php
        include("footer.php");
        ?>
</body>
</html>
