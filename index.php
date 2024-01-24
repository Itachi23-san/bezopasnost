<?php
session_start();
include 'orm/db.php'; 
        if (!empty($_POST['password']) and !empty($_POST['login'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = $link->query("SELECT * FROM info WHERE login='$login' AND password='$password'");
		$user = mysqli_fetch_assoc($result);
		if (!empty($user)) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
			$_SESSION['auth'] = true;
            header('Location:index2.php');
		} 
	}

?>
<html>
    <body>
    <form method = "post">
      <input name = "login" type="text"  placeholder="Логин" value="<?= $_POST['login']?>">
      <input name = "password" type="password" placeholder="Пароль" value="<?= $_POST['password']?>" >
      <button type="submit">Войти</button>
    </form>
    </body>
</html>