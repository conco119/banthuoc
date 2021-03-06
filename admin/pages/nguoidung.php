<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <?php
    if( $_SESSION['quyen'] != 1)
      {
        header("location:info.php");
      }
      $nguoidung = $exp->fetch_all("select * from nguoidung");
     ?>
    <link rel="stylesheet" href="../dist/css/nguoidung.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">

      <!-- Modal them nhan vien -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/themnguoidung.php' class="form-horizontal"  >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm người dùng</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="panel panel-default">




                              <!-- Tab panes -->


                                    <div class="row">
                                      <div class="col-md-6">
                                        <br>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Tên nhân viên</label>
                                            <div class="col-sm-8">
                                              <input name='ten_nv' class="form-control"  placeholder="Tên nhân viên" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập tên nhân viên ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Ngày sinh</label>
                                            <div class="col-sm-8">
                                              <input id='ngay_sinh' name='ngay_sinh' type='text'   class="form-control"  placeholder="Tên nhân viên" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập ngày sinh ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Địa chỉ</label>
                                            <div class="col-sm-8">
                                              <input name='dia_chi' type='text' class="form-control"  placeholder="Địa chỉ" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập địa chỉ ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Số điện thoại</label>
                                            <div class="col-sm-8">
                                              <input name='sdt' type='number' class="form-control"  placeholder="Số điện thoại" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập số điện thoại ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                        <br>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Số chứng minh nhân dân</label>
                                            <div class="col-sm-8">
                                              <input name='cmnd' class="form-control"  placeholder="Số chứng minh nhân dân" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập số chứng minh nhân dân')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                           <div class="form-group">

                                               <label class='col-sm-4 control-label'>Chức vụ</label>
                                               <div class='col-sm-8'>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="quyen"  value="1" checked>Quản lý
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="quyen"  value="2">Dược sĩ
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="quyen"  value="3">Nhân viên bán hàng
                                                    </label>
                                                </div>
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

      <!-- Modal sua nhan vien -->
      <div class="modal fade" id='suanguoidung' role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/suanguoidung.php' class="form-horizontal"   >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa thông tin người dùng</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="panel panel-default">




                              <!-- Tab panes -->



                                    <div class="row">
                                      <div class="col-md-6">
                                        <br>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Tên nhân viên</label>
                                            <div class="col-sm-8">
                                              <input id='sua_id' type="hidden" name="id" value="">
                                              <input id='sua_ten_nv' name='ten_nv' class="form-control"  placeholder="Tên nhân viên" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập tên nhân viên ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Ngày sinh</label>
                                            <div class="col-sm-8">
                                              <input id='sua_ngay_sinh' name='ngay_sinh' type='text' class="form-control"  placeholder="Tên nhân viên" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập ngày sinh ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Địa chỉ</label>
                                            <div class="col-sm-8">
                                              <input id='sua_dia_chi' name='dia_chi' type='text' class="form-control"  placeholder="Địa chỉ" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập địa chỉ ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Số điện thoại</label>
                                            <div class="col-sm-8">
                                              <input id='sua_sdt' name='sdt' type='number' class="form-control"  placeholder="Số điện thoại" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập số điện thoại ')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                        <br>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Số chứng minh nhân dân</label>
                                            <div class="col-sm-8">
                                              <input id='sua_cmnd' name='cmnd' class="form-control"  placeholder="Số chứng minh nhân dân" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập số chứng minh nhân dân')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                           <div class="form-group">

                                               <label class='col-sm-4 control-label'>Chức vụ</label>
                                               <div id='quyencheck' class='col-sm-8 '>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="quyen" id="optionsRadios1" value="1" >Quản lý
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="quyen" id="optionsRadios2" value="2">Dược sĩ
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="quyen" id="optionsRadios3" value="3">Nhân viên bán hàng
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label  class="col-sm-4 control-label">Tài khoản</label>
                                          <div class="col-sm-8">
                                            <input id='sua_username' name='username' class="form-control"   required=""
                                            oninvalid="this.setCustomValidity('Chưa nhập tài khoản')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label  class="col-sm-4 control-label">Mật khẩu</label>
                                          <div class="col-sm-8">
                                            <input id='sua_password' name='password' class="form-control"  required=""
                                            oninvalid="this.setCustomValidity('Chưa nhập mật khẩu')"
                                            oninput="setCustomValidity('')"
                                            >
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
                <h2 class='title'>Danh sách người dùng</h2>
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
                <button class='btn btn-default' type="button" name="button" data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-plus'></i> Thêm người dùng</button>
                <button class='btn btn-default' type="button" name="button"><i class='	glyphicon glyphicon-export'></i> Xuất file</button>


              </div>
            </div>
            <div class="row">
              <div class="col-md-12" id="data">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         <thead>
                             <tr align="center">
                                 <th>Mã nhân viên</th>
                                 <td> <strong>Tên nhân viên</strong> </td>
                                 <td> <strong>Ngày sinh</strong> </td>
                                 <td> <strong>Địa chỉ</strong> </td>
                                 <td> <strong>Số điện thoại</strong> </td>
                                 <td> <strong>Số chứng minh nhân dân</strong> </td>
                                 <td> <strong>Chức vụ</strong> </td>
                                 <td> <strong>Xóa</strong> </td>
                                 <td> <strong>Sửa</strong> </td>
                             </tr>
                         </thead>
                         <tbody id="data">
                           <?php foreach($nguoidung as $key => $value): ?>
                             <tr class="odd gradeX" align="center">
                                 <td><?php echo $value['id']; ?></td>
                                 <td><?php echo $value['ten_nv']; ?></td>
                                 <td><?php echo $value['ngay_sinh']; ?></td>
                                 <td><?php echo $value['dia_chi']; ?></td>
                                 <td><?php echo $value['sdt']; ?></td>
                                 <td><?php echo $value['cmnd']; ?></td>
                                 <td>
                                    <?php
                                     switch($value['quyen']) {
                                      case 1: echo "Quản lý";
                                              break;
                                      case 2: echo "Dược sĩ";
                                              break;
                                      case 3: echo "Nhân viên bán hàng";
                                              break;
                                     }
                                    ?>
                                 </td>
                                 <td class="center"><i style='color:red;' class="fa fa-trash-o  fa-fw"></i><a href="../api/xoanguoidung.php?id=<?php echo $value['id']; ?>" class='delete' onclick="return confirm('Bạn có chắc không?')"  style='color:red;' href="#"> Xóa</a></td>
                                 <td class="center">
                                   <i  class="fa fa-pencil fa-fw"></i>
                                   <a class='edit' data-toggle="modal" data-target="#suanguoidung"  href="#"
                                      data-id=<?php echo $value['id']; ?>
                                      data-ten_nv="<?php echo $value['ten_nv']; ?>"
                                      data-ngay_sinh=<?php echo $value['ngay_sinh']; ?>
                                      data-dia_chi="<?php echo $value['dia_chi']; ?>"
                                      data-sdt=<?php echo $value['sdt']; ?>
                                      data-cmnd=<?php echo $value['cmnd']; ?>
                                      data-quyen=<?php echo $value['quyen']; ?>
                                      <?php $account = $exp->fetch_one(" select * from taikhoan where ma_nv={$value['id']} "); ?>
                                      data-username="<?php echo $account['username']; ?>"
                                      data-password="<?php echo $account['password']; ?>"
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

            $( "#ngay_sinh" ).datepicker({dateFormat: "yy-mm-dd"});
            $( "#sua_ngay_sinh" ).datepicker({dateFormat: "yy-mm-dd"});
          })

          $('body').delegate('.edit','click',function() {

              $('#sua_id').val($(this).data('id'))
              $('#sua_ten_nv').val($(this).data('ten_nv'))
              $('#sua_ngay_sinh').val($(this).data('ngay_sinh'))
              $('#sua_dia_chi').val($(this).data('dia_chi'))
              $('#sua_sdt').val($(this).data('sdt'))
              $('#sua_cmnd').val($(this).data('cmnd'))
              $('#sua_username').val($(this).data('username'))
              $('#sua_password').val($(this).data('password'))
              let quyen = $(this).data('quyen')

              switch(quyen) {
                case 1:
                  $('#optionsRadios1').attr('checked',"")
                  break
                case 2:
                  $('#optionsRadios2').attr('checked',"")
                  break
                case 3:
                  $('#optionsRadios3').attr('checked',"")
                  break
              }

          })

          $('#suanguoidung').on('hidden.bs.modal', function () {
              let selected = $(`#quyencheck input[checked='checked'`)
              $(selected).removeAttr("checked");
          })

    </script>
</body>

</html>
