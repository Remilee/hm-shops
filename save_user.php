<?php
session_start();
include("../queries.php");
	if (isset($_POST['login']))
	{
		$login = $_POST['login'];
		if ($login == '')
		{
			unset($login);
		}
	}
	if (isset($_POST['password']))
	{
		$password = $_POST['password'];
		if ($password == '')
		{
			unset($password);
		}
	}
	if (isset($_POST['email']))
	{
		$email = $_POST['email'];
		if ($email == '')
		{
			unset($email);
		}
	}
	if (isset($_POST['phone_number']))
	{
		$phone_number = $_POST['phone_number'];
		if ($phone_number == '')
		{
			unset($phone_number);
		}
	}
	$login = stripslashes($login);
	$login = htmlspecialchars($login);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	$email = stripslashes($email);
	$login = trim($login);
	$password = trim($password);
	$email = trim($email);
	
	include("../Classes/User.php");
	$user = new User;
	$user->login = $login;
	$user->password = $password;
	$user->email = $email;
	$user->telephone = $phone_number;
		include ("../connect.php");
	$query = "SELECT id FROM users WHERE login='$login'";
	$result = mysqli_query($dbc, $query) or die("Ошибка выполнения запроса");
	$myrow = mysqli_fetch_array($result);
	if (!empty($myrow['id']))
	{
		exit("Извините, введенный логин уже зарегистрирован. Введите другой логин");
	}
	$add = new_user($dbc, $user->login, $user->password, $user->email, $user->telephone);
?>
<!DOCTYPE>
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
	<?php
	if ($add=='TRUE')
	{
		echo "Вы успешно зарегистрированы. Теперь вы можете зайти на сайт.";
	}
	else {
		echo "Ошибка! Вы не зарегистрированы!";
	}
?>
	</div>
	</div>
	</div>
	</div>
<?php include("../footer.php");?>
</body>
</html>