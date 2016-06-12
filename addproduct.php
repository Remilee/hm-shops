<?php
session_start();
include("../connect.php");
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
    <div class = "uk-grid-width-1-1">
    <div class = "uk-container">
    <div class = "uk-panel uk-panel-box">
    	<?php
    		if (empty ($_SESSION['id'])) {
			echo "<p class = 'uk-text-danger'>Доступ запрещен</p>";
		}
			else { ?>
    	<h3>Добавить товар: </h3>
    	<form method="post" class = "uk-form" action = "addproduct_scene.php" enctype="multipart/form-data">
    		<p><label>Название:<br>
    		<input type="text" name = "name"required title = "Обязательное поле"/></label></p>

    		<p><label>Из чего сделано: <br>
    		<input type="text" name = "made"required title = "Обязательное поле"/></label></p>

    		<p><label>Стоимость: <br>
    		<input type="text" name = "price"required title = "Обязательное поле"/></label></p>

    		<p><label>Загрузка картинки: 
    		<input type="file" name = "filename" multiple accept="image/*,image/jpeg, image/png, image/gif" /><p id = "info"></p></label></p>

    		<p><label>Описание: <br>
    		<textarea rows="5" cols="60" name = "discription"/></textarea></label></p>
    		<tr>
    			<td>
    				<input type="submit" value="Оформить заказ" name = "submit" class = "uk-button uk-button-primary uk-button-medium"/>
    			</td>
    		</tr>
    		</table>
    	</form>
    	<?php
    	}
		?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php include("../footer.php");?>
</body>
</html>
