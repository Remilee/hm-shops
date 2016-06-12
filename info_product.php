<?php
session_start();
include("../connect.php");
$id = $_GET['name'];
include("../queries.php");
$info = show_product_info($dbc, $id);

include("../Classes/Product.php");
$product = new Product;
$product->name=$info['name_product'];
$product->made=$info['made'];
$product->price=$info['price'];

include("../Classes/User.php");
$user = new User;
$user->name=$info['name'];
$user->surname=$info['surname'];
$user->subway=$info['subway'];

include("../Classes/Image.php");
$image = new Image;
$image->path=$info['path'];
?>
<!DOCTYPE>
<head>
    <title><?php echo $product->name=$info['name_product'];?> | Hand Made Shops</title>
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
    <div class="shop_products">
    <div class = "uk-panel uk-panel-box uk-text-center">
    		<div> 
    			<img src = "../<?php echo $image->path;?>" width = "30%" height = "30%">
    		</div>
    		<div>
    			<h2 class = "uk-panel-title">
    				<?php
    					echo $product->name;
					?>
    			</h2>
    			<p>
    				<?php 
    					echo $user->name . ' ' . $user->surname . ', ' . $user->subway;
    				?>
    			</p>
    			<p>
    				<?php
    					echo $row['made'];
    				?>
    			</p>	
    			<a class = "uk-button uk-button-primary uk-button-large" href = "session-add-product.php?id=<?php echo sprintf($id);?>" class = "price" onmouseover="this.innerHTML = 'Добавить в корзину'" 
    				onmouseout="this.innerHTML = '<?php echo $product->price. ' рублей'?>'">
    				<?php
    					echo $product->price . ' рублей';
    				?>			 
    			</a>
    		</div>
    		<?php
    		mysqli_close($dbc);
			?>
    </div>
    </div>
</div>
<?php include("../footer.php");?>
</body>
</html>
