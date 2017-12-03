<?php
ob_start();
session_start();
require('./common.php');



if(isset($_POST['submit'])) {
  //check dieu kien

  if($_POST['tong_tien'] == '') {
    $_SESSION["status"] = "fail";
    header("location:../pages/hoadon.php");
    return;
  }
  if($_POST['ngay_nhap'] == '') {
    $_SESSION["status"] = "fail";
    header("location:../pages/hoadon.php");
    return;
  }


  $data['ma_nv'] = $_POST['manv'];
  if(!empty($_POST['ma_kh'])) {
    $data['ma_kh'] = $_POST['ma_kh'];
  }
  $data['ngay_ban'] = $_POST['ngay_nhap'];
  $data['ghi_chu'] = $_POST['ghi_chu'];
  $data['tong_tien'] = $_POST['tong_tien'];
  if(isset($_POST['thanh_toan'])) {
    $data['thanh_toan'] = 1;

  }else {
    $data['thanh_toan'] = 0;
  }
  if( $id = $exp->insert('hoadon', $data) ) {
    foreach($_POST as $key => $value) {
      if(is_numeric($key)) {
        $nhap['ma_hd'] = $id;
        $nhap['ma_thuoc'] = $key;
        $nhap['ten_thuoc'] = $value[1];
        $nhap['so_luong'] = $value[2];
        $nhap['don_gia'] = $value[3];
        $nhap['thanh_tien'] = $value[2]*$value[3];
        $exp->insert('cthoadon', $nhap);
        // chọn số lượng thuốc trong kho
        $thuoc = $exp->fetch_one(" select * from thuoc where id={$nhap["ma_thuoc"]}");
        $soluong = $thuoc['ton_kho'];
        // cộng thuốc từ phiếu nhập với số lượng ở kho
        $update['ton_kho'] = $soluong - $nhap['so_luong'];
        $exp->update('thuoc', $update,"id={$nhap["ma_thuoc"]}");
      }
    }
    $_SESSION["status"] = "success";
    header("location:../pages/hoadon.php");
  }
  else {
    $_SESSION["status"] = "fail";
    header("location:../pages/hoadon.php");
  }


}
else {
  $_SESSION["status"] = "fail";
  header("location:../pages/hoadon.php");
}
 ?>
