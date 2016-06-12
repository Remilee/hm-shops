<!DOCTYPE>
<?php
session_start();
include("../connect.php");
include("../Classes/Product.php");
$product = new Product;
include("../Classes/Image.php");
$image = new Image;
include("../queries.php");
$show_list = show_all_product($dbc);
?>
<head>
    <title>Магазин | Hand Made Shops</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/uikit.almost-flat.css" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/indexcss.css" />
    <link rel="stylesheet" href="shopstyle.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src = "../js/uikit.js"></script>
</head>
    <body>
<?php include("../header.php");?>
<div class = "content">
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
    <div class="shop_products">
    <ul class = "uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-6" data-uk-grid-margin>	
       <?php
       	while ($product_list = mysqli_fetch_array($show_list)) {
       	$product->name=$product_list['name_product'];
		$image->id=$product_list['id'];
		$image->path=$product_list['path'];?>
		<div class="uk-panel uk-panel-box">
			<?php echo sprintf('<a href = "info_product.php?name='.$image->id.'"<h4 class = "uk-panel-title">'.$product->name.'</h4><li><img width = "150px" height = "150px"src="../'.$image->path.'"></li></a>');?>
		</div>
	   <?php }  ?>  
       </ul>
    </div>
</div>
</div>
<?php include("../footer.php");?>

</body>
</html>
