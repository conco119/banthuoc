<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <?php
      $phieunhap = $exp->fetch_all("select * from phieu_nhap");
     ?>
    <link rel="stylesheet" href="../dist/css/phieunhap.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">
      <?php foreach($phieunhap as $key => $value): ?>
      <!-- Modal them loai thuoc -->
      <div class="modal fade" id="<?php echo "a".$value['id']; ?>" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/themloaithuoc.php' class="form-horizontal"   >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết phiếu nhập</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="panel panel-default">




                              <!-- Tab panes -->




                                    <table class="table table-striped table-bordered table-hover" >
                                             <thead>
                                                 <tr align="center">
                                                     <th> <strong>Mã thuốc</strong> </th>
                                                     <td> <strong>Tên thuốc</strong> </td>
                                                     <td> <strong>Số lượng</strong> </td>
                                                     <td> <strong>Đơn giá</strong> </td>
                                                     <td> <strong>Thành tiền</strong> </td>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                               <?php $ctphieunhap = $exp->fetch_all(" select * from ctphieunhap where ma_pn={$value["id"]}"); ?>
                                               <?php foreach($ctphieunhap as $key => $value): ?>
                                                 <tr class="odd gradeX" align="center">
                                                     <td><?php echo $value['ma_thuoc']; ?></td>
                                                     <td><?php echo $value['ten_thuoc']; ?></td>
                                                     <td><?php echo $value['so_luong']; ?></td>
                                                     <td><?php echo $value['don_gia']; ?></td>
                                                     <td><?php echo $value['thanh_tien']."  - VNĐ"; ?></td>
                                                 </tr>
                                              <?php endforeach; ?>
                                             </tbody>
                                         </table>


                          <!-- /.panel-body -->
                      </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i>Hủy</button>
            </div>
          </div>
          </form>

        </div>
      </div>

    <?php endforeach; ?>



        <!-- Navigation -->
        <?php require('../common/nav.php'); ?>

        <!-- Page Content -->
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
          <div class="grey">
            <div class="row header">
              <div class="col-md-6">
                <h2 class='title'>Phiếu nhập hàng</h2>
                <?php if(isset($_SESSION["status"])) {  ?>

                 <?php if($_SESSION['status'] == "success") { ?>
                   <div class="alert alert-success">
                     Thêm thành công
                   </div>


                <?php }  else { ?>
                   <div class="alert alert-danger">
                     Thêm không thành công
                   </div>
                 <?php } ?>
                 <?php unset($_SESSION['status']); ?>

               <?php } ?>
               <!-- xoa thuoc -->
               <?php if(isset($_SESSION["delete"])) {  ?>

                <?php if($_SESSION['delete'] == "success") { ?>
                  <div class="alert alert-success">
                    Xóa thành công
                  </div>


               <?php }  else { ?>
                  <div class="alert alert-danger">
                    Xóa không thành công
                  </div>
                <?php } ?>
                <?php unset($_SESSION['delete']); ?>

              <?php } ?>
              <!-- sua thuoc  -->
              <?php if(isset($_SESSION["edit"])) {  ?>

               <?php if($_SESSION['edit'] == "success") { ?>
                 <div class="alert alert-success">
                   Sửa thành công
                 </div>


              <?php }  else { ?>
                 <div class="alert alert-danger">
                   Sửa không thành công
                 </div>
               <?php } ?>
               <?php unset($_SESSION['edit']); ?>

             <?php } ?>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12" id="data">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         <thead>
                             <tr align="center">
                                 <th> <strong>Mã phiếu nhập</strong> </th>
                                 <td> <strong>Thời gian</strong> </td>
                                 <td> <strong>Nhà cung cấp</strong> </td>
                                 <td> <strong>Người nhập</strong> </td>
                                 <td> <strong>Thanh toán</strong> </td>
                                 <td> <strong>Tổng tiền</strong> </td>
                                 <td> <strong>Chi tiết</strong> </td>
                             </tr>
                         </thead>
                         <tbody>
                           <?php foreach($phieunhap as $key => $value): ?>
                             <tr class="odd gradeX" align="center">
                                 <td><?php echo $value['id']; ?></td>
                                 <td><?php echo $value['time']; ?></td>
                                 <td>
                                   <?php $ncc = $exp->fetch_one(" select * from nhacungcap where id={$value["ma_ncc"]} "); ?>
                                   <?php echo $ncc['ten_ncc']; ?>
                                 </td>
                                 <td>
                                   <?php $nguoidung = $exp->fetch_one(" select * from nguoidung where id={$value["ma_nv"]} "); ?>
                                   <?php echo $nguoidung['ten_nv']; ?>
                                 </td>
                                 <td>
                                   <?php
                                      if( $value['thanh_toan'] ==1 )
                                        echo "<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
                                      else
                                        echo "<i style='color:red' class='fa fa-times' aria-hidden='true'></i>";
                                     ?>
                                 </td>
                                 <td>
                                   <?php echo $value['tong_tien']; ?>
                                 </td>
                                 <td class="center">
                                   <i class="fa fa-info" aria-hidden="true"></i>
                                   <a class='edit' data-toggle="modal" data-target="<?php echo "#a".$value['id']; ?>"  href="#"

                                    >Chi tiết</a>
                                 </td>
                             </tr>
                          <?php endforeach; ?>
                         </tbody>
                     </table>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ mỗi trang",
                    "zeroRecords": "Không có dữ liệu ",
                    "info": "Trang  _PAGE_ trên _PAGES_",
                    "infoEmpty": "Không có dữ liệu phù hợp",
                    "infoFiltered": "(lọc từ _MAX_ bản ghi)",
                    "search": "Tìm kiếm",
                    "paginate": {
                       "first":      "Đầu",
                       "last":       "Cuối",
                       "next":       "Trước",
                       "previous":   "Sau"
                   },
                }
        });
    });
    </script>
    <script type="text/javascript">

          // open modal from other pages
          $(document).ready(function() {
            var $_GET = <?php echo json_encode($_GET); ?>;
            if($_GET['modal'] == "yes") {
                $("#myModal").modal("show");
            }
          })

          $(document).ready(function() {
            $('.edit').click(function() {
              $('#suaten').val($(this).data('ten'))
              $('#sua_id').val($(this).data('id'))
            })
          })





    </script>
</body>

</html>
