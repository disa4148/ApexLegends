<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style_registration.css">
  <link rel="stylesheet" href="adaptive_registration.css">
  <link rel="shortcut icon" type="image/x-icon" href="https://www.ea.com/assets/images/favicon.png">
	<title>Регистрация</title>
</head>
<body>
		<form class="box" action="" method="GET">
      <a href="http://localhost/indexxx.php"><img src="img/cross.png" class="cross" alt="failed"></a>
      <h1>РЕГИСТРАЦИЯ</h1>
      <input type="text" name="fio" placeholder="ФИО">
      <input type="text" name="login" placeholder="Логин">
      <input type="password" name="password" placeholder="Пароль">
      <input type="password" name="repeatpassword" placeholder="Повтор пароля">
      <input type="Email" name="email" placeholder="Электронная почта">
      <p class="soglasie"> Согласие на обработку персональных данных </p>
      <div class="flex">
      <input type="checkbox" name="checkboxx"> <p class="confirm"> Принимаю </p>
      </div>
      <input type="submit" name="sub" value="Login">
		</form>
</body>
</html>

<?
session_start();
include('connect.php');

$fio = $_GET['fio'];
$login = $_GET['login'];
$password = $_GET['password'];
$repeatpassword = $_GET['repeatpassword'];
$email = $_GET['email'];


if (isset($_GET['sub'])) {
    if (!empty($_GET['login']) and !empty($_GET['password']) and !empty($_GET['repeatpassword']) and !empty($_GET['email'])) {
        if ($password == $repeatpassword ) {
            if (isset($_GET['checkboxx'])) {

            $query = "INSERT INTO `users` (`id`, `fio`,`login`, `password`, `email`) VALUES (NULL,'$fio','$login', '$password', '$email')";
            $result = mysqli_query($link, $query);
            echo '<div id="errormsg"> Вы успешно зарегистрировались! </div>';
            header('Location:indexxx.php');
            
        } else {
            echo '<div id="errormsg"> Регистрация без согласия невозможна </div>';
        }
     } else {
   echo '<div id="errormsg"> Пароли не совпадают </div>';
        }
} else {
echo '<div id="errormsg"> Заполните пустые поля </div>';
}
}
?>