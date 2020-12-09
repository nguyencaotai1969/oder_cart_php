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
                    <h3>Thêm Sản Phẩm Cho Bạn</h3>
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
                    <div class="form-group">
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" name="names" placeholder="Tên Sản Phẩm">
                      </div>
                    </div>
                    <b>Avatar</b>
                    <div class="form-group">
                      <input type="file" name='file' class="form-control" multiple>
                    </div>
                    <div class="form-group">
                      <div class="input-group mb-2">

                        <input type="text" class="form-control" id="nombre" name="amount" placeholder="Số Lượng">
                      </div>
                    </div>
                    <b>Ảnh Chi Tiết</b>
                     <div class="form-group">
                      <input type="file" name='file_slider[]' class="form-control" multiple>
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

                        <input type="text" class="form-control" id="nombre" name="pirce" placeholder="Giá Sản Phẩm">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group mb-2">

                        <textarea class="form-control" name="details" placeholder="Mô Tả Sản Phẩm"></textarea>
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="submit" value="Thêm" name="btnsubmit" class="btn btn-info btn-block rounded-0 py-2">
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

</html>