<?php
session_start();

$login = $_SESSION['login'];
$email = $_SESSION['email'];
require_once 'connect.php';

if (isset($_POST['password']) && isset($_POST['current_password'])) {

    $password = $_POST['password'];
    $confirm_password = $_POST['current_password'];

    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $password)) {
        echo "Пароль не соответствует требованиям.";
    } elseif($password !== $confirm_password){
        echo "Пароли не совпадают";
    }else{
        
        $hash_password = md5($password);
        $query = "UPDATE user SET password = '$hash_password' WHERE email = '$email' AND login = '$login'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        
        if ($result && mysqli_num_rows($result) > 0) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Ошибка при обновлении пароля в базе данных.';
        }   
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
        <label>Введите новый пароль</label>
        <input name='password' placeholder='Новый пароль' type='password'><br><br>
        <label>Введите пароль повторно</label>
        <input name='current_password' placeholder='Подтверждение пароля' type='password'><br><br>
        <input type="submit" value='Восстановить'>
    </form>
</body>

</html>