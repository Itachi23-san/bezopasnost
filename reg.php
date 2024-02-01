<?php
require_once 'connect.php';

if (isset($_POST['user_name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['current_password'])) {
    $name = $_POST['user_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['current_password'];
    $stmt = "SELECT * FROM user WHERE login = '$login'";
    $res = mysqli_query($link, $stmt);
    if($res && mysqli_num_rows($res) > 0){
        echo 'Логин уже занят';
    } elseif (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $password)) {
        echo "Пароль не соответствует требованиям.";
    } elseif($password !== $confirm_password){
        echo "Пароли не совпадают";
    } else{
        $hash_password = md5($password);
        $query = "INSERT INTO user SET name = '$name', login = '$login', email = '$email', password = '$hash_password' ";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        echo 'Регистрация прошла успешно';
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
    <form method="POST">
        <label>Введите имя</label>
        <input name='user_name' placeholder='Имя' type='text'><br><br>
        <label>Введите логин</label>
        <input name='login' placeholder='Логин' type='text'><br><br>
        <label>Введите email</label>
        <input name='email' placeholder='Почта' type='email'><br><br>
        <label>Введите пароль</label>
        <input name='password' placeholder='Пароль' type='password'><br><br>
        <label>Введите пароль повторно</label>
        <input name='current_password' placeholder='Подтверждение пароля' type='password'><br><br>
        <input type="submit" value='Зарегестрироваться'>
        <a href="index.php">Уже есть аккаунт? Войти</a>
    </form>



    <script src="./script.js"></script>
</body>

</html>
