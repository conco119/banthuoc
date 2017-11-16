<?php
ob_start();
session_start();
require('./common.php');


if(isset($_POST['submit'])) {

  $data['ten_ncc'] = $_POST['ten_ncc'];
  $data['sdt'] = $_POST['sdt'];
  $data['email'] = $_POST['email'];
  $data['dia_chi'] = $_POST['dia_chi'];
  $data['ghi_chu'] = $_POST['ghi_chu'];
  if($exp->update('nhacungcap', $data,"id={$_POST['id']}")) {
    $_SESSION["edit"] = "success";
    header("location:../pages/nhacungcap.php");
  };

}
else {
  $_SESSION["edit"] = "fail";
  header("location:../pages/nhacungcap.php");
}
 ?>
