<?php
  ob_start();
  session_start();
  require('./common.php');
  if(isset($_POST['submit'])) {

    if(isset($_POST['theo_don'])) {
      $data['theo_don'] = 1;

    }else {
      $data['theo_don'] = 0;
    }
    $data['ten_thuoc'] = $_POST['ten_thuoc'];
    $data['ma_loai_thuoc'] = $_POST['ma_loai_thuoc'];
    $data['gia_ban'] = $_POST['gia_ban'];
    $data['gia_von'] = $_POST['gia_von'];
    $data['ghi_chu'] = $_POST['note'];
    $data['giam_gia'] = 0;
    $data['ton_kho'] = 0;
    $data['ma_trang_thai'] = 1;
    $id = $exp->insert('thuoc', $data);

    $connect = mysqli_connect($tenserver, $tentaikhoan, $matkhau, $tencsdl);


    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "UPDATE  thuoc SET anh = '$file' where id = '{$id}' ";
    if(mysqli_query($connect, $query)) {
      $_SESSION["status"] = "success";
    };
      header("location:../pages/danhmuc.php");
  }
  else {
    $_SESSION["status"] = "fail";
    header("location:../pages/danhmuc.php?fail");
  }

 ?>
