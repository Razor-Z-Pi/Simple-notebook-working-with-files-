<?php
header("Content-type:text/html; charset=UTF-8");
require_once "read_file.php";

$file = read();
$message = message($file);
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
    <section class="Title">
      <form class="read_book" method="post" action="write_file.php">
          <p>Запишите заметку</p>
        <p>
          Тема:
          <input name="title" type="text" required>
        </p>
        <p>
          Запись:<br>
          <textarea name="message" cols="30" rows="10" required></textarea>
        </p>
        <button class="btn_login btn_write" type="submit">Записать</button>
      </form>
        <form method="post" action="delete.php">
            <label for="data">Номер записи</label>
            <select id="data" name="dataS">
                <?php
                foreach ($message as $key => $item):?>
                    <option selected value="<?=$key?>"><?=$key?></option>
                <?php endforeach;?>
            </select>
            <button class="btn_login btn_write" type="submit">Удалить</button>
        </form>
    </section>
    <hr>
    <section class="message">
        <?php if (!empty($message)):?>
            <?php foreach ($message as $key => $value):?>
            <?php $title = get_format_message($value);?>
                <div class="message-container">
                    <h2>Номер записи: <?=$key?></h2>
                    <p class="Title-container">Тема: <?=$title[0]?>;<br> <?=$title[2]?></p>
                    <p><?=nl2br(htmlspecialchars($title[1]))?></p>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </section>
</body>
</html>