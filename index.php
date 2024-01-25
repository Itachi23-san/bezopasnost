<?php
session_start();
require_once 'connect.php';
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE login = '$login' AND password = '$password' AND email = '$email'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if (mysqli_num_rows($result)) {
        $_SESSION['authenticated'] = true;
        header('Location: main_page.php');
        $_SESSION['login'] = $login;
    } else {
        echo ("Неправильно введены даннные");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method='POST'>
        <label>Введите логин</label>
        <input name='login' placeholder='Логин' type='text'><br><br>Qwerty1234$%
        <label>Введите пароль</label>
        <input name='password' placeholder='Пароль' type='password'><br><br>
        <input type="submit" value='Войти'>
    </form>

    <a href="reg.php">Регистрация</a>
    <a href="restore.php">Забыли пароль?</a>


</body>

</html>