<?php
  ob_start();
  session_start();
  require('./common.php');

  if(isset($_POST['submit'])) {
    $data['ten_nv'] = $_POST['ten_nv'];
    $data['ngay_sinh'] = $_POST['ngay_sinh'];
    $data['dia_chi'] = $_POST['dia_chi'];
    $data['sdt'] = $_POST['sdt'];
    $data['cmnd'] = $_POST['cmnd'];
    $data['quyen'] = $_POST['quyen'];
    $idtaikhoan = $exp->insert('nguoidung',$data);
    $account['username'] = $idtaikhoan;
    $account['password'] = $idtaikhoan;
    $account['ma_nv'] = $idtaikhoan;
    $exp->insert('taikhoan',$account);
    $_SESSION["status"] = "success";
    header("location:../pages/nguoidung.php");
    var_dump($_SESSION);
  }
  else {
    $_SESSION["status"] = "fail";
    header("location:../pages/nguoidung.php");
  }
 ?>
