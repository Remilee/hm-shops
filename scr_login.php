<?php
	session_start();
	if(isset($_POST['login']))
	{
		$login = $_POST['login'];
		if ($login == '')
		{
			unset($login);
		}
	}
	if(isset($_POST['password']))
	{
		$password = $_POST['password'];
		if ($password == '')
		{
			unset($password);
		}
	}
	if (empty($login) or empty($password))
	{
		exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
	}
	$login = stripslashes($login);
	$login = htmlspecialchars($login);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	$login = trim($login);
	$password = trim($password);
	include ("../connect.php");
	$query = "SELECT * from users WHERE login='$login'";
	$result = mysqli_query($dbc, $query) or die ("Ошибка в получении логина");
	$myrow = mysqli_fetch_array($result);
	if (empty($myrow['password']))
	{
		exit("Извините, введенный вами логин или пароль неверный");
	}
	else 
		{
			if ($myrow['password']==$password)
			{
				//запуск сессии
				$_SESSION['login']=$myrow['login'];
				$_SESSION['id']=$myrow['id'];
				header('Location:../user/show-my-products.php');
  				exit;
  				
			}
			else {
				//если пароли не сошлись
				exit("Извините, введенный вами логин и пароль неверный");
			}
		}
?>