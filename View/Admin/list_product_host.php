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
           <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 10.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">id</th>
           <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 312.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 200.2px;" aria-label="Position: activate to sort column ascending">Price</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 236.2px;" aria-label="Office: activate to sort column ascending">Amount</th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 125.2px;" aria-label="Age: activate to sort column ascending">Image </th>
           <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Edit</th>
          </tr>
         </thead>
         <tbody>
          <?php
          $i = 1;
          foreach ($product_host as $sp) {
           echo "<tr role='row' class='odd'><td tabindex='0' class='sorting_1'>" . $i++ . "</td>";
           echo "<td>" . $sp['name'] . "</td>";
           echo "<td>" . $sp['pirce'] . "</td>";
           echo "<td>" . $sp['amount'] . "</td>";
           echo "<td><img width='100px' height='100px' src=" . 'img/' . $sp['image'] . "></td>";
           echo "<td>";
           echo '<button type="button"  Onclick="ConfirmDelete( ' . $sp['id'] . ')"class="btn btn-primary">Xóa</button>';
           echo '<a href="?controller=admin&action=Change_product_Host&id=' . $sp['id'] . '" Onclick="refresh( ' . $sp['id'] . ')" class="btn btn-primary">Sửa</button>';
           echo "</td>";
           echo "</tr>";
          }


          ?>


         </tbody>

        </table>
       </div>
      </div>

      <div class="row">

       <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
         <ul class="pagination">
          <?php
          // PHẦN HIỂN THỊ PHÂN TRANG
          // BƯỚC 7: HIỂN THỊ PHÂN TRANG

          // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
          if ($current_page > 1 && $total_page > 1) {
           echo '<li class="paginate_button page-item previous disabled" id="example_previous"><a href="?controller=admin&action=product_host&page=' . ($current_page - 1) . '" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
           // Nếu là trang hiện tại thì hiển thị thẻ span
           // ngược lại hiển thị thẻ a
           echo '<li class="paginate_button page-item "><a href="?controller=admin&action=product_host&page=' . $i . '" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">' . $i . '</a></li>';
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {

           echo '<li class="paginate_button page-item next" id="example_next"><a href="?controller=admin&action=product_host&page=' . ($current_page + 1) . '" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
          }
          ?>
         </ul>
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
  var x = confirm("Bạn Có Chắc Chắn Muốn Xóa Không ?");
  if (x) {
   $.ajax({
    type: "POST",
    url: "?controller=Admin&action=Delete_Product_Host",
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
</script>

</html>