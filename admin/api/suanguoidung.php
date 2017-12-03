<?php
ob_start();
session_start();
require('./common.php');


if(isset($_POST['submit'])) {
  $_SESSION["edit"] = "fail";
  header("location:../pages/nguoidung.php");
}

$data['ten_nv'] = $_POST['ten_nv'];
$data['ngay_sinh'] = $_POST['ngay_sinh'];
$data['dia_chi'] = $_POST['dia_chi'];
$data['sdt'] = $_POST['sdt'];
$data['cmnd'] = $_POST['cmnd'];
$data['quyen'] = $_POST['quyen'];
$account['username'] = $_POST['username'];
$account['password'] = $_POST['password'];
if($exp->update('nguoidung', $data,"id={$_POST['id']}")) {
  $exp->update('taikhoan',$account,"ma_nv={$_POST['id']}");
  $_SESSION["edit"] = "success";
  header("location:../pages/nguoidung.php");
};


 ?>
