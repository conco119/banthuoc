<?php
ob_start();
session_start();
require('./common.php');


if(isset($_POST['submit'])) {

  $data['ten'] = $_POST['ten'];
  if($exp->update('loaithuoc', $data,"id={$_POST['id']}")) {
    $_SESSION["edit"] = "success";
    header("location:../pages/loaithuoc.php");
  };

}
else {
  $_SESSION["edit"] = "fail";
  header("location:../pages/loaithuoc.php");
}
 ?>
