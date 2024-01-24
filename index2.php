<?php
	session_start();
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
        echo "Вы вошли как: $login ";
    } else {
        echo "Вы не вошли в систему.";
    }
    ?>
<html>
    <body>
    <form action = "out.php" method = "post">
      <button type="submit">Выйти</button>
    </form>
    </body>

</html>