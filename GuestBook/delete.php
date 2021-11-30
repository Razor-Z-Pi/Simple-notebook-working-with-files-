<?php
require_once "write_file.php";
require_once "read_file.php";

if (!empty($_POST["dataS"] || $_POST["dataS"] == 0)) {
  delete($_POST["dataS"]);
}

function delete($number) {
  $old_file = read();
  $message = message($old_file);
  
  $path = (string)"./file/item.txt";
  $file = fopen($path, "w");
  foreach ($message as $key => $value) {
    if ($number == $key) {
      continue;
    } else {
      $value .= "\n***\n";
      fwrite($file, $value);
    }
  }
  fclose($file);
  header("Location: profile.php");
}