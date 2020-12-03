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
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
     <!-- Noi Dung Viet o day -->
     <div>
     <!-- <table class="table table-bordered cart_summary">
        <thead>
            <tr>
                <th class="cart_product">Product</th>
                <th>Description</th>
                <th>Avail.</th>
                <th>Unit price</th>
                <th>Qty</th>
                <th>Total</th>
                <th class="action"><i class="fa fa-trash-o"></i>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="cart_product">
                    <a href="#"><img src="product-100x122.jpg" alt="Product">
                    </a>
                </td>
                <td class="cart_description">
                    <p class="product-name"><a href="#">Frederique Constant </a>
                    </p>
                    <small class="cart_ref">SKU : #123654999</small>
                    <br>
                    <small><a href="#">Color : Beige</a></small>
                    <br>
                    <small><a href="#">Size : S</a></small>
                </td>
                <td class="cart_avail"><span class="label label-success">In stock</span>
                </td>
                <td class="price"><span>61,19 €</span>
                </td>
                <td class="qty">
                    <input class="form-control input-sm" type="text" value="1">
                    <a href="#"><i class="fa fa-caret-up"></i></a>
                    <a href="#"><i class="fa fa-caret-down"></i></a>
                </td>
                <td class="price">
                    <span>61,19 €</span>
                </td>
                <td class="action">
                    <a href="#">Delete item</a>
                </td>
            </tr>
            <tr>
                <td class="cart_product">
                    <a href="#"><img src="product-100x122.jpg" alt="Product">
                    </a>
                </td>
                <td class="cart_description">
                    <p class="product-name"><a href="#">Frederique Constant </a>
                    </p>
                    <small class="cart_ref">SKU : #123654999</small>
                    <br>
                    <small><a href="#">Color : Beige</a></small>
                    <br>
                    <small><a href="#">Size : S</a></small>
                </td>
                <td class="cart_avail"><span class="label label-success">In stock</span>
                </td>
                <td class="price"><span>61,19 €</span>
                </td>
                <td class="qty">
                    <input class="form-control input-sm" type="text" value="1">
                    <a href="#"><i class="fa fa-caret-up"></i></a>
                    <a href="#"><i class="fa fa-caret-down"></i></a>
                </td>
                <td class="price">
                    <span>61,19 €</span>
                </td>
                <td class="action">
                    <a href="#">Delete item</a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" rowspan="2"></td>
                <td colspan="3">Total products (tax incl.)</td>
                <td colspan="2">122.38 €</td>
            </tr>
            <tr>
                <td colspan="3"><strong>Total</strong>
                </td>
                <td colspan="2"><strong>122.38 €</strong>
                </td>
            </tr>
        </tfoot>
    </table>	 -->
    <div class="card-body">
        <button class='btn btn-primary'>Thêm Slider</button><hr>
        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
        <div class="col-sm-12 col-md-6">
        <div class="dataTables_length" id="example_length">
        </div></div></div><div class="row">
            <div class="col-sm-12">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
            <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 10.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">id</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 200.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 400.2px;" aria-label="Position: activate to sort column ascending">Image</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100.2px;" aria-label="Office: activate to sort column ascending">Chức Năng</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i =1;
                foreach($list_member as $sp){
                echo "<tr role='row' class='odd'><td tabindex='0' class='sorting_1'>".$i++."</td>";
                echo "<td>".$sp['name']."</td>";
                echo "<td>".$sp['image']."</td>";
                echo "<td>
                <a  href='?controller=admin&action=update_slider&id=".$sp['id']."'><button  class='btn btn-primary'>Sửa</button></a>
                    <button Onclick='ConfirmDelete( " . $sp['id'] . ")' class='border-0 btn-transition btn btn-outline-danger'>
                    <i class='fa fa-trash-alt'></i>
                </button></td></tr>";}


            ?>
            
            </tbody>
        
        </table></div></div><div class="row">
        <div class="col-sm-12 col-md-5">
        
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
    url: "?controller=Admin&action=delete_slider",
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