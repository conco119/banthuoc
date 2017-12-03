<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <?php
      $khachhang = $exp->fetch_all("select * from khach_hang");
     ?>
    <link rel="stylesheet" href="../dist/css/khachhang.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">

      <!-- Modal them loai thuoc -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/themkhachhang.php' class="form-horizontal" id='themthuocform'  >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm khách hàng</h4>
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
                                              <label class="col-sm-4 control-label">Loại khách</label>
                                              <label  class="radio-inline">
                                                  <input id='canhan' type="radio" name="loai_khach"  value="0">Cá nhân
                                              </label>
                                              <label  class="radio-inline">
                                                  <input id='tochuc' type="radio" name="loai_khach"  value="1">Tổ chức
                                              </label>
                                          </div>
                                          <div class="form-group" id='congty'>
                                            <label  class="col-sm-4 control-label">Công ty</label>
                                            <div class="col-sm-8">
                                              <input name='cong_ty' class="form-control"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Tên khách hàng</label>
                                            <div class="col-sm-8">
                                              <input name='ten' class="form-control"  placeholder="Tên khách hàng" required=""
                                              oninvalid="this.setCustomValidity('Chưa nhập tên khách hàng')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Số điện thoại</label>
                                            <div class="col-sm-8">
                                              <input name='sdt' class="form-control" type='number'  placeholder="Số điện thoại">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Ngày sinh</label>
                                            <div class="col-sm-8">
                                              <input name='ngay_sinh' required="" type="date" class="form-control"
                                              oninvalid="this.setCustomValidity('Chưa nhập sinh')"
                                              oninput="setCustomValidity('')"
                                              >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Địa chỉ</label>
                                            <div class="col-sm-8">
                                              <input name='dia_chi' type='text' class="form-control"  placeholder="Địa chỉ">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label  class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                              <input name='email' class="form-control"  placeholder="Email">
                                            </div>
                                          </div>
                                      </div>

                                      <div class="col-md-7">
                                        <br>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Giới tính</label>
                                            <label class="radio-inline">
                                                <input  type="radio" name="gioi_tinh"  value="0" checked>Nam
                                            </label>
                                            <label class="radio-inline">
                                                <input  type="radio" name="gioi_tinh" value="1">Nữ
                                            </label>
                                        </div>
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
          <form method="post" action='../api/suakhachhang.php' class="form-horizontal"   >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa khách hàng</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="panel panel-default">




                              <!-- Tab panes -->


                              <div class="row">
                                <div class="col-md-5">
                                  <br>
                                  <input type="hidden" name="id" id='ma_khach_hang'>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Loại khách</label>
                                        <label id='khach_ca_nhan' class="radio-inline">
                                            <input id='sua_canhan' type="radio" name="loai_khach"  value="0" checked><span class='xoa'>Cá nhân</span>
                                        </label>
                                        <label id='khach_to_chuc' class="radio-inline">
                                            <input  id='sua_tochuc' type="radio" name="loai_khach"  value="1"><span class=xoa>Tổ chức</span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Tên khách hàng</label>
                                      <div class="col-sm-8">
                                        <input id='sua_ten' name='ten' class="form-control"  placeholder="Tên khách hàng" required=""
                                        oninvalid="this.setCustomValidity('Chưa nhập tên khách hàng')"
                                        oninput="setCustomValidity('')"
                                        >
                                      </div>
                                    </div>
                                    <div class="form-group" id='la_to_chuc'>
                                      <label  class="col-sm-4 control-label">Công ty</label>
                                      <div class="col-sm-8">
                                        <input id='sua_cong_ty' name='cong_ty' class="form-control"
                                        >
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Số điện thoại</label>
                                      <div class="col-sm-8">
                                        <input id='sua_sdt' name='sdt' class="form-control"  placeholder="Số điện thoại">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputPassword3" class="col-sm-4 control-label">Ngày sinh</label>
                                      <div class="col-sm-8">
                                        <input id='sua_ngay_sinh' name='ngay_sinh' required="" type="date" class="form-control"
                                        oninvalid="this.setCustomValidity('Chưa nhập sinh')"
                                        oninput="setCustomValidity('')"
                                        >
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Địa chỉ</label>
                                      <div class="col-sm-8">
                                        <input id='sua_dia_chi' name='dia_chi' type='text' class="form-control"  placeholder="Địa chỉ">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Email</label>
                                      <div class="col-sm-8">
                                        <input id='sua_email' name='email' class="form-control"  placeholder="Email">
                                      </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                  <br>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Giới tính</label>
                                      <label id='nam' class="radio-inline">
                                          <input id='sua_nam' type="radio" name="gioi_tinh"  value="0" checked><span class='xoa'>Nam</span>
                                      </label>
                                      <label id='nu' class="radio-inline">
                                          <input id='sua_nu' type="radio" name="gioi_tinh" value="1"><span class='xoa'>Nữ</span>
                                      </label>
                                  </div>
                                    <div class="form-group">
                                      <label  class="col-sm-4 control-label">Ghi chú</label>
                                      <div class="col-sm-8">
                                      <textarea id='sua_ghi_chu' class='form-control' name="ghi_chu" rows="8" cols="80"></textarea>
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
                <h2 class='title'>Khách hàng</h2>
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
                <button class='btn btn-default' type="button" name="button" data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-plus'></i>  Thêm khách hàng</button>
                <button class='btn btn-default' type="button" name="button"><i class='	glyphicon glyphicon-export'></i> Xuất file</button>


              </div>
            </div>
            <div class="row">
              <div class="col-md-12" id="data">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         <thead>
                             <tr align="center">
                                 <th>Mã khách hàng</th>
                                 <td> <strong>Tên khách hàng</strong> </td>
                                 <td> <strong>Số điện thoại</strong> </td>
                                 <td>  <strong>Email</strong> </td>
                                 <td> <strong>Địa chỉ</strong> </td>
                                 <td> <strong>Xóa</strong> </td>
                                 <td> <strong>Sửa</strong> </td>
                             </tr>
                         </thead>
                         <tbody id="data">
                           <?php foreach($khachhang as $key => $value): ?>
                             <tr class="odd gradeX" align="center">
                                 <td><?php echo $value['id']; ?></td>
                                 <td><?php echo $value['ten']; ?></td>
                                 <td><?php echo $value['sdt']; ?></td>
                                 <td><?php echo $value['email']; ?></td>
                                 <td><?php echo $value['dia_chi']; ?></td>
                                 <td class="center"><i style='color:red;' class="fa fa-trash-o  fa-fw"></i><a href="../api/xoakhachhang.php?id=<?php echo $value['id']; ?>" class='delete' onclick="return confirm('Bạn có chắc không?')"  style='color:red;' href="#"> Xóa</a></td>
                                 <td class="center">
                                   <i  class="fa fa-pencil fa-fw"></i>
                                   <a class='edit' data-toggle="modal" data-target="#suanhacungcap"  href="#"
                                      data-id=<?php echo $value['id']; ?>
                                      data-loai_khach="<?php echo $value['loai_khach']; ?>"
                                      data-cong_ty="<?php echo $value['cong_ty']; ?>"
                                      data-ten="<?php echo $value['ten']; ?>"
                                      data-sdt="<?php echo $value['sdt']; ?>"
                                      data-ngay_sinh="<?php echo $value['ngay_sinh']; ?>"
                                      data-email="<?php echo $value['email']; ?>"
                                      data-dia_chi="<?php echo $value['dia_chi']; ?>"
                                      data-ghi_chu="<?php echo $value['ghi_chu']; ?>"
                                      data-gioi_tinh="<?php echo $value['gioi_tinh']; ?>"
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

          // radiobox thêm khách hàng
          $(document).ready(function() {
            $('#canhan').click(function() {
              $('#congty').hide()
            })
            $('#tochuc').click(function() {
              $('#congty').show()
            })
          })


          // $(document).ready(function() {
          //   $('.edit').click(function() {
          //     $('#sua_id').val($(this).data('id'))
          //     $('#sua_ten_ncc').val($(this).data('ten'))
          //     $('#sua_sdt').val($(this).data('sdt'))
          //     $('#sua_email').val($(this).data('email'))
          //     $('#sua_dia_chi').val($(this).data('dia_chi'))
          //     $('#sua_ghi_chu').val($(this).data('ghi_chu'))
          //   })
          // })

          $('tbody').delegate('a.edit','click',function() {

            let loai_khach = $(this).data('loai_khach')
            if(loai_khach == 0) {
              $('#sua_canhan').attr("checked","")
              $('#la_to_chuc').hide()
            }

            else {
              $('#sua_tochuc').attr("checked","")
              $('#la_to_chuc').show()
            }

            let gioi_tinh = $(this).data('gioi_tinh')
            if(gioi_tinh == 0)
              $('#sua_nam').attr("checked","")
            else
              $('#sua_nu').attr("checked","")

            let ma_khach_hang = $(this).data('id');
            let ten = $(this).data('ten');
            let sdt = $(this).data('sdt');
            let ngay_sinh = $(this).data('ngay_sinh');
            let dia_chi = $(this).data('dia_chi');
            let email = $(this).data('email');
            let ghi_chu = $(this).data('ghi_chu');
            let cong_ty = $(this).data('cong_ty');

            $('#ma_khach_hang').val(ma_khach_hang)
            $('#sua_ten').val(ten)
            $('#sua_cong_ty').val(cong_ty)
            $('#sua_ten').val(ten)
            $('#sua_sdt').val(sdt)
            $('#sua_ngay_sinh').val(ngay_sinh)
            $('#sua_dia_chi').val(dia_chi)
            $('#sua_email').val(email)
            $('#sua_ghi_chu').val(ghi_chu)
          })
          // <label id='khach_ca_nhan' class="radio-inline">
          //     <input id='canhan' type="radio" name="loai_khach"  value="0">Cá nhân
          // </label>
          // <label id='khach_to_chuc' class="radio-inline">
          //     <input id='tochuc' type="radio" name="loai_khach"  value="1">Tổ chức
          // </label>
          $('#suanhacungcap').on('hidden.bs.modal', function () {
            $('#sua_canhan').remove()
            $('#sua_tochuc').remove()
            $('.xoa').remove()
            let canhan = `<input id='sua_canhan' type="radio" name="loai_khach"  value="0"><span class='xoa'>Cá nhân</span>`
            let tochuc = `<input id='sua_tochuc' type="radio" name="loai_khach"  value="1"><span class='xoa'>Tổ chức</span>`
            $('#khach_ca_nhan').append(canhan)
            $('#khach_to_chuc').append(tochuc)
            $('#sua_nam').remove()
            $('#sua_nu').remove()
            let nam = `<input id='sua_nam' type="radio" name="gioi_tinh"  value="0" checked><span class='xoa'>Nam</span>`
            let nu = `<input id='sua_nu' type="radio" name="gioi_tinh" value="1"><span class='xoa'>Nữ</span>`
            $('#nam').append(nam)
            $('#nu').append(nu)
            $('#ma_khach_hang').val()
            $('#sua_ten').val()
            $('#sua_sdt').val()
            $('#sua_ngay_sinh').val()
            $('#sua_dia_chi').val()
            $('#sua_email').val()
            $('#sua_ghi_chu').val()
          })


    </script>
</body>

</html>
