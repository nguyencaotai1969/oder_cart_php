<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_POST['submit'])) {
 header("Location:?controller=admin&action=admin");
};

?>

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->
 <link rel="stylesheet" href="css/index.css">
</head>

<body>
 <?php
 require self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'header') . '.php';

 ?>
 <div class="container-fluid main-container">
  <?php
  require self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'left') . '.php';
  ?>
  <div class="col-md-10 content">
   <div class="panel">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Thêm Sản Phẩm</button>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
     <div class="container">
      <div class="row">
       <div class="modal-content">

        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
         <h4 class="modal-title">Thêm 1 Sản Phẩm Mới</h4>
        </div>

        <form action="" method="post">
         <div class="modal-body">

          <div class="form-group">
           <label for="userEmail">Tên Sản Phẩm</label>
           <input type="text" class="form-control" required="" name="nameproduct" value="">
          </div>
          <div class="form-group">
           <label for="userEmail">Ảnh Sản Phẩm</label>
           <input type="file" class="form-control" required="" name="fileupload" value="">
          </div>
          <div class="form-group">
           <label for="userEmail">Giá Sản Phẩm</label>
           <input type="number" class="form-control" required="" name="price" value="">
          </div>
          <div class="form-group">
           <label for="userEmail">Loại Sản Phẩm </label>
           <select class="form-control" name="category">
            <?php
            for ($i = 0; $i < count($category); $i++) {
             echo '<option value=' . $category[$i]['id'] . '>' . $category[$i]['name'] . '</option>';
            }
            ?>

           </select>
          </div>
          <div class="form-group">
           <label for="number">Số Lượng Sản Phẩm</label>
           <input type="text" class="form-control" required="" name="amount" value="">
          </div>
          <div class="form-group">
           <label for="number">Mô Tả Sản Phẩm</label>
           <textarea class="form-control" name="description"></textarea>
          </div>
         </div>

         <div class="modal-footer">
          <input type="hidden" name="isEmpty" value="">
          <button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i class="fa fa-check"></i>Thêm Mới</button>
          <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle"></i> Đóng</button>
         </div>
        </form>

       </div>
      </div>
     </div>
    </div>
   </div>
  </div>

 </div>
</body>

</html>