<?php

function checkExsit($data) {
  foreach ($data as  $key => $value) {
    if(!isset($value)) {
      echo "Dữ liệu không được để trống";
      return false;
    }
  }
  return true;
}

function dd($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
 ?>
