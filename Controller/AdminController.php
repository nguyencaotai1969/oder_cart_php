<?php
class AdminController extends BaseController
{

 public function __construct()
 {
  $this->loadModel('UserModel');
  $this->userModel = new UserModel();

  $this->loadModel('SliderModel');

  $this->sliderModel = new SliderModel();

  $this->loadModel('ProductModel');
  $this->checkSession();
  $this->productModel = new ProductModel();

  $this->loadModel("AdminModel");
  $this->adminModel = new AdminModel();
 }
 public function admin()
 {
  $fileupload = isset($_POST['fileupload'])? $_POST['fileupload']:"";
  $nameproduct = isset($_POST['nameproduct']) ? $_POST['nameproduct'] : "";
  $price = isset($_POST['price']) ? $_POST['price'] : "";
  $category = isset($_POST['category']) ? $_POST['category'] : "";
  $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
  $namdescriptione = isset($_POST['description']) ? $_POST['description'] : "";
    
  $data =[];
  
  $data['category'] = $this->adminModel->getAll();
  return $this->view("Admin.index",$data);
 }
 public function user(){
  return $this->view("Admin.user");
 }
}
