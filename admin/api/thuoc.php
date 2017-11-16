<?php
require('./common.php');
  $thuoc = $exp->fetch_all("select * from thuoc");

 ?>
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
              <tr align="center">
                  <th>Mã thuốc</th>
                  <th>Tên thuốc</th>
                  <th>Loại thuốc</th>
                  <th>Giá bán</th>
                  <th>Giá nhập</th>
                  <th>Tồn kho</th>
                  <th>Xóa</th>
                  <th>Sửa</th>
              </tr>
          </thead>
          <tbody >
            <?php foreach($thuoc as $key => $value): ?>
              <tr class="odd gradeX" align="center">
                  <td><?php echo $value['id']; ?></td>
                  <td><?php echo $value['ten_thuoc']; ?></td>
                  <td><?php
                     $loaithuoc = $exp->fetch_one("select * from loaithuoc where id={$value["ma_loai_thuoc"]}");
                     echo $loaithuoc['ten'];
                  ?></td>
                  <td><?php echo $value['gia_ban']; ?></td>
                  <td><?php echo $value['gia_von']; ?></td>
                  <td><?php echo $value['ton_kho']; ?></td>
                  <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                  <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
              </tr>
           <?php endforeach; ?>
          </tbody>
      </table>
