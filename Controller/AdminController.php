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
 public function admin() {
  $data = [];
  if(isset($_POST['btnsubmit'])){
   $fileupload = isset($_POST['fileupload']) ? $_POST['fileupload'] : "";
   $nameproduct = isset($_POST['nameproduct']) ? $_POST['nameproduct'] : "";
   $price = isset($_POST['price']) ? $_POST['price'] : "";
   $category = isset($_POST['category']) ? $_POST['category'] : "";
   $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
   $namdescriptione = isset($_POST['description']) ? $_POST['description'] : "";
   if ($fileupload == "" || $nameproduct == "" || $price == "" || $category == "" || $amount == "" || $namdescriptione == "") {
    $data['error'] = "Thiếu Thông Tin Sản Phẩm";
   } else {
    $paramas = [];
    $paramas['names'] = $nameproduct;
    $paramas['images'] = $fileupload;
    $paramas['pirce'] = $price;
    $paramas['details'] = $namdescriptione;
    $paramas['amount'] = $amount;
    $paramas['product_id'] = $category;
    $insert = $this->adminModel->insert_product($paramas);
   }
   $data['error'] = "Thêm Sản Phẩm Thành Công !";

  }
  
  $data['category'] = $this->adminModel->getAll_category();
    
    return $this->view("Admin.index",$data);
 }
   public function user(){
    return $this->view("Admin.user");
   }
}
