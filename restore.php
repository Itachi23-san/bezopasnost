<?php
session_start();
require_once 'connect.php';

if (isset($_POST['login']) && isset($_POST['email'])) {

    $login = $_POST['login'];
    $email = $_POST['email'];

    $query = "SELECT * FROM user WHERE login = '$login' email = '$email'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    if($result && mysqli_num_rows($result) > 0){
        $_SESSION['login'] = $login;
        $_SESSION['email'] = $email;
        header('Location: restore2.php');
    } else{
        echo "Пользователь с такими данными не найден";
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
        <label>Введите логин</label>
        <input name='login' placeholder='Логин' type='text'><br><br>
        <label>Введите email</label>
        <input name='email' placeholder='Почта' type='email'><br><br>
        <input type="submit" value='Отправить'>
    </form>
</body>

</html>