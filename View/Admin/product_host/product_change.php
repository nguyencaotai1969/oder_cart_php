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
          <div class="row justify-content-center">
            <div class="col-12 col-md-12">


              <!--Form with header-->


              <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                  <div class="bg-info text-white text-center py-2">
                    <h3>Sửa Sản Phẩm Cho Bạn</h3>
                  </div>
                </div>

                <div class="card-body p-3">
                  <?php

                  if (isset($error)) {

                    echo   '<div class="alert alert-danger">
                              <strong>'
                      . $error . '</strong>
                            </div>';
                  }
                
                  ?>
                  <!--Body-->

                  <form action="" method="post" enctype="multipart/form-data">
                  <b>Tên sản phẩm</b>
                    <div class="form-group">
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" name="names" value="<?php echo $product[0]['name'] ?>">
                      </div>
                    </div>
                    <b>Ảnh Chính</b>

                    <div class="form-group">
                      <input type="file" name='file' class="form-control">
                    </div>
                    <div class="form-group">

                      <img width="100px" height="100px" src="img/<?php echo $product[0]['image'] ?>">
                    </div>
                    <b>Ảnh Slider</b>

                    <div class="form-group">
                      <input type="file" name='file_slider[]' class="form-control" multiple>
                    </div>
                    <div class="form-group">

                      <?php
                      foreach ($get_slider as $value) {
                        echo '<img width="100px"Onclick="ConfirmDelete(' . $value['id'] . ')" class="form-groupssd" height="100px" src=' . $value['img'] . ' alt="">';
                      }
                      ?>

                    </div>
                    <b>Số lượng : <?php echo $product[0]['amount'] ?></b>
                    <div class="form-group">
                      <div class="input-group mb-2">
                      <table>
                      <tr>
                      <?php
                      foreach ($get_size as $value) {
                      
                        echo '<th><b>size'.$value['size'].'</b></th> ';
                       
                      }
                      ?>
                      </tr>
                      <tr>
                      <?php
                      foreach ($get_size as $value) {
                      
                      echo '<td><input type="text" class="form-control" id="nombre" name="size'.$value['size'].'" value="'.$value['quantity'].'"></td>';
                      
                    }
                    ?>
                    <tr>
                      </table>
               
                      </div>
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="product_id">
                        <option value="">Chọn Loại Sản Phẩm</option>
                        <?php
                        for ($i = 0; $i < count($category); $i++) {
                          echo '<option value=' . $category[$i]['id'] . '>' . $category[$i]['name'] . '</option>';
                        }


                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <div class="input-group mb-2">

                        <input type="text" class="form-control" id="nombre" name="pirce" value=<?php echo $product[0]['pirce'] ?> Đ">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group mb-2">

                        <textarea class="form-control" name="details" value="<?php echo $product[0]['details'] ?>"><?php echo $product[0]['details'] ?></textarea>
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="submit" value="Sửa" name="btnsubmit" class="btn btn-info btn-block rounded-0 py-2">
                    </div>
                </div>

              </div>
              </form>
              <!--Form with header-->


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
      // console.log(id);
      $.ajax({
        type: "POST",
        url: "?controller=Admin&action=Delete_product_slider",
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