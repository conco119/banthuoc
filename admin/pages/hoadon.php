<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <?php
      $loaithuoc = $exp->fetch_all("select * from loaithuoc");
      $thuoc = $exp->fetch_all("select * from thuoc");
      $nhacungcap = $exp->fetch_all("select * from nhacungcap");
     ?>
    <link rel="stylesheet" href="../dist/css/hoadon.css">
    <link href="../../library/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">

      <!-- Modal them loai thuoc -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form method="post" action='../api/themloaithuoc.php' class="form-horizontal" id='themthuocform'  >
          <div class="modal-content ">
            <div class="modal-header">
              <div class="panel panel-green">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chọn thuốc</h4>
                  </div>
              </div>
            </div>
            <div class="modal-body">

              <div class="row">
                <div class="col-md-12" id="data">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           <thead>
                               <tr align="center">
                                   <th>Ảnh</th>
                                   <th>Mã thuốc</th>
                                   <td> <strong>Tên thuốc</strong> </td>
                                   <td> <strong>Tồn kho</strong> </td>
                                   <td> <strong>Chọn</strong> </td>
                               </tr>
                           </thead>
                           <tbody id="data">
                             <?php foreach($thuoc as $key => $value): ?>
                               <tr class="odd gradeX" align="center">
                                   <td>
                                     <img  width="60px" height="auto" alt="Không có ảnh" src="data:image/jpeg;base64,<?php echo base64_encode($value['anh']); ?>" class=" img-responsive"/>
                                   </td>
                                   <td><?php echo $value['id']; ?></td>
                                   <td><?php echo $value['ten_thuoc']; ?></td>
                                   <td><?php echo $value['ton_kho']; ?></td>
                                   <td>
                                     <button type="button" class=' select btn btn-success btn-sm' name="button"
                                        data-id=<?php echo $value['id']; ?>
                                        data-ten_thuoc=<?php echo $value['ten_thuoc']; ?>
                                        data-gia_ban=<?php echo $value['gia_ban']; ?>
                                        data-ton_kho=<?php echo $value['ton_kho']; ?>
                                     >
                                       Chọn</button>
                                   </td>

                               </tr>
                            <?php endforeach; ?>
                           </tbody>
                       </table>
                </div>
              </div>

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
                <h2 class='title'>Bán hàng</h2>
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
                <button class='btn btn-default' type="button" name="button" data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-plus'></i>Chọn thuốc</button>
                <button class='btn btn-default' type="button" name="button"><i class='	glyphicon glyphicon-export'></i> Xuất file</button>


              </div>
            </div>
          <form method='post' action='../api/nhaphang.php'>
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
                                 <td> <strong>Xóa</strong> </td>
                             </tr>
                         </thead>
                         <tbody id="mathang">
                           <!-- <tr id=${id} class="odd gradeX" align="center">
                             <td class='trung' >12222</td>
                             <td>Beo</td>
                             <td>
                               <input class='tinhtien' type="number" name="" value="2">
                             </td>
                             <td>
                               <input class='tinhtien' type="number" name="" value="3232">
                             </td>
                             <td>
                               <input type="text" name="" value="0" disabled>
                             </td>

                             <td>
                               <button  data-id=${id} class='xoamathang btn btn-danger btn-small'>Xóa</button>
                             </td>

                           </tr> -->
                         </tbody>
                     </table>
              </div>
            </div>
            <div class="row header">
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email"><i class="fa fa-user" aria-hidden="true"></i> Tên người bán:</label>
                  <div class="col-sm-10">
                    <p class='reset'>Nguyễn Hải Duy</p>
                    <input type="hidden" name="manv" value="1">
                  </div>
                </div>




                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><i class="fa fa-calendar" aria-hidden="true"></i>   Ngày lập hóa đơn:</label>
                    <div class="col-sm-10">
                      <input type="date" name="ngay_nhap" >
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">  </i>Khách hàng cần trả:</label>
                  <div class="col-sm-10">
                    <input type="text"  id='tongtien' class='form-control'  readonly>
                    <input type="hidden" name="tong_tien" id='tongtien1' class='form-control'>
                  </div>
                </div>




                <div class="form-group">
                  <label class='control-label col-sm-2' for=""><p><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Ghi chú</p></label>
                  <div class="col-sm-offset-2 col-sm-10">
                    <textarea class='form-control' name="ghi_chu" rows="8" cols="80"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name='submit' class="btn btn-default">Thanh toán</button>
                  </div>
                </div>
              </div> <!-- form -->

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



          $(document).ready(function() {
            $('.edit').click(function() {
              $('#suaten').val($(this).data('ten'))
              $('#sua_id').val($(this).data('id'))
            })
          })

          // thêm mặt hàng vào hóa đơn
          $(document).ready(function() {

            $('.select').click(function() {
              let id=$(this).data('id')
              let ten_thuoc=$(this).data('ten_thuoc')
              let gia_ban=$(this).data('gia_ban')
              let ton_kho = $(this).data('ton_kho')
              if(ton_kho <=0)
                return
              let row = `
              <tr id=${id} class="odd gradeX" align="center">
                <td class='trung' >
                  ${id}
                  <input type='hidden' name="${id}[]" value='${id}'
                </td>
                <td>
                ${ten_thuoc}
                <input type='hidden' name="${id}[]" value='${ten_thuoc}'
                </td>
                <td>
                  <input data-id=${id} data-ton_kho=${ton_kho} class='tinhtien ${id} max' type="number" name="${id}[]" value="0">
                </td>
                <td>
                  <input data-id=${id} class='tinhtien ${id}' type="number" name="${id}[]" value="${gia_ban}" readonly>
                </td>
                <td>
                  <input id='thanhtien${id}' type="text" name="${id}[]" value="0" readonly>
                </td>

                <td>
                  <button  data-id=${id} class='xoamathang btn btn-danger btn-small'>Xóa</button>
                </td>

              </tr>
              `

              function disp( divs ) {
                var a = [];
                for ( var i = 0; i < divs.length; i++ ) {
                  if($(divs[i]).text() == id)
                    return
                }
                $('#mathang').append(row)
              }

              disp( $( ".trung" ).toArray().reverse() );
            })
          })




          // xóa hàng khỏi hóa đơn
          $('tbody').delegate('.xoamathang','click',function() {
            let id = $(this).data('id')
            $(`#${id}`).remove()
            tatca( $( ".trung" ).toArray() );
          });


          // tính tong tiền
          function tatca( trung ) {
            let tatca=0
            for ( var i = 0; i < trung.length; i++ ) {
              let soluong = $(trung[i]).next().next().children().val()
              let gia = $(trung[i]).next().next().next().children().val()
              tatca = tatca + parseFloat(soluong) * parseFloat(gia)
            }

            $('#tongtien').val(`${tatca} - VNĐ`)
            $('#tongtien1').val(tatca)
          }

          //on change input
          $('tbody').delegate('.tinhtien','keyup change',function() {
              let id = $(this).data('id')
              function disp( divs ) {
                let tongtien = parseFloat($(divs[0]).val()) * parseFloat($(divs[1]).val())
                $(`#thanhtien${id}`).val(`${tongtien} - VNĐ`)
              }
              disp( $( `.${id}` ).toArray() );
              tatca( $( ".trung" ).toArray() );
          });
          // so luong change
          $('tbody').delegate('.max','keyup change',function() {
              let ton_kho = $(this).data('ton_kho')
              if($(this).val() >= ton_kho)
                $(this).val(ton_kho)
          });

    </script>
</body>

</html>
