<?php
  ob_start();
  session_start();
  require('./common.php');
  if(isset($_POST['submit'])) {
    $data['ten'] = $_POST['ten'];
    $exp->insert('loaithuoc',$data);
    $_SESSION["status"] = "success";
    header("location:../pages/loaithuoc.php");
    var_dump($_SESSION);
  }
  else {
    $_SESSION["status"] = "fail";
    header("location:../pages/danhmuc.php");
  }
 ?>
