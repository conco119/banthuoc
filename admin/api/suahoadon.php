<?php
ob_start();
session_start();
require('./common.php');



if(isset($_POST['submit'])) {


  if(isset($_POST['thanh_toan'])) {
    $data['thanh_toan'] = 1;
    $exp->update('hoadon', $data,"id={$_POST['ma_hd']}");
  }
  else {
    $data['thanh_toan'] = 0;
    $exp->update('hoadon', $data,"id={$_POST['ma_hd']}");
  }


  $_SESSION["edit"] = "success";
  header("location:../pages/hoadon1.php");

}
else {
  $_SESSION["edit"] = "fail";
  header("location:../pages/hoadon1.php");
}
 ?>
