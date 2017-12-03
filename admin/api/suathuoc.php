<?php
ob_start();
session_start();
require('./common.php');

dd($_FILES["image"]["tmp_name"]);
// return;
if(isset($_POST['submit'])) {

  if(isset($_POST['theo_don'])) {
    $data['theo_don'] = 1;

  }else {
    $data['theo_don'] = 0;
  }
  $data['ten_thuoc'] = $_POST['ten_thuoc'];
  $data['ma_loai_thuoc'] = $_POST['ma_loai_thuoc'];
  $data['gia_ban'] = $_POST['gia_ban'];
  $data['gia_von'] = $_POST['gia_von'];
  $data['ghi_chu'] = $_POST['note'];
  $data['nsx'] = $_POST['nsx'];
  $data['hsd'] = $_POST['hsd'];
  $exp->update('thuoc', $data,"id={$_POST['id']}");

  $connect = mysqli_connect($tenserver, $tentaikhoan, $matkhau, $tencsdl);

  if(!empty($_FILES["image"]["tmp_name"])) {
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "UPDATE  thuoc SET anh = '$file' where id = '{$_POST['id']}' ";
    mysqli_query($connect, $query);
  }
    $_SESSION["edit"] = "success";
    header("location:../pages/danhmuc.php");
}
else {
  $_SESSION["edit"] = "fail";
  header("location:../pages/danhmuc.php?fail");
}
 ?>
