<?php
session_start();
require_once 'connect.php';
if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true){
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header('Location: login.php');
    header('Location: index.php');
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
    <?php
    echo ('Добро пожаловать '.$_SESSION['login']."<br>");
    ?>
    <a href = 'logout.php'>Выйти</a>

</body>

</html>