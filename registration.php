<!DOCTYPE>
<?php
session_start();
?>
<head>
    <title>Регистрация</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/uikit.css" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="shopstyle.css" />
    <link rel="stylesheet" href="../css/indexcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
<?php include("../header.php");?>
<div class = "content">
	<div class = "login-form">
	<div class = "uk-grid uk-grid-small">
	<div class = "uk-container uk-container-center uk-margin-top uk-text-center">
	<?php include("../authorization.php");?>
	<div><p>Добро пожаловать!</p>
	<p>Введите свои данные.</p>
	</div>
	<form class = "uk-form" method="post" action = "save_user.php" javscript:>
	<p>
		<label>Логин: <br/>
		<input type = "text" name="login" size="20" maxlength="20"pattern="[a-zA-Z]{4,20}" required title="Разрешены только английские буквы" class="uk-form-success">
		</label>
	</p>
	<p>
		<label>Пароль: <br>
		<input class = "uk-form-password"type = "password" name = "password"size="20"maxlength="20" pattern="[a-zA-Z1-9]{8,20}" required title="Длина должна быть не меньше 8 символов, английскими буквами">
		</label>
	</p>
	<p>
		<label>Адрес e-mail: <br />
		<input type="text" name = "email"size = "20" maxlength="50">
		</label>
	</p>
	<p>
		<label>Номер телефона: <br />
		<input type="text" name = "phone_number"size = "20" maxlength="12" pattern="[0-9+]{12}" required title="Введите номер телефона по маске(+7***)">
		</label>
	</p>
	<input class = "uk-button uk-button-success" type = "submit" name = "submit" value = "Зарегистрироваться">
	</form>
	</div>
</div>
</div>
</div>
<?php
        include("../footer.php");
        ?>
</body>
</html>
