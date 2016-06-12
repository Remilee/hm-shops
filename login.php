<!DOCTYPE>
<?php
session_start();
?>
<head>
    <title>Войти</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/uikit.css" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="../css/indexcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
<?php include("../header.php");?>
<div class = "content">
	<div class = "login-form">
	<div class = "uk-grid uk-grid-small">
	<div class = "uk-container uk-container-center uk-margin-top uk-text-center"> 
		<p>Добро пожаловать!</p>
		<p>Войдите, пожалуйста</p>
		<p>Или <a href = "registration.php">зарегистрируйтесь</a></p>
		<form class = "uk-form" method="post" action = "scr_login.php">
		<p>
			<label>Логин: <br/>
			<input type = "text" name="login" size="20" maxlength="20" >
			</label>
		</p>
		<p>
			<label>Пароль: <br>
			<input type = "password" name = "password"size="20"maxlength="20">
			</label>
		</p>
		<input class = "uk-button" type = "submit" name = "submit" value = "Войти">
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
