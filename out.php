<?php
session_start();
session_destroy();
$_SESSION['auth'] = true;
header("Location:index.php");
exit();
?>