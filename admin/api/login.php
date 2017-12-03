<?php
ob_start();
session_start();
require('./common.php');





  if(isset($_POST["submit"]))
  {


      $sql = "SELECT * FROM taikhoan where username='{$_POST['username']}'
        and password='{$_POST['password']}' ";
      if($r=$exp->fetch_one($sql))
        {
          $_SESSION["ma_nv"] = $r["ma_nv"];
          $nguoidung = $exp->fetch_one(" select * from nguoidung where id={$r['ma_nv']}");
          $_SESSION['ten_nv'] =$nguoidung["ten_nv"];
          $_SESSION['quyen'] =$nguoidung["quyen"];
          header("location:../pages/info.php");
        }
        else
          header("location:../pages/login.php?wrong");

  }




?>
