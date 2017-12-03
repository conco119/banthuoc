<?php
  ob_start();
  session_start();
  require('./common.php');

  if(isset($_POST['submit'])) {
    if( $_POST['loai_khach'] == 1 ) // 1 là tổ chức, 0 là cá nhân
     {
       $data['cong_ty'] = $_POST['cong_ty'];
     }
    $data['loai_khach'] = $_POST['loai_khach'];
    $data['ten'] = $_POST['ten'];
    $data['sdt'] = $_POST['sdt'];
    $data['email'] = $_POST['email'];
    $data['dia_chi'] = $_POST['dia_chi'];
    $data['gioi_tinh'] = $_POST['gioi_tinh'];
    $data['ghi_chu'] = $_POST['ghi_chu'];
    $exp->insert('khach_hang',$data);
    $_SESSION["status"] = "success";
    header("location:../pages/khachhang.php");
  }
  else {
    $_SESSION["status"] = "fail";
    header("location:../pages/khachhang.php");
  }
 ?>
