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

        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
        <div class="col-sm-12 col-md-6">
        <div class="dataTables_length" id="example_length">
        <label>Show 
        <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
        <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option>
        </select> entries</label></div></div><div class="col-sm-12 col-md-6">
        <div id="example_filter" class="dataTables_filter">
        <label>Search:
            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example">
            </label></div></div></div><div class="row">
            <div class="col-sm-12">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
            <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 10.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">id</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 312.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 200.2px;" aria-label="Position: activate to sort column ascending">Phone</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 236.2px;" aria-label="Office: activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 125.2px;" aria-label="Age: activate to sort column ascending">Username   </th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 464.2px;" aria-label="Start date: activate to sort column ascending">Avatar</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 184.2px;" aria-label="Salary: activate to sort column ascending">Quyền</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i =1;
                foreach($list_member as $sp){
                echo "<tr role='row' class='odd'><td tabindex='0' class='sorting_1'>".$i++."</td>";
                echo "<td>".$sp['full_name']."</td>";
                echo "<td>".$sp['Phone']."</td>";
                echo "<td>".$sp['email']."</td>";
                echo "<td>".$sp['username']."</td>";
                echo "<td>".$sp['img']."</td>";
                echo "<td>".$sp['name']."</td></tr>";}


            ?>
            
            </tbody>
        
        </table></div></div><div class="row">
        <div class="col-sm-12 col-md-5">
        
        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 
        <?php
           echo "".count($list_member);
        ?> entries</div></div>
        <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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

</html>