<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>Hand Made Shops | Главная</title>
	<link rel="stylesheet" type="text/css" href="hmshops.css">
</head>
<body>
<header>
	<div id = "logo"><h1><a href = "../">Hand Made Shops</a></h1>
	<span>Интернет магазин готовых поделок</span></div>
	<nav id = "navigation">
		<ul>
			<li><a href = "shops">Интернет-магазин</a></li>
			<li><a href = "blog">Блог</a></li>
			<li><a href = "../login/login.php">Войти | Зарегистрироваться</a></li>
			<li><a href = "bascet-shops">Корзина</a></li>
		</ul>
	</nav>
    
	<div id = "user_info">
		<?php
	session_start();
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость";
    }
    else
    {
    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как <a href = '../user/user_page.php'>".$_SESSION['login']."</a>";
    }
    ?>
    </div>
</header>
<main>
	<p>Добро пожаловать в наш магазин!</p>
	<div class = "product">
	<img src="img/yKQ0zE4sae4.jpg" width="250px" height="200px">
	</div>
	<div class = "product">
	<img src="img/edlRfxHX80c.png" width="250px"height="200px">
	<div class = "product">
		<img src="img/мягкая-игрушка-из-фетраjpg.png" width="250px"height="200px">
	</div>
</main>
<footer>
	<p>Hand Made Shops | hm-shops.ru | 2016 | Created by Remilee White</p>
</footer>
</body>
</html>
