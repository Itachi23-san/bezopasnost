<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'connect.php';

$query = 'SELECT * FROM content';
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>

<title>
    <?php 
    echo ($data[0]['page_content']);
    ?>
</title>
<header> 
    <?php 
    echo ($data[1]['page_content']);
    ?>
</header>
<main>
    <?php 
    echo ($data[2]['page_content']);
    ?>
</main>
<footer>
    <?php 
    echo ($data[3]['page_content']);
    ?>
</footer>

<?php
mysqli_close($link);
?>

</body>
</html>