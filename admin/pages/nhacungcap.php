<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <?php
      $ncc = $exp->fetch_all("select * from nhacungcap");
     ?>
    <link rel="stylesheet" href="../dist/css/nhacungcap.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">

      <!-- Modal them loai thuoc -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/nhacungcap/them.php' class="form-horizontal" id='themthuocform'  >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm nhà cung cấp</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="panel panel-default">




                              <!-- Tab panes -->


                                    <div class="row">
                                      <div class="col-md-5">
                                        <br>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Tên nhà cung cấp</label>
                                            <div class="col-sm-8">
                                              <input name='ten_ncc' class="form-control"  placeholder="Tên nhà cung cấp" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập tên nhà cung cấp')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Số điện thoại</label>
                                            <div class="col-sm-8">
                                              <input name='sdt' class="form-control"  placeholder="Số điện thoại">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                              <input name='email' class="form-control"  placeholder="Email">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Địa chỉ</label>
                                            <div class="col-sm-8">
                                              <input name='dia_chi' class="form-control"  placeholder="Địa chỉ">
                                            </div>
                                          </div>
                                      </div>

                                      <div class="col-md-7">
                                        <br>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Ghi chú</label>
                                            <div class="col-sm-8">
                                            <textarea class='form-control' name="ghi_chu" rows="8" cols="80"></textarea>
                                            </div>
                                          </div>
                                      </div>
                                    </div>



                          <!-- /.panel-body -->
                      </div>
            </div>
            <div class="modal-footer">
              <button  type='submit' name='submit' class="btn btn-success"><i class='glyphicon glyphicon-floppy-disk'></i>  Thêm mới</button>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i>Hủy</button>
            </div>
          </div>
          </form>

        </div>
      </div>

      <!-- Modal sua loai thuoc -->
      <div class="modal fade" id="suanhacungcap" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/nhacungcap/sua.php' class="form-horizontal"   >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa nhà cung cấp</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="panel panel-default">




                              <!-- Tab panes -->


                              <div class="row">
                                <div class="col-md-5">
                                  <br>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Tên nhà cung cấp</label>
                                      <div class="col-sm-8">
                                        <input name='ten_ncc' class="form-control"  placeholder="Tên nhà cung cấp" required=""
                                        oninvalid="this.setCustomValidity('Chưa nhập tên nhà cung cấp')"
                                        oninput="setCustomValidity('')"
                                        >
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Số điện thoại</label>
                                      <div class="col-sm-8">
                                        <input name='sdt' class="form-control"  placeholder="Số điện thoại">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Email</label>
                                      <div class="col-sm-8">
                                        <input name='email' class="form-control"  placeholder="Email">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Địa chỉ</label>
                                      <div class="col-sm-8">
                                        <input name='dia_chi' class="form-control"  placeholder="Địa chỉ">
                                      </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                  <br>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Ghi chú</label>
                                      <div class="col-sm-8">
                                      <textarea class='form-control' name="ghi_chu" rows="8" cols="80"></textarea>
                                      </div>
                                    </div>
                                </div>
                              </div>



                          <!-- /.panel-body -->
                      </div>
            </div>
            <div class="modal-footer">
              <button  type='submit' name='submit' class="btn btn-success"><i class='glyphicon glyphicon-floppy-disk'></i>Sửa</button>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i>Hủy</button>
            </div>
          </div>
          </form>

        </div>
      </div>



        <!-- Navigation -->
        <?php require('../common/nav.php'); ?>

        <!-- Page Content -->
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
          <div class="grey">
            <div class="row header">
              <div class="col-md-6">
                <h2 class='title'>Danh mục nhà cung cấp</h2>
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
              <div class="col-md-6 right">
                <button class='btn btn-default' type="button" name="button" data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-plus'></i>  Thêm loại thuốc</button>
                <button class='btn btn-default' type="button" name="button"><i class='	glyphicon glyphicon-export'></i> Xuất file</button>


              </div>
            </div>
            <div class="row">
              <div class="col-md-12" id="data">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         <thead>
                             <tr align="center">
                                 <th>Mã nhà cung cấp</th>
                                 <td>Tên nhà cung cấp</td>
                                 <td>Số điện thoại</td>
                                 <td>Email</td>
                                 <td>Địa chỉ</td>
                                 <td>Xóa</td>
                                 <td>Sửa</td>
                             </tr>
                         </thead>
                         <tbody id="data">
                           <?php foreach($ncc as $key => $value): ?>
                             <tr class="odd gradeX" align="center">
                                 <td><?php echo $value['id']; ?></td>
                                 <td><?php echo $value['ten_ncc']; ?></td>
                                 <td><?php echo $value['sdt']; ?></td>
                                 <td><?php echo $value['email']; ?></td>
                                 <td><?php echo $value['dia_chi']; ?></td>
                                 <td class="center"><i style='color:red;' class="fa fa-trash-o  fa-fw"></i><a href="../api/nhacungcap/xoa.php?id=<?php echo $value['id']; ?>" class='delete' onclick="return confirm('Bạn có chắc không?')"  style='color:red;' href="#"> Xóa</a></td>
                                 <td class="center">
                                   <i  class="fa fa-pencil fa-fw"></i>
                                   <a class='edit' data-toggle="modal" data-target="#suanhacungcap"  href="#"
                                      data-id=<?php echo $value['id']; ?>
                                      data-ten="<?php echo $value['ten_ncc']; ?>"
                                      data-sdt="<?php echo $value['sdt']; ?>"
                                      data-email="<?php echo $value['email']; ?>"
                                      data-dia_chi="<?php echo $value['dia_chi']; ?>"
                                    >Sửa</a>
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
                    "infoEmpty": "No records available",
                    "infoFiltered": "(lọc từ _MAX_ bản ghi)",
                    "search": "Tìm kiếm",
                    "paginate": {
                       "first":      "Frist",
                       "last":       "Last",
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
