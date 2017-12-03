<?php
ob_start();
session_start();
require('./common.php');
 $exp->query("delete from taikhoan where ma_nv = {$_GET['id']}");
$result = $exp->query("delete from nguoidung where id = {$_GET['id']}");
if($result) {
  $_SESSION["delete"] = "success";
}
else {
  $_SESSION["delete"] = "fail";
}
header("location:../pages/nguoidung.php");
 ?>
