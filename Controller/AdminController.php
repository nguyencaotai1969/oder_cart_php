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

  return $this->view("Admin.addproduct", $data);
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
 public function Delete_Product_New()
 {
  $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
  $this->adminModel->delete_product_new($id_product_host);
 }
 public function product_new()
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

 public function Change_product_Sale(){
  $id = [];
  $id_product = isset($_GET['id']) ? $_GET['id'] : "";
  $data = [];
  $data['product'] = $this->adminModel->change_product_sale($id_product);
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
     $insert = $this->adminModel->update_product_sale($paramas, $id);
     $data['error'] = "Sửa Sản Phẩm Thành Công !";
    } else {
     $data['error'] = "Có lỗi xảy ra khi upload file";
    }
   } else {
    $data['error'] =  "Không upload được file!";
   }
  }
  return $this->view("Admin.product_sale_change", $data);
 }
 public function Delete_Product_Sale(){
  $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
  $this->adminModel->delete_product_sale($id_product_host);
 }
 public function Product_sale(){
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
  $data['product_host'] = $this->productModel->product_sale($data['start'], $data['limit']);
  return $this->view("Admin.list_product_sale", $data);
 }










 public function admin()
 {
  return $this->view("Admin.index");
 }
 public function user()
 {
  return $this->view("Admin.user");
 }
}
