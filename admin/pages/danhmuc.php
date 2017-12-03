<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
 ?>
<head>
    <?php require('../common/head.php'); ?>
    <?php
      $loaithuoc = $exp->fetch_all("select * from loaithuoc");
      $thuoc = $exp->fetch_all("select * from thuoc");
     ?>
    <link rel="stylesheet" href="../dist/css/danhmuc.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">

      <!-- Modal them thuoc -->
      <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form method="post" action='../api/themthuoc.php' class="form-horizontal" id='themthuocform' enctype="multipart/form-data" >
        <div class="modal-content ">
          <div class="modal-header">
            <div class="panel panel-green">
                <div class="panel-heading">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thêm thuốc</h4>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="panel panel-default">

                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Thông tin</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Mô tả chi tiết</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                          <label  class="col-sm-4 control-label">Tên thuốc</label>
                                          <div class="col-sm-8">
                                            <input name='ten_thuoc' id='tenthuoc' class="form-control"  placeholder="Tên thuốc" required=""
                                            oninvalid="this.setCustomValidity('Chưa nhập tên thuốc')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Loại thuốc</label>
                                          <div class="col-sm-8">
                                            <select id='loaithuoc' class="form-control" name="ma_loai_thuoc">
                                              <?php foreach ($loaithuoc as $key => $value): ?>
                                                  <option value="<?php echo $value['id']; ?>"><?php echo $value['ten']; ?></option>
                                              <?php endforeach; ?>

                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Giá bán</label>
                                          <div class="col-sm-8">
                                            <input name='gia_ban' required="" type="number" class="form-control" id="giaban" placeholder="Giá bán"
                                            oninvalid="this.setCustomValidity('Chưa nhập giá bán')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Giá vốn</label>
                                          <div class="col-sm-8">
                                            <input name='gia_von' required="" type="number" class="form-control" id="giavon" placeholder="Giá vốn"
                                            oninvalid="this.setCustomValidity('Chưa nhập giá vốn')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Ngày sản xuất</label>
                                          <div class="col-sm-8">
                                            <input name='nsx' required="" type="date" class="form-control"  placeholder="Ngày sản xuất"
                                            oninvalid="this.setCustomValidity('Chưa nhập ngày sản xuất')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Hạn sử dụng</label>
                                          <div class="col-sm-8">
                                            <input name='hsd' required="" type="date" class="form-control"  placeholder="Hạn sử dụng"
                                            oninvalid="this.setCustomValidity('Chưa nhập hạn sử dụng')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Thuốc theo đơn</label>
                                            <div class="checkbox col-sm-8">

                                                    <label >
                                                      <input name="theo_don" type="checkbox"  >
                                                    </label>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                      <div class="thumbnail">
                                          <img id='avatar' src="../images/thuoc-khang-sinh.jpg" alt="Thuốc không có ảnh" style="width:100%">
                                          <input id='anh' class='hide' type="file" name="image">
                                          <button id='selectanh' class='btn btn-primary' type="button" name="button">Chọn ảnh</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                  <h2>Ghi chú</h2>
                                    <textarea class='form-control' name="note" rows="8" cols="80"></textarea>
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


      <!-- Modal sua thuoc  -->

      <div id="suathuoc" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form method="post" action='../api/suathuoc.php' class="form-horizontal" id='themthuocform' enctype="multipart/form-data" >
        <div class="modal-content ">
          <div class="modal-header">
            <div class="panel panel-green">
                <div class="panel-heading">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Chỉnh sửa thông tin thuốc</h4>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="panel panel-default">

                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#nha" data-toggle="tab">Thông tin</a>
                                </li>
                                <li><a href="#thongtin" data-toggle="tab">Mô tả chi tiết</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="nha">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <input id='sua_ma_thuoc' type="hidden" name="id" >
                                        <div class="form-group">
                                          <label  class="col-sm-4 control-label">Tên thuốc</label>
                                          <div class="col-sm-8">
                                            <input name='ten_thuoc' id='sua_ten_thuoc' class="form-control"  placeholder="Tên thuốc" required=""
                                            oninvalid="this.setCustomValidity('Chưa nhập tên thuốc')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Loại thuốc</label>
                                          <div class="col-sm-8">
                                            <select id='sua_ma_loai_thuoc' class="form-control" name="ma_loai_thuoc">
                                              <?php foreach ($loaithuoc as $key => $value): ?>
                                                  <option value="<?php echo $value['id']; ?>"><?php echo $value['ten']; ?></option>
                                              <?php endforeach; ?>

                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Giá bán</label>
                                          <div class="col-sm-8">
                                            <input name='gia_ban' required="" type="number" class="form-control" id="sua_gia_ban" placeholder="Giá bán"
                                            oninvalid="this.setCustomValidity('Chưa nhập giá bán')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Giá vốn</label>
                                          <div class="col-sm-8">
                                            <input name='gia_von' required="" type="number" class="form-control" id="sua_gia_von" placeholder="Giá vốn"
                                            oninvalid="this.setCustomValidity('Chưa nhập giá vốn')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Ngày sản xuất</label>
                                          <div class="col-sm-8">
                                            <input name='nsx' required="" type="date" class="form-control"  placeholder="Ngày sản xuất" id='sua_nsx'
                                            oninvalid="this.setCustomValidity('Chưa nhập ngày sản xuất')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputPassword3" class="col-sm-4 control-label">Hạn sử dụng</label>
                                          <div class="col-sm-8">
                                            <input name='hsd' required="" type="date" class="form-control"  placeholder="Hạn sử dụng" id='sua_hsd'
                                            oninvalid="this.setCustomValidity('Chưa nhập hạn sử dụng')"
                                            oninput="setCustomValidity('')"
                                            >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Thuốc theo đơn</label>
                                            <div class="checkbox col-sm-8">

                                                    <label >
                                                      <input style='color:green' id='sua_theo_don' name="theo_don" type="checkbox"  >
                                                    </label>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                      <div class="thumbnail">
                                          <img id='sua_avatar' src="../images/thuoc-khang-sinh.jpg" alt="Thuốc không có ảnh" style="width:100%">
                                          <input id='sua_anh' class='hide' type="file" name="image">
                                          <button id='sua_selectanh' class='btn btn-primary' type="button" name="button">Chọn ảnh</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="thongtin">
                                  <h2>Ghi chú</h2>
                                    <textarea id='sua_ghi_chu' class='form-control' name="note" rows="8" cols="80"></textarea>
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
                <h2 class='title'>Danh mục thuốc</h2>
                <!-- them -->
                <?php if(isset($_SESSION["status"])):
                 ?>

                 <?php if($_SESSION['status'] == "success") { ?>
                   <div class="alert alert-success">
                     Thêm thành công
                   </div>

                 <?php } else { ?>
                   <div class="alert alert-danger">
                     Thêm không thành công
                   </div>
                 <?php } ?>
                 <?php unset($_SESSION['status']); ?>

               <?php endif ?>
               <!-- sua -->
               <?php if(isset($_SESSION["edit"])):
                ?>

                <?php if($_SESSION['edit'] == "success") { ?>
                  <div class="alert alert-success">
                    Sửa thành công
                  </div>

                <?php } else { ?>
                  <div class="alert alert-danger">
                    Sửa không thành công
                  </div>
                <?php } ?>
                <?php unset($_SESSION['edit']); ?>

              <?php endif ?>
              <!-- xoa -->
              <?php if(isset($_SESSION["delete"])):
               ?>

               <?php if($_SESSION['delete'] == "success") { ?>
                 <div class="alert alert-success">
                   Xóa thành công
                 </div>

               <?php } else { ?>
                 <div class="alert alert-danger">
                   Xóa không thành công
                 </div>
               <?php } ?>
               <?php unset($_SESSION['delete']); ?>

             <?php endif ?>
              </div>
              <div class="col-md-6 right">
                <button class='btn btn-default' type="button" name="button" data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-plus'></i>  Nhập thuốc</button>
                <a href="loaithuoc.php?modal=yes"><button class='btn btn-default' type="button" ><i class='glyphicon glyphicon-plus'></i>  Thêm loại thuốc</button></a>
                <button class='btn btn-default' type="button" name="button"><i class='	glyphicon glyphicon-export'></i> Xuất file</button>

                <div class="dropdown status">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                <i class='glyphicon glyphicon-list'></i>  <span class="caret "></span></button>
                  <ul class="dropdown-menu list-status">
                    <li><input id='trangthai' type="checkbox" name="" value="">  Trạng thái</li>
                    <li><input id="tonkho" type="checkbox" name="" value="">  Tồn kho</li>
                    <li><input id="gianhap" type="checkbox" name="" value="">  Giá nhập</li>
                    <li><input id="giamgia" type="checkbox" name="" value="">  Giảm giá</li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12" id="data">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         <thead>
                             <tr align="center">
                                 <th>Mã thuốc</th>
                                 <td> <strong>Ảnh</strong> </td>
                                 <th>Tên thuốc</th>
                                 <th>Loại thuốc</th>
                                 <th>Giá bán</th>
                                 <th>Giá nhập</th>
                                 <th>Tồn kho</th>
                                 <th>Xóa</th>
                                 <th>Sửa</th>
                             </tr>
                         </thead>
                         <tbody id="data">
                           <?php foreach($thuoc as $key => $value): ?>
                             <tr class="odd gradeX" align="center">
                                 <td><?php echo $value['id']; ?></td>
                                 <td>
                                   <img  width="80px" height="auto" alt="Không có ảnh" src="data:image/jpeg;base64,<?php echo base64_encode($value['anh']); ?>" class=" img-responsive"/>
                                 </td>
                                 <td><?php echo $value['ten_thuoc']; ?></td>
                                 <td><?php
                                    $loaithuoc = $exp->fetch_one("select * from loaithuoc where id={$value["ma_loai_thuoc"]}");
                                    echo $loaithuoc['ten'];
                                 ?></td>
                                 <td><?php echo $value['gia_ban']; ?></td>
                                 <td><?php echo $value['gia_von']; ?></td>
                                 <td><?php echo $value['ton_kho']; ?></td>
                                 <td class="center"><i style='color:red;' class="fa fa-trash-o  fa-fw"></i><a href="../api/xoathuoc.php?id=<?php echo $value['id']; ?>" class='delete' onclick="return confirm('Bạn có chắc không?')"  style='color:red;' href="#"> Xóa</a></td>
                                 <td class="center">
                                   <i  class="fa fa-pencil fa-fw"></i>
                                   <a class='edit' data-toggle="modal" data-target="#suathuoc"  href="#"
                                      data-ten_thuoc=<?php echo $value['ten_thuoc']; ?>
                                      data-id=<?php echo $value['id']; ?>
                                      data-anh="data:image/jpeg;base64,<?php echo base64_encode($value['anh']); ?>"
                                      data-ma_loai_thuoc=<?php echo $value['ma_loai_thuoc']; ?>
                                      data-gia_ban=<?php echo $value['gia_ban']; ?>
                                      data-gia_von=<?php echo $value['gia_von']; ?>
                                      data-ghi_chu="<?php echo $value['ghi_chu']; ?>"
                                      data-theo_don=<?php echo $value['theo_don']; ?>
                                      data-nsx="<?php echo $value['nsx']; ?>"
                                      data-hsd="<?php echo $value['hsd']; ?>"
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



        // THÊM THUỐC

          $(document).ready(function() {

            //chon anh
            $('#selectanh').click(function() {
              $('#anh').click();
            })

            // lay url của ảnh
            function readURL(input, target){
              if(input.files && input.files[0]){
                var reader = new FileReader();
                var image_target = $(target);
                reader.onload = function(e){
                  image_target.attr('src',e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
                // $('#save').css("display","inline-block");
              }
            }

            //preview anh
            $(document).ready(function(){
              $('#anh').change(function(){
                readURL(this,"#avatar");
              });
            });

            //reset select ma loai thuoc va anh
            $('#suathuoc').on('hidden.bs.modal', function () {
                let selected = $(`#sua_ma_loai_thuoc option[selected='selected'`)
                $(selected).removeAttr("selected");
                $('#sua_anh').attr("type","text");
                $('#sua_anh').attr("type","file");
            })
          })

          $('body').delegate('a.edit','click',function() {
            let id = $(this).data('id')
            let ten_thuoc = $(this).data('ten_thuoc')
            let sua_ma_loai_thuoc = $(this).data('ma_loai_thuoc')
            let anh = $(this).data('anh')
            let sua_gia_ban = $(this).data('gia_ban')
            let sua_gia_von = $(this).data('gia_von')
            let select = $(`#sua_ma_loai_thuoc option[value=${sua_ma_loai_thuoc}]`)
            let sua_theo_don = $(this).data('theo_don')
            let sua_ghi_chu = $(this).data('ghi_chu')
            let nsx = $(this).data('nsx')
            let hsd = $(this).data('hsd')

             if(sua_theo_don == 1) {
               $('#sua_theo_don').attr("checked","")
             }else {
               $('#sua_theo_don').removeAttr("checked")
             }

             $('#sua_ghi_chu').val(sua_ghi_chu)
             //anh
            $('#sua_avatar').attr('src',anh)
            $('#sua_ma_thuoc').val(id)
            $('#sua_ten_thuoc').val(ten_thuoc)
            $('#sua_gia_ban').val(sua_gia_ban)
            $('#sua_gia_von').val(sua_gia_von)
            $('#sua_nsx').val(nsx)
            $('#sua_hsd').val(hsd)
            $(select).attr('selected',"")
          })


          //sua anh
          $(document).ready(function() {
            //chon anh
            $('#sua_selectanh').click(function() {
              $('#sua_anh').click();
            })

            // lay url của ảnh
            function readURL(input, target){
              if(input.files && input.files[0]){
                var reader = new FileReader();
                var image_target = $(target);
                reader.onload = function(e){
                  image_target.attr('src',e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
                // $('#save').css("display","inline-block");
              }
            }

            //preview anh
            $(document).ready(function(){
              $('#sua_anh').change(function(){
                readURL(this,"#sua_avatar");
              });
            });
          })

          $(document).ready(function() {
            //xoa thuoc
            $('.delete').click(function() {
              console.log($(this).data('id'))
            })
          })
          //   $("#themthuocform").submit(function(event) {
          //     event.preventDefault()
          //     let data = {
          //       ten_thuoc: $('#tenthuoc').val(),
          //       ma_loai_thuoc: $('#loaithuoc').val(),
          //       gia_ban: $('#giaban').val(),
          //       gia_von: $('#giavon').val(),
          //       ton_kho: 0,
          //       giam_gia:0,
          //       ma_trang_thai: 1,
          //       image: $('#anh').val()
          //     }
          //
          //     $.ajax({
          //       url: "../api/themthuoc.php",
          //       type: "post",
          //       dataType: "text",
          //       data: data,
          //       success: function(data) {
          //         console.log(data)
          //         $.ajax({
          //           url: "../api/thuoc.php",
          //           type: "post",
          //           dataType: "text",
          //           success: function(data1) {
          //             $('#data').empty();
          //             $('#data').append(data1);
          //             $('#dataTables-example').DataTable({
          //                     responsive: true,
          //                     "language": {
          //                         "lengthMenu": "Hiển thị _MENU_ mỗi trang",
          //                         "zeroRecords": "Không có dữ liệu ",
          //                         "info": "Trang  _PAGE_ trên _PAGES_",
          //                         "infoEmpty": "No records available",
          //                         "infoFiltered": "(lọc từ _MAX_ bản ghi)",
          //                         "search": "Tìm kiếm",
          //                         "paginate": {
          //                            "first":      "Frist",
          //                            "last":       "Last",
          //                            "next":       "Trước",
          //                            "previous":   "Sau"
          //                        },
          //                     }
          //             });
          //           }
          //         })
          //         $.notify("Thêm thuốc thành công",{
          //           style: "thanhcong"
          //         });
          //         $('#myModal').modal('hide');
          //       }
          //     })
          //   })
          //
          // })




    </script>
</body>

</html>
