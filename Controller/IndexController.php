<?php
include "Core/JWT/jwt.php"; 
include "Core/Dom/Rexgex.php"; 
include "Core/Validate/Validate.php"; 
class IndexController extends BaseController{
    protected $userModel = 'userModel';
    protected $sliderModel ='sliderModel';
    protected $productModel ='productModel';
    public function __construct()
    {
             $this->loadModel('UserModel');
             $this->userModel = new UserModel();

             $this->loadModel('SliderModel');

             $this->sliderModel = new SliderModel();


             $this->loadModel('ProductModel');

             $this->productModel = new ProductModel();
             header('Content-type: application/json');

    }
 
    // public function logout(){
    //         session_start();
    //         $datalogin = [];
    //         $datalogin['user'] = $this->userModel->getLogin($datalogin);
    //         session_unset();
    //         session_destroy();
    //         header("location:?controller=index&action=index");
    // }
    
    public function index(){
        $data = [];
        $datalogin = [];
        $username = isset($_GET['username'])?$_GET['username']:"";
        $password = isset($_GET['password'])?$_GET['password']:"";
       
       try{
        if($username==""||$password==""){
            $error['errors'] = "Thiếu Trường Thông Tin";
            echo json_encode($error);

        }else{
           
            $datalogin['username'] = $username;
            $datalogin['password'] = md5($password);
            $data_user = $this->userModel->getLogin($datalogin);
                if(isset($data_user)){
                    
                    unset($data_user['password']);
                    $data = json_encode($data_user,JSON_UNESCAPED_UNICODE);
                    // create string jwt
                    $jsonwebtoken = JWT::encode($data, "khoa_token");
                   
                    $list =[]; 
                    // var_dump(data$)
                    $list_data =[
                        'sussecfully'=>"sussecfully",
                        'id_user'=>$data_user['id'],
                        'full_name'=>$data_user['full_name'],
                        'username'=> $datalogin['username'],
                        'token'=>$jsonwebtoken
                    ];

                    array_push($list,$list_data);
                    echo json_encode($list[0],JSON_NUMERIC_CHECK);
                   
                    // echo json_encode($data_oders);
                    // encode string jwt
                    // $jsontk = json_decode($json_decode);
                    

                }else{
                    $error['errors'] = "Sai Tài Khoản Mật Khẩu";
                    echo json_encode($error);

                }
            
           
        }
       }catch(Exception $e){
        $error['errors'] = "Lỗi Không Hợp Lệ !";
        echo json_encode($error);
       }
        
    
          
            
    }   
    //api giai ma token user
    public function user_order_cart(){

        try {
            $token = isset($_GET['token'])?$_GET['token']:"";
            $json = JWT::decode($token, "khoa_token", true);
            $obj_id_user_oder =  json_decode($json);
            $user_data_oder = $this->userModel->user_Oder($obj_id_user_oder->id);
            $data_oders =[];                     
            echo json_encode($user_data_oder,JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $error['errors'] = "Lỗi Token Không Hợp Lệ !";
            echo json_encode($error);
        }
      
    }
    //slider
    public function slider(){
        $slider = $this->sliderModel->getAll();
        // var_dump($slider);
        echo json_encode($slider,JSON_NUMERIC_CHECK);
    }

    // san pham goi y
    public function product_suggestion(){
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $productModel = $this->productModel->product_suggestion($start, $limit);
        // var_dump($slider);
        echo json_encode($productModel,JSON_NUMERIC_CHECK);
    }
 
    // san pham mua nhieu
    public function product_oders(){
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $productModel = $this->productModel->product_oders($start, $limit);
        // var_dump($slider);
        echo json_encode($productModel,JSON_NUMERIC_CHECK);
    }
    // san pham moi
    public function product_new(){
        
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20; 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $product_new = $this->productModel->product_new($start, $limit);

        echo json_encode($product_new,JSON_NUMERIC_CHECK);
        
    }
    public function all_product(){
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $product_new = $this->productModel->all_product($start, $limit);

        echo json_encode($product_new,JSON_NUMERIC_CHECK);
    }
    public function search_product(){
        $search = isset($_GET['search'])?$_GET['search']:"";
        // addslashes($search);
        echo json_encode($this->productModel->search($search),JSON_NUMERIC_CHECK);
    }
    // dang ki
    public function register(){
      $fullname = isset($_POST['fullname'])?$_POST['fullname']:"";
      $phone = isset($_POST['phone'])?$_POST['phone']:"";
      $email = isset($_POST['email'])?$_POST['email']:"";
      $password = isset($_POST['password'])?$_POST['password']:"";
      $error =[];
      if($fullname== ""||$phone==""||$email==""||$password==""){
        $error = [
            1=>1,
            'errors'=>"Bạn Chưa Nhập Đủ Thông Tin"
        ];
        echo json_encode($error,JSON_NUMERIC_CHECK);
      }else{
         if(Validate::validate_phone_number($phone)==false){
                $error = [
                    1=>1,
                    'errors'=>"Số Điện Thoại Không Hợp Lệ"
                ];
                echo json_encode($error,JSON_NUMERIC_CHECK);        
            }elseif(Validate::Validate_email($email)){

            if($this->userModel->check_email_isset_regiter($email) > 0){
                $error = [
                    1=>1,
                    'errors'=>"Email Đã Tồn Tại"
                ];
                echo json_encode($error,JSON_NUMERIC_CHECK);
            }else if($this->userModel->check_Phone_isset_regiter($phone) > 0){
                 $error = [
                    1=>1,
                    'errors'=>"Số Điện Thoại Đã Được Sử Dụng"
                ];
                echo json_encode($error,JSON_NUMERIC_CHECK);
            }

            else{
                $slug_username = Rexgex::slug($fullname);
              $paramas['fullname'] = $fullname;
              $paramas['phone'] = $phone;
              $paramas['email'] = $email;
              $paramas['username'] = $slug_username;      
              $paramas['pass'] = md5($password);
              $this->userModel->register($paramas);
              $sucesfull = [
                    1=>2,
                    'sucesfull'=>"Đăng Kí Thành Công !"
                ];
                echo json_encode($sucesfull,JSON_NUMERIC_CHECK);
            }
             
          }else{
            $error = [
                        1=>1,
                        'errors'=>"Định Dạng Mail Không Hợp Lệ"
        ];
        echo json_encode($error,JSON_NUMERIC_CHECK);          }
        

      }
     

    }

}

?>

