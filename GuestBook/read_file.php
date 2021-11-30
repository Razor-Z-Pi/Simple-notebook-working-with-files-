<?php
function read() {
  $path = (string)"./file/item.txt";
  return file_get_contents($path);
}

function message($message) {
  $message = explode("\n***\n", $message);
  array_pop($message);
  return array_reverse($message);
}

function get_format_message($message) {
  return explode("/", $message);
}