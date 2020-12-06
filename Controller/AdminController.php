<?php
class AdminController extends BaseController
{
  protected $userModel = 'userModel';
  protected $sliderModel = 'sliderModel';
  protected $productModel = 'productModel';
  protected $adminModel = 'adminModel';

  public function __construct()
  {
    $this->loadModel('UserModel');
    $this->userModel = new UserModel();

    $this->loadModel('SliderModel');

    $this->sliderModel = new SliderModel();
    $this->loadModel('AdminModel');
    $this->adminModel = new AdminModel();
    $this->loadModel('ProductModel');
    $this->checkSession();
    $this->productModel = new ProductModel();
  }
  public function index()
  {
    return $this->view("Admin.index");
  }
  
  public function add_product()
  {
    $data = [];


    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $img_db;
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $insert = $this->adminModel->insert_product($paramas);
          $data['error'] = "Thêm Sản Phẩm Thành Công !";
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }


    $data['category'] = $this->adminModel->getAll_category();
    // var_dump( $data['category']);
    return $this->view("Admin.addproduct", $data);
  }
  public function Product_new()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['product_host'] = $this->productModel->product_new($data['start'], $data['limit']);
    return $this->view("Admin.list_product_new", $data);
  }
  public function Product_sale()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['product_sale'] = $this->productModel->product_sale($data['start'], $data['limit']);
    return $this->view("Admin.list_product_sale", $data);
  }
  public function product_host()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['product_host'] = $this->productModel->product_host($data['start'], $data['limit']);
    return $this->view("Admin.list_product_host", $data);
  }
  public function Delete_Product_Host()
  {
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_host($id_product_host);
  }
  public function Change_product_Host()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_host($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $img_db;
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $id['id'] = $id_product;
          $insert = $this->adminModel->update_product_host($paramas, $id);
          $data['error'] = "Sửa Sản Phẩm Thành Công !";
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }
    return $this->view("Admin.product_change", $data);
  }
  public function Change_product_sale(){
   $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['product_sale'] = $this->productModel->product_sale($data['start'], $data['limit']);
    return $this->view("Admin.list_product_sale",$data);
  }

  public function Change_product_New()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_new($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $img_db;
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $id['id'] = $id_product;
          $insert = $this->adminModel->update_product_new($paramas, $id);
          $data['error'] = "Sửa Sản Phẩm Thành Công !";
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }
    return $this->view("Admin.product_new_change", $data);
  }
  public function delete_product_new()
  {
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_host($id_product_host);
  }
  public function user()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['list_member'] = $this->productModel->user_all($data['start'], $data['limit']);
    return $this->view("Admin.user", $data);
  }
  public function slider()
  {
    $data['list_member'] = $this->adminModel->getAll_Slider();
    return $this->view("Admin.slider", $data);

    // $check_id_product = $this->adminModel->getAll_User();
    //             echo json_encode($check_id_product,JSON_NUMERIC_CHECK);     
  }
  public function Add_slider()
  {
    $data = [];
    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $name = isset($_POST['names']) ? $_POST['names'] : "";
    if ($name == "" || $fileupload == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['names'] = $name;
          $paramas['images'] = $img_db;
          $insert = $this->adminModel->insert_slider($paramas);
          $data['error'] = "Thêm Sản Phẩm Thành Công !";
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }



    return $this->view("Admin.addslider", $data);
  }
  public function Update_slider()
  {
    $data = [];
    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $data['slider'] = $this->adminModel->change_slider($id);
    $name = isset($_POST['names']) ? $_POST['names'] : "";
    if ($id == "" || $name == "" || $fileupload == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['id'] = $id;
          $paramas['names'] = $name;
          $paramas['images'] = $img_db;
          $insert = $this->adminModel->update_slider($paramas);
          $data['error'] = "update Sản Phẩm Thành Công !";
          header("Location:?controller=admin&action=slider");
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }
    
    return $this->view("Admin.updateslider", $data);
  }
  public function Delete_slider()
  {
    $id_product_suggestion = isset($_POST['id']) ? $_POST['id'] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_slider($id_product_suggestion);
  }

  public function Product_suggestion()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['product_suggestion'] = $this->productModel->product_suggestion($data['start'], $data['limit']);
    return $this->view("Admin.list_product_suggestion", $data);
  }
  public function Change_product_suggestion()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_suggestion($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $img_db;
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $id['id'] = $id_product;
          $insert = $this->adminModel->update_product_suggestion($paramas, $id);
          $data['error'] = "update Sản Phẩm Thành Công !";
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }
    return $this->view("Admin.product_suggestion_change", $data);
  }
  public function Delete_product_suggestion()
  {
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_suggestion($id_product_host);
  }

  // product oder
  public function Product_oder()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['product_oder'] = $this->productModel->product_oders($data['start'], $data['limit']);
    return $this->view("Admin.list_product_oder", $data);
  }
  public function Change_product_oder()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_oder($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['fileupload']) ? $_FILES['fileupload'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {

      // echo 2;
      $target_dir    = "img/";
      //Vị trí file lưu tạm trong server
      $date = getdate();
      $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
      $target_file   = $target_dir . basename($link_image . $_FILES["fileupload"]["name"]);
      $allowUpload   = true;
      //Lấy phần mở rộng của file
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $maxfilesize   = 80000000; //(bytes)
      ////Những loại file được phép upload
      $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


      if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
          $data['error'] =  " Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
        } else {
          $data['error'] =  "<b style='color:Red'>Không phải file ảnh.</b>";
          $allowUpload = false;
        }
      }

      // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
      if (file_exists($target_file)) {
        $data['error'] = "<b style='color:Red'> File đã tồn tại.</b>";
        $allowUpload = false;
      }
      // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
      if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        $data['error'] = "<b style='color:Red'>Không được upload ảnh lớn hơn $maxfilesize (bytes).</b>";
        $allowUpload = false;
      }


      // Kiểm tra kiểu file
      if (!in_array($imageFileType, $allowtypes)) {
        $data['error'] = "<b style='color:Red'>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF </b>";
        $allowUpload = false;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
          $img_db = basename($link_image . $_FILES["fileupload"]["name"]);
          // $update_img = "UPDATE user set `img` = '$img_db' where `id`=$id";
          // $conn->query($update_img) === true;
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $img_db;
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $id['id'] = $id_product;
          $insert = $this->adminModel->update_product_oder($paramas, $id);
          $data['error'] = "update Sản Phẩm Thành Công !";
        } else {
          $data['error'] = "Có lỗi xảy ra khi upload file";
        }
      } else {
        $data['error'] =  "Không upload được file!";
      }
    }
    return $this->view("Admin.product_oder_change", $data);
  }
  public function Delete_product_oder()
  {
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_oder($id_product_host);
  }
  // product oder
  public function List_DonMua_choxacnhan()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records();
    $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $data['limit'] = 20;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $data['total_page'] = ceil($data['total_records'] / $data['limit']);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($data['current_page'] > $data['total_page']) {
      $data['current_page'] = $data['total_page'];
    } else if ($data['current_page'] < 1) {
      $data['current_page'] = 1;
    }

    // Tìm Start
  
    $data['donmua'] = $this->productModel->Select_ALL_transaction_data_Cho_Xac_Nhan();
    return $this->view("Admin.list_DonMua_choxacnhan", $data);
  }
  public function Choxacnhan_upto_huydon()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $this->productModel->Update_transaction_data_to_id_Huy_Don_Hang($id);
  }
  public function Choxacnhan_upto_xacnhan()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $id_product = isset($_POST['id_product']) ? $_POST['id_product'] : "";
    $quantily = isset($_POST['quantily']) ? $_POST['quantily'] : "";
  
    $data = $this->productModel->Product_to_id($id_product);
    $soluong =1;
    foreach ($data as $sp) {
      $soluong = $sp["amount"];
      $soluong = $soluong - $quantily;
      $data = $this->productModel->Update_product_upto_soluong($id_product,$soluong);
    }
    $data = $this->productModel->Update_transaction_data_to_id_Xac_nhan($id);
  }
}
