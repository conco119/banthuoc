<?php
ob_start();
session_start();
require('./common.php');


if(isset($_POST['submit'])) {

  if($_POST['loai_khach'] == 1) {
    $data['cong_ty'] = $_POST['cong_ty'];
  }
  $data['ten'] = $_POST['ten'];
  $data['sdt'] = $_POST['sdt'];
  $data['loai_khach'] = $_POST['loai_khach'];
  $data['email'] = $_POST['email'];
  $data['dia_chi'] = $_POST['dia_chi'];
  $data['ngay_sinh'] = $_POST['ngay_sinh'];
  $data['gioi_tinh'] = $_POST['gioi_tinh'];
  $data['ghi_chu'] = $_POST['ghi_chu'];
  if($exp->update('khach_hang', $data,"id={$_POST['id']}")) {
    $_SESSION["edit"] = "success";
    header("location:../pages/khachhang.php");
  };

}
else {
  $_SESSION["edit"] = "fail";
  header("location:../pages/khachhang.php");
}
 ?>
