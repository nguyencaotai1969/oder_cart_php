<!DOCTYPE html>
<html lang="en">


<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">

 <title>SB Admin 2 - Dashboard</title>

 <!-- Custom fonts for this template-->
 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

 <!-- Custom styles for this template-->
 <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

 <!-- Page Wrapper -->
 <div id="wrapper">

  <!-- Sidebar -->
  <?php
  require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'left') . '.php');
  ?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

    <!-- Topbar -->
    <?php
    require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'header') . '.php');
    ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <div class="row">
       <div class="col-sm-12">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
         <thead>
          <tr role="row">
           <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 10.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">STT</th>
           <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">id user</th>
           <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">id product</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 170.2px;" aria-label="Office: activate to sort column ascending">tên người đặt</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 200.2px;" aria-label="Age: activate to sort column ascending">Địa chỉ </th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 125.2px;" aria-label="Age: activate to sort column ascending">số điện thoại</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150.2px;" aria-label="Age: activate to sort column ascending">tên sản phẩm</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 10.2px;" aria-label="Age: activate to sort column ascending">số lượng </th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100.2px;" aria-label="Age: activate to sort column ascending">giá </th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 125.2px;" aria-label="Age: activate to sort column ascending">Ảnh </th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 125.2px;" aria-label="Age: activate to sort column ascending">trạng thái</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 170.2px;" aria-label="Start date: activate to sort column ascending">EDIT</th>
          </tr>
         </thead>
         <tbody>
          <?php
          $i = 1;
         
          foreach ($donmua as $sp) {
            if(!empty($sp['id'])){
           echo "<tr role='row' class='odd'><td tabindex='0' class='sorting_1'>" . $i++ . "</td>";
           echo "<td>" . $sp['id_user'] . "</td>";
           echo "<td>" . $sp['id_product'] . "</td>";
           echo "<td>" . $sp['name'] . "</td>";
           echo "<td>" . $sp['address'] . "</td>";
           echo "<td>" . $sp['phone'] . "</td>";
           echo "<td>" . $sp['name_product'] . "</td>";
           echo "<td>" . $sp['quantity'] . "</td>";
           echo "<td>" . $sp['pirce'] . "</td>";
           echo "<td><img width='100px' height='100px' src=" . 'img/' . $sp['image'] . "></td>";
           echo "<td>" . $sp['name_status'] . "</td>";
           echo "<td>";
           echo '<button type="button"  Onclick="ConfirmAplly( ' . $sp['id'].','.$sp['id_product'].','.$sp['quantity'] . ')"class="btn btn-primary">Xác nhận đơn</button>';
           echo '<button type="button"  Onclick="ConfirmDelete( ' . $sp['id'] . ')"class="btn btn-danger">hủy đơn</button>';
           echo "</td>";
           echo "</tr>";
        }else{
            echo "<tr role='row' class='odd'><td tabindex='0' class='sorting_1'></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "<td></td>";
           echo "</tr>";
        }
          }
        


          ?>


         </tbody>

        </table>
       </div>
      </div>

    
      </div>
     </div>
    </div>

   </div>
  </div>
 </div>




 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- Footer -->
 <?php
 require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'footer') . '.php');
 ?>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <?php
 require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'lib') . '.php');
 ?>
</body>
<script type="text/javascript">
 function ConfirmDelete(id) {
  var x = confirm("Bạn Có Chắc Chắn Muốn Hủy Đơn Này Không ?");
  if (x) {
   $.ajax({
    type: "POST",
    url: "?controller=Admin&action=Choxacnhan_upto_huydon",
    data: {
     id: id
    },
    success: function(data) {
     var message = "";
     message += "<div   class='alert alert-danger'><strong></strong><b>" + data + "</b>" +
      "<button type='button' class='close' data-dismiss='alert'>&times;</button>" +
      "</div>";
     $(".eror").empty();
     $(".sucssetfully").remove();
     $(".eror").append(message);
    }
   });
   location.reload(true);
  }
 }
 function ConfirmAplly(id,id_product,quantily) {
  var x = confirm("Bạn Có Muốn Xác Nhận Đơn Này Không ?");
  if (x) {
   $.ajax({
    type: "POST",
    url: "?controller=Admin&action=Choxacnhan_upto_xacnhan",
    data: {
     id: id,
     id_product: id_product,
     quantily: quantily
    },
    success: function(data) {
     var message = "";
     message += "<div   class='alert alert-danger'><strong></strong><b>" + data + "</b>" +
      "<button type='button' class='close' data-dismiss='alert'>&times;</button>" +
      "</div>";
     $(".eror").empty();
     $(".sucssetfully").remove();
     $(".eror").append(message);
    }
   });
   location.reload(true);
  }
 }
</script>

</html>