<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">
<script type="text/javascript">


</script>
<head>
    <?php require('../common/head.php'); ?>
    <?php $sothuoc = $exp->count_rows("select * from thuoc"); ?>
    <?php $hoadon = $exp->count_rows("select * from hoadon"); ?>
    <?php $loaithuoc = $exp->count_rows("select * from loaithuoc"); ?>
    <?php $phieunhap = $exp->count_rows("select * from phieu_nhap"); ?>
    <?php $khachhang = $exp->count_rows("select * from khach_hang"); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require('../common/nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <script type="text/javascript">
              $("#bam").trigger($.Event("keypress", { keyCode: 123 }));
            </script>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-medkit fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $sothuoc; ?></div>
                                    <div>Tổng số thuốc</div>
                                </div>
                            </div>
                        </div>
                        <a href="danhmuc.php">
                            <div class="panel-footer">
                                <span class="pull-left">Chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $hoadon; ?></div>
                                    <div>Tổng số hóa đơn</div>
                                </div>
                            </div>
                        </div>
                        <a href="hoadon1.php">
                            <div class="panel-footer">
                                <span class="pull-left">Chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $phieunhap ?></div>
                                    <div>Tổng số phiếu nhập</div>
                                </div>
                            </div>
                        </div>
                        <a href="phieunhaphang.php">
                            <div class="panel-footer">
                                <span class="pull-left">Chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $khachhang; ?></div>
                                    <div>Tổng số khách hàng</div>
                                </div>
                            </div>
                        </div>
                        <a href="khachhang.php">
                            <div class="panel-footer">
                                <span class="pull-left">Chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php require('../common/script.php'); ?>

</body>

</html>
