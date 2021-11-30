<?php
date_default_timezone_set("Europe/Moscow");

if(!empty($_POST["title"]) && !empty($_POST["message"])) {
  write($_POST["title"], $_POST["message"]);
}

function write($title, $message) {
  $path = (string)"./file/item.txt";
  $file = fopen($path, "a");
  $text = $title . "/" . $message ."/" . date("Дата записи=j:d:Y, Время=H:i", strtotime("+4 hours")) . "\n***\n";
  fwrite($file, $text);
  fclose($file);
  header("Location: profile.php");
}