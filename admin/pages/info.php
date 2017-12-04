<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <?php
      $nguoidung = $exp->fetch_one("select * from nguoidung where id={$_SESSION['ma_nv']}");
     ?>
    <link rel="stylesheet" href="../dist/css/nguoidung.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">




        <!-- Navigation -->
        <?php require('../common/nav.php'); ?>

        <!-- Page Content -->
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
          <div class="grey">


            <div class="container">
      <div class="row">
        <br>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION['ten_nv']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../images/user.png" class="img-circle img-responsive"> </div>

                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Mã nhân viên: </td>
                        <td><?php echo $_SESSION['ma_nv']; ?></td>
                      </tr>
                      <tr>
                        <td>Ngày sinh: </td>
                        <td><?php echo $nguoidung['ngay_sinh']; ?></td>
                      </tr>
                      <tr>
                        <td>Địa chỉ: </td>
                        <td><?php echo $nguoidung['dia_chi']; ?></td>
                      </tr>

                         <tr>
                             <tr>
                        <td>Số điện thoại: </td>
                        <td><?php echo $nguoidung['sdt']; ?></td>
                      </tr>
                        <tr>
                        <td>Số chứng minh nhân dân: </td>
                        <td><?php echo $nguoidung['cmnd']; ?></td>
                      </tr>
                      <tr>
                        <td>Chức vụ</td>
                        <td><?php
                          if($nguoidung['quyen'] == 1)
                            echo "Quản lý";
                          elseif($nguoidung['quyen'] == 2)
                            echo "Dược sĩ";
                          else
                            echo "Nhân viên";
                        ?></td>
                      </tr>

                      </tr>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>


            <!-- /.row -->
        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php require('../common/script.php'); ?>
    <script src="../../library/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>

</html>
