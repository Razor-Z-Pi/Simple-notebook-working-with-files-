<?php
session_start();

$login = "admin";
$password = 12345;

if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    if ($login == $_POST["login"] && $password == $_POST["password"]) {
        header("Location: profile.php");
        die();
    } else {
      $_SESSION["ERROR"] = "Вы ввели не парвильный пароль или логин";
    }
    header("Location: {$_SERVER["PHP_SELF"]}");
    die();
}

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <section class="container">
        <div class="Login_form">
            <form class="form" method="post" action="">
                <h1>Добро пожаловать</h1>
              
                  <?php
                  if(isset($_SESSION["ERROR"])) {
                    echo "<p class='error'>Вы ввели неправильный пароль или логин!</p>";
                  }
                  unset($_SESSION["ERROR"]);
                  ?>
                
                <p>Введите логин и пароль</p>
                <p>
                    Логин:
                    <input name="login" type="text" required>
                </p>
                <p>
                    Пароль:
                    <input name="password" type="password" required>
                </p>
                <button class="btn_login" type="submit">Войти</button>
            </form>
        </div>
    </section>
  </body>
</html>