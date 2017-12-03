<?php
ob_start();
session_start();
require('./common.php');


if(isset($_SESSION)) {
  unset($_SESSION['quyen'],$_SESSION['ma_nv'],$_SESSION['ten_nv']);
  header("location:../pages/login.php");
}

header("location:../pages/login.php");



?>
