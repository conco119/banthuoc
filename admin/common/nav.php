
<?php
  if(!isset($_SESSION['quyen']))
  header("location:login.php");
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Quản lý bán thuốc</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">

                <li>
                    <a href="hoadon.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Bán thuốc</a>
                </li>
                <?php if($_SESSION['quyen'] == 1): ?>
                <li>
                  <a href="nguoidung.php"><i class="fa fa-user fa-fw"></i>Quản lý người dùng</a>
                </li>
                <?php endif ?>
                <li><a href="info.php"><i class="fa fa-user fa-fw"></i>Thông tin người dùng</a>
                </li>
                <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i>Cài đặt</a>
                </li> -->
                <li class="divider"></li>
                <li><a href="../api/logout.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                </li>

            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Tổng quan</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-medkit" aria-hidden="true"></i></i> Thuốc<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <?php if($_SESSION['quyen'] != 3): ?>
                        <li>
                            <a href="danhmuc.php">Danh mục</a>
                        </li>

                        <li>
                            <a href="loaithuoc.php">Loại thuốc</a>
                        </li>
                        <?php endif ?>
                        <!-- <li>
                            <a href="morris.php">Thiết lập giá</a>
                        </li>
                        <li>
                            <a href="flot.php">Kiểm kho(flot.php)</a>
                        </li> -->
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i></i> Đối tác<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="khachhang.php">Khách hàng</a>
                        </li>
                        <?php if($_SESSION['quyen'] != 3): ?>
                        <li>
                            <a href="nhacungcap.php">Nhà cung cấp</a>
                        </li>
                      <?php endif ?>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> Giao dịch<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <?php if($_SESSION['quyen'] != 3): ?>
                        <li>
                            <a href="nhaphang.php">Nhập hàng</a>
                        </li>
                        <li>
                            <a href="phieunhaphang.php">Phiếu nhập hàng</a>
                        </li>
                        <li>
                            <a href="hoadon1.php">Hóa đơn</a>
                        </li>
                      <?php endif ?>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- <li>
                    <a href="tables.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li> -->
                <!-- <li>
                    <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
                </li> -->
                <!-- <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="panels-wells.php">Panels and Wells</a>
                        </li>
                        <li>
                            <a href="buttons.php">Buttons</a>
                        </li>
                        <li>
                            <a href="notifications.php">Notifications</a>
                        </li>
                        <li>
                            <a href="typography.php">Typography</a>
                        </li>
                        <li>
                            <a href="icons.php"> Icons</a>
                        </li>
                        <li>
                            <a href="grid.php">Grid</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            /.nav-third-level
                        </li>
                    </ul>
                    /.nav-second-level
                </li> -->
                <!-- <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.php">Blank Page</a>
                        </li>
                        <li>
                            <a href="login.php">Login Page</a>
                        </li>
                    </ul>
                    /.nav-second-level
                </li> -->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
