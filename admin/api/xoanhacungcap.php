<?php
ob_start();
session_start();
require('./common.php');
$result = $exp->query("delete from nhacungcap where id = {$_GET['id']}");

if($result) {
  $_SESSION["delete"] = "success";
}
else {
  $_SESSION["delete"] = "fail";
}
header("location:../pages/nhacungcap.php");
 ?>
