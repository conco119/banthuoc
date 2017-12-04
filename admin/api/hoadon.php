<?php
ob_start();
session_start();
require('./common.php');

$mahoadon = 0;

if(isset($_POST['submit'])) {
  //check dieu kien

  if($_POST['tong_tien'] == '') {
    $_SESSION["status"] = "fail";
    header("location:../pages/hoadon.php");
    return;
  }
  if($_POST['ngay_nhap'] == '') {
    $_SESSION["status"] = "fail";
    header("location:../pages/hoadon.php");
    return;
  }


  $data['ma_nv'] = $_POST['manv'];
  if(!empty($_POST['ma_kh'])) {
    $data['ma_kh'] = $_POST['ma_kh'];
  }
  $data['ngay_ban'] = $_POST['ngay_nhap'];
  $data['ghi_chu'] = $_POST['ghi_chu'];
  $data['tong_tien'] = $_POST['tong_tien'];
  if(isset($_POST['thanh_toan'])) {
    $data['thanh_toan'] = 1;

  }else {
    $data['thanh_toan'] = 0;
  }
  $mahoadon = $exp->insert('hoadon', $data);
  if( $mahoadon ) {
    foreach($_POST as $key => $value) {
      if(is_numeric($key)) {
        $nhap['ma_hd'] = $mahoadon;
        $nhap['ma_thuoc'] = $key;
        $nhap['ten_thuoc'] = $value[1];
        $nhap['so_luong'] = $value[2];
        $nhap['don_gia'] = $value[3];
        $nhap['thanh_tien'] = $value[2]*$value[3];
        $exp->insert('cthoadon', $nhap);
        // chọn số lượng thuốc trong kho
        $thuoc = $exp->fetch_one(" select * from thuoc where id={$nhap["ma_thuoc"]}");
        $soluong = $thuoc['ton_kho'];
        // cộng thuốc từ phiếu nhập với số lượng ở kho
        $update['ton_kho'] = $soluong - $nhap['so_luong'];
        $exp->update('thuoc', $update,"id={$nhap["ma_thuoc"]}");
      }
    }
    // $_SESSION["status"] = "success";
    // header("location:../pages/hoadon.php");
  }



}

 ?>







 <!DOCTYPE html>

 <html lang="en">

 <head>
     <?php require('../common/head2.php'); ?>
     <?php

       $nguoidung = $exp->fetch_one("select * from nguoidung where id={$_POST['manv']}");
       $khachhang = $exp->fetch_one(" select * from khach_hang where id={$_POST['ma_kh']}");
      ?>
     <link rel="stylesheet" href="../dist/css/hoadon.css">
     <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
     <style media="screen">
       p {
         margin-top: 5px;
       }
     </style>
 </head>
 <body>

     <div id="wrapper">


         <!-- Navigation -->

         <!-- Page Content -->
         <!-- /#page-wrapper -->
         <div id="page-wrapper" style='margin:0px'>

           <div class="grey">
             <div class="row header">
                <a href="../pages/hoadon.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Bán hàng  </a>  
               <div class="col-md-12">
                 <h2 style='text-align:center' class='title'>HÓA ĐƠN BÁN HÀNG</h2>
                 <h4 style='text-align:center' class='title'>HDWW</h4>

               </div>
               <div class="col-md-12 right">
                 <!-- <button class='btn btn-default' type="button" name="button" data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-plus'></i>Chọn thuốc</button> -->
                 <!-- <button class='btn btn-default' type="button" name="button"><i class='	glyphicon glyphicon-export'></i> Xuất file</button> -->


               </div>
             </div>
             <h5 style='text-align:center'>--------------------------------------------------------------------------------------------------------------------------------------</h5>
           <form method='post' action='../api/hoadon.php'>
             <div class="row">
               <div class="col-md-12" id="data">
                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr align="center">
                                  <th>Mã thuốc</th>
                                  <td> <strong>Tên thuốc</strong> </td>
                                  <td> <strong>Số lượng</strong> </td>
                                  <td>  <strong>Đơn giá</strong> </td>
                                  <td> <strong>Thành tiền</strong> </td>
                              </tr>
                          </thead>
                          <tbody id="mathang">
                            <?php
                              if( $mahoadon ):
                                foreach($_POST as $key => $value):
                                  if(is_numeric($key)):
                            ?>
                            <tr id=${id} class="odd gradeX" align="center">

                              <td>
                                <?php echo $key; ?>
                              </td>
                              <td>
                                <?php echo $value['1']; ?>
                              </td>
                              <td>
                                <?php echo $value['2']; ?>
                              </td>
                              <td>
                                <?php echo $value['3']; ?>
                              </td>
                              <td>
                                <?php echo $value[2]*$value[3]; ?>
                              </td>
                            </tr>
                          <?php endif ?>
                          <?php endforeach ?>
                          <?php endif ?>
                          </tbody>
                      </table>
               </div>
             </div>
             <div class="row header">
               <div class="form-horizontal">
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="email">Người bán: </label>
                   <div class="col-sm-10">
                     <p class='reset'><?php echo $nguoidung['ten_nv']; ?></p>
                   </div>
                 </div>




                   <div class="form-group">
                     <label class="control-label col-sm-2" for="email">   Ngày:</label>
                     <div class="col-sm-10">
                       <h5><?php  echo $_POST['ngay_nhap']; ?></h5>
                     </div>
                   </div>



                     <div class="form-group">
                       <label class="control-label col-sm-2" for="pwd">  </i>Khách hàng: </label>
                       <div class="col-sm-10">
                         <div class="form-inline">
                           <h5><?php echo $khachhang['ten'] ? $khachhang['ten'] : "Khách lẻ" ?></h5>

                         </div>

                       </div>
                     </div>


                 <div class="form-group">
                   <label class="control-label col-sm-2" for="pwd">  </i>Tổng tiền:</label>
                   <div class="col-sm-10">
                    <h5><?php echo $_POST['tong_tien']; ?></h5>
                   </div>
                 </div>








             </div>
           </form>
           </div>
             <!-- /.row -->
         </div>
     <!-- /#wrapper -->

     <!-- jQuery -->
     <?php require('../common/script.php'); ?>
     <script src="../../library/DataTables/media/js/jquery.dataTables.min.js"></script>
     <script src="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

     <!-- Page-Level Demo Scripts - Tables - Use for reference -->
     <script>

     </script>
     <script type="text/javascript">




     </script>
 </body>

 </html>
