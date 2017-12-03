<?php
ob_start();
session_start();
require('./common.php');



if(isset($_POST['submit'])) {


  if(isset($_POST['thanh_toan'])) {
    $data['thanh_toan'] = 1;
    $exp->update('phieu_nhap', $data,"id={$_POST['ma_pn']}");
  }
  else {
    $data['thanh_toan'] = 0;
    $exp->update('phieu_nhap', $data,"id={$_POST['ma_pn']}");
  }


  $_SESSION["edit"] = "success";
  header("location:../pages/phieunhaphang.php");

}
else {
  $_SESSION["edit"] = "fail";
  header("location:../pages/phieunhaphang.php");
}
 ?>
