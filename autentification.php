<?
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style_autentification.css">

	<title>Авторизация</title>
</head>
<body>
		<form class="box" action="" method="GET">
      <a href="http://localhost/indexxx.php"><img src="img/cross.png" class="cross" alt="failed"></a>
      <h1>АВТОРИЗАЦИЯ</h1>
      <input type="text" name="login" placeholder="Username">
      <input type="password" name="pass" placeholder="Password">
      <input type="submit" name="sub" value="Login">
		</form>
</body>
</html>

<?

include('connect.php');

$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);
$flag = false;
$check = true;
$login = $_GET['login'];
$password = $_GET['pass'];

if (isset($_GET['sub'])) {
  while ($myrow = mysqli_fetch_assoc($result)) {
    foreach ($myrow as $key) {
      if ($login == $myrow['login'] && $password == $myrow['password'] ) {
        $flag = true;
        echo '<div id="errormsg"> Вы авторизовались! </div>';
        $_SESSION["loginauth"] = $login;
        $_SESSION["islogin"] = true;
        header('Location:indexxx.php');
        break;
      }
      else {
        $check = false;
      }
    }
  }

  if ($check == false) {
    echo '<div id="errormsg"> Повторите попытку </div>';
  }
}

?>