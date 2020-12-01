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

  $this->productModel = new ProductModel();
 }
 public function admin(){
  return $this->view("Admin.index");
 }
}

?>