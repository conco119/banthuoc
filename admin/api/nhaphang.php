<?php
ob_start();
session_start();
require('./common.php');



if(isset($_POST['submit'])) {

  if($_POST['tong_tien'] == '') {
    $_SESSION["status"] = "fail";
    header("location:../pages/nhaphang.php");
    return;
  }
  if($_POST['ngay_nhap'] == '') {
    $_SESSION["status"] = "fail";
    header("location:../pages/nhaphang.php");
    return;
  }
  $data['ma_ncc'] = $_POST['nhacungcap'];
  $data['ma_nv'] = $_POST['manv'];
  $data['ngay_nhap'] = $_POST['ngay_nhap'];
  $data['ghi_chu'] = $_POST['ghi_chu'];
  $data['tong_tien'] = $_POST['tong_tien'];

  if( $id = $exp->insert('phieu_nhap', $data) ) {
    foreach($_POST as $key => $value) {
      if(is_numeric($key)) {
        $nhap['ma_pn'] = $id;
        $nhap['ma_thuoc'] = $key;
        $nhap['ten_thuoc'] = $value[1];
        $nhap['so_luong'] = $value[2];
        $nhap['don_gia'] = $value[3];
        $nhap['thanh_tien'] = $value[2]*$value[3];
        $exp->insert('ctphieunhap', $nhap);
      }
    }
    $_SESSION["status"] = "success";
    header("location:../pages/nhaphang.php");
  }
  else {
    $_SESSION["status"] = "fail";
    header("location:../pages/nhaphang.php");
  }


}
else {
  $_SESSION["status"] = "fail";
  header("location:../pages/nhaphang.php");
}
 ?>
