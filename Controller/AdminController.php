<?php
include "Core/Dom/Rexgex.php";
include "Core/Validate/Validate.php";
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
  // day la them san pham ===========================================================
  public function add_product()
  {
    $data = [];


    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
      if (Rexgex::regex_number($price) || Rexgex::regex_number($amount)) {
        $data['error'] = "Số Lượng Sản Phẩm Và Giá Sản Phẩm Chỉ Được Nhập Số !";
      }else{
        $dt = Validate::up_img();
        if (isset($dt['error']['sucssec']) == 1) {
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $dt['error']['name_file'];
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $insert = $this->adminModel->insert_product($paramas);
          Rexgex::switch_data($category);

          $data['error'] = "<b style='color:green'>Thêm Sản Phẩm Thành Công !</b>";

          // ;
        } else {
          $data['error'] = Validate::up_img()['error'];
        }
      }
     
      
    }


    $data['category'] = $this->adminModel->getAll_category();
    // var_dump( $data['category']);
    return $this->view("Admin.addproduct", $data);
  }




  /// day la san pham host ================================================================
  public function product_host()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records_admin(5);
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
    return $this->view("Admin.product_host.list_product_host", $data);
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
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
          if(Rexgex::regex_number($price) || Rexgex::regex_number($amount)  )
          {
            $data['error'] = "Số Lượng Sản Phẩm Và Giá Sản Phẩm Chỉ Được Nhập Số !";
          }else{
             $dt = Validate::up_img();
                if (isset($dt['error']['sucssec']) == 1) {
                
                  
                $paramas = [];
                $paramas['names'] = $nameproduct;
                $paramas['images'] = $dt['error']['name_file'];
                $paramas['pirce'] = $price;
                $paramas['details'] = $namdescriptione;
                $paramas['amount'] = $amount;
                $paramas['product_id'] = $category;
                $id = $id_product;
                $insert = $this->adminModel->update_product_host($paramas, $id);
                $data['error'] = "Sửa Sản Phẩm Thành Công !";
                Rexgex::switch_data($category);
                } else {
                  $data['error'] = Validate::up_img()['error'];
                }
          }
     
      


    }
    return $this->view("Admin.product_host.product_change", $data);
  }
  /// day la san pham moi ================================================================

  public function Product_new()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records_admin(1);
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
    return $this->view("Admin.product_new.list_product_new", $data);
  }

  public function Change_product_New()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_new($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
        if(Rexgex::regex_number($price) || Rexgex::regex_number($amount)  )
          {
            $data['error'] = "Số Lượng Sản Phẩm Và Giá Sản Phẩm Chỉ Được Nhập Số !";
          }else{
             $dt = Validate::up_img();
                if (isset($dt['error']['sucssec']) == 1) {
                  $paramas = [];
                  $paramas['names'] = $nameproduct;
                  $paramas['images'] = $dt['error']['name_file'];
                  $paramas['pirce'] = $price;
                  $paramas['details'] = $namdescriptione;
                  $paramas['amount'] = $amount;
                  $paramas['product_id'] = $category;
                  $id = $id_product;
                  $insert = $this->adminModel->update_product_new($paramas, $id);
                  $data['error'] = "Sửa Sản Phẩm Thành Công !";
                  Rexgex::switch_data($category);
                } else {
                  $data['error'] = Validate::up_img()['error'];
                }
          }
      
    


    }
    return $this->view("Admin.product_new.product_new_change", $data);
  }
  public function delete_product_new()
  {
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_host($id_product_host);
  }

  /// day la san pham sale ================================================================



  public function Product_sale()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records_admin(4);
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
    return $this->view("Admin.product_sale.list_product_sale", $data);
  }

  public function Change_product_sale()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_new($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
      if (Rexgex::regex_number($price) || Rexgex::regex_number($amount)) {
        $data['error'] = "Số Lượng Sản Phẩm Và Giá Sản Phẩm Chỉ Được Nhập Số !";
      } else {
        $dt = Validate::up_img();
        if (isset($dt['error']['sucssec']) == 1) {
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $dt['error']['name_file'];
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $id = $id_product;
          $insert = $this->adminModel->update_product_sale($paramas, $id);
          $data['error'] = "Sửa Sản Phẩm Thành Công !";
          Rexgex::switch_data($category);
        } else {
          $data['error'] = Validate::up_img()['error'];
        }
      }
    }
    return $this->view("Admin.product_sale.product_sale_change", $data);
  }
  public function Delete_Product_Sale(){
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_sale($id_product_host);

  }

  /// day la san pham goi y ================================================================




  public function Product_suggestion()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_records_admin(3);
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
    return $this->view("Admin.product_suggestion.list_product_suggestion", $data);
  }
  public function Change_product_suggestion()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_suggestion($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
      if (Rexgex::regex_number($price) || Rexgex::regex_number($amount)) {
        $data['error'] = "Số Lượng Sản Phẩm Và Giá Sản Phẩm Chỉ Được Nhập Số !";
      } else {
        $dt = Validate::up_img();
        if (isset($dt['error']['sucssec']) == 1) {
          $paramas = [];
          $paramas['names'] = $nameproduct;
          $paramas['images'] = $dt['error']['name_file'];
          $paramas['pirce'] = $price;
          $paramas['details'] = $namdescriptione;
          $paramas['amount'] = $amount;
          $paramas['product_id'] = $category;
          $id = $id_product;
          $insert = $this->adminModel->update_product_suggestion($paramas, $id);

          $data['error'] = "Sửa Sản Phẩm Thành Công !";
          Rexgex::switch_data($category);
        } else {
          $data['error'] = Validate::up_img()['error'];
        }
      }
     
    }
    return $this->view("Admin.product_suggestion.product_suggestion_change", $data);
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
    $data['total_records'] = $this->productModel->count_total_records_admin(2);
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
    return $this->view("Admin.product_order.list_product_oder", $data);
  }
  public function Change_product_oder()
  {
    $id = [];
    $id_product = isset($_GET['id']) ? $_GET['id'] : "";
    $data = [];
    $data['product'] = $this->adminModel->change_product_oder($id_product);
    $data['category'] = $this->adminModel->getAll_category();
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $nameproduct = isset($_POST['names']) ? $_POST['names'] : "";
    $price = isset($_POST['pirce']) ? $_POST['pirce'] : "";
    $category = isset($_POST['product_id']) ? $_POST['product_id'] : "";
    $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
    $namdescriptione = isset($_POST['details']) ? $_POST['details'] : "";


    if ($nameproduct == "" || $fileupload == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
      $dt = Validate::up_img();
      if (isset($dt['error']['sucssec']) == 1) {
        $paramas = [];
        $paramas['names'] = $nameproduct;
        $paramas['images'] = $dt['error']['name_file'];
        $paramas['pirce'] = $price;
        $paramas['details'] = $namdescriptione;
        $paramas['amount'] = $amount;
        $paramas['product_id'] = $category;
        $id = $id_product;
        $insert = $this->adminModel->update_product_oder($paramas, $id);

        $data['error'] = "Sửa Sản Phẩm Thành Công !";
        Rexgex::switch_data($category);
      } else {
        $data['error'] = Validate::up_img()['error'];
      }
    
    }
    return $this->view("Admin.product_order.product_oder_change", $data);
  }
  public function Delete_product_oder()
  {
    $id_product_host = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->delete_product_oder($id_product_host);
  }


  //phan cua user =======================================
  public function user()
  {
    $data = [];
    $data['total_records'] = $this->productModel->count_total_user();
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


  // phan cua silder =================================================================
  public function slider()
  {
    $data['list_member'] = $this->adminModel->getAll_Slider();
    return $this->view("Admin.Slider.slider", $data);    
  }
  public function Add_slider()
  {
    $data = [];
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $name = isset($_POST['names']) ? $_POST['names'] : "";
    if ($name == "" || $fileupload == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {
      
      $dt = Validate::up_img();
      if (isset($dt['error']['sucssec']) == 1) {
       
        $paramas['names'] = $name;
        $paramas['images'] = $dt['error']['name_file'];
        $this->adminModel->insert_slider($paramas);
        $data['error'] = "<b style='color:green'>Thêm Slider Thành Công !</b>";
        header("Location:?controller=admin&action=slider");
      } else {
        $data['error'] = Validate::up_img()['error'];
      }
    }
    return $this->view("Admin.Slider.addslider", $data);
  }
  public function Update_slider()
  {
    $data = [];
    $fileupload = isset($_FILES['file']) ? $_FILES['file'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $data['slider'] = $this->adminModel->change_slider($id);
    $name = isset($_POST['names']) ? $_POST['names'] : "";
    if ($id == "" || $name == "" || $fileupload == "") {
      $data['error'] = "Thiếu Thông Tin Sản Phẩm";
      // echo 1;
    } else {



      $data = Validate::up_img();
      if (isset($data['error']['sucssec']) == 1) {
        $paramas['names'] = $name;
        $paramas['images'] = $data['error']['name_file'];
         $paramas['id'] = $id;
        $insert = $this->adminModel->update_slider($paramas);
        $data['error'] = "<b style='color:green'>Thêm Slider Thành Công !</b>";
        header("Location:?controller=admin&action=slider");
      } else {
        $data['error'] = Validate::up_img()['error'];
      }

   
    }

    return $this->view("Admin.Slider.updateslider", $data);
  }
  public function Delete_slider()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $this->adminModel->Delete_slider($id);
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
    $data['start'] = ($data['current_page'] - 1) * $data['limit'];
    $data['donmua'] = $this->productModel->Select_ALL_transaction_data_Cho_Xac_Nhan($data['start'], $data['limit']);
    return $this->view("Admin.product_DonMua.list_DonMua_choxacnhan", $data);
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
  public function List_DonMua_dahuy()
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
    $data['donmua'] = $this->productModel->Select_ALL_transaction_data_Da_Huy($data['start'],$data['limit']);
    return $this->view("Admin.product_DonMua.List_DonMua_dahuy", $data);
  }
  public function List_DonMua_DangGiao()
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

    $data['donmua'] = $this->productModel->Select_ALL_transaction_data_Dang_giao($data['start'],$data['limit']);
    return $this->view("Admin.product_DonMua.List_DonMua_danggiao", $data);
  }
  public function DangGiao_upto_DaNhan()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $this->productModel->Update_transaction_data_to_id_Da_giao($id);
  }
  public function List_DonMua_DaMua()
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
    $data['donmua'] = $this->productModel->Select_ALL_transaction_data_Da_Mua($data['start'],$data['limit']);
    return $this->view("Admin.product_DonMua.List_DonMua_damua", $data);
  }
}
