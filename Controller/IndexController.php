<?php
include "Core/JWT/jwt.php";
include "Core/Dom/Rexgex.php";
include "Core/Validate/Validate.php";
class IndexController extends BaseController
{
    protected $userModel = 'userModel';
    protected $sliderModel = 'sliderModel';
    protected $productModel = 'productModel';
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

    public function logout()
    {
        session_start();
        $datalogin = [];
        $datalogin['user'] = $this->userModel->getLogin($datalogin);
        session_unset();
        session_destroy();
        header("location:?controller=index&action=login");
    }
    public function login()
    {
        header("Content-Type: text/html");

        $data = [];
        $datalogin = [];
        if (isset($_SESSION['username'])) {
            header("Location:?controller=admin&action=index");
        } else {
            if (isset($_POST['btnsubmit'])) {
                if ($_POST['username'] == "" || $_POST['password'] == "") {
                    $data['error'] = "<b style='color:Red'>Thiếu Trường Thông Tin</b>";
                } else {
                    $datalogin['username'] = $_POST['username'];
                    $datalogin['password'] = md5($_POST['password']);
                    $data_user = $this->userModel->getLogin($datalogin);
                    if (is_array($data_user)) {
                        if (preg_match("/^\S+[a-zA-Z]$/", $datalogin['username'])) {
                            unset($data_user['password']);
                            $_SESSION['username'] = $data_user;
                            $_SESSION["login_time_stamp"] = time();
                            // echo "<pre>";
                            // var_dump($_SESSION);
                            if( $_SESSION['username']['gid']==2){
                                 $data['error'] = "Bạn Không Có Quyền";
                                 session_unset();
                                session_destroy();
                            }else{
                            header("Location:?controller=admin&action=index");
                                
                            }
                        } else {
                            $data['error'] = "Tên Đăng Nhập Chỉ Được Phép Là Chữ";
                        }
                    } else {
                        $data['error'] = "Sai Tài Khoản Hoặc Mật Khẩu";
                    }
                }
            }
        }


        // if(isset($_SESSION['username']['username'])==true){
        //     header("Location:?controller=facebook&action=index");
        // }
        $data['user'] = $this->userModel->getAll();
        return $this->view("index.index", $data);
    }
    public function index()
    {
        $data = [];
        $datalogin = [];
        $username = isset($_GET['username']) ? $_GET['username'] : "";
        $password = isset($_GET['password']) ? $_GET['password'] : "";

        try {
            if (Rexgex::regex_username_login($username)) {
                $error['errors'] = "Có Kí Tự Đặc Biệt";
                echo json_encode($error);
            } else {
                if ($username == "" || $password == "") {
                    $error['errors'] = "Thiếu Trường Thông Tin";
                    echo json_encode($error);
                } else {

                    $datalogin['username'] = $username;
                    $datalogin['password'] = md5($password);
                    $data_user = $this->userModel->getLogin($datalogin);
                    if (isset($data_user)) {
                        unset($data_user['password']);
                        $data = json_encode($data_user['id'], JSON_UNESCAPED_UNICODE);
                        $jsonwebtoken = JWT::encode($data, "khoa_token");

                        $list = [];
                        // var_dump(data$)
                        $list_data = [
                            'sussecfully' => "sussecfully",
                            'id_user' => $data_user['id'],
                            'full_name' => $data_user['full_name'],
                            'username' => $datalogin['username'],
                            'token' => $jsonwebtoken,
                        ];

                        array_push($list, $list_data);
                        echo json_encode($list[0], JSON_NUMERIC_CHECK);

                        // echo json_encode($data_oders);
                        // encode string jwt
                        // $jsontk = json_decode($json_decode);

                    } else {
                        $error['errors'] = "Sai Tài Khoản Mật Khẩu";
                        echo json_encode($error);
                    }
                }
            }
        } catch (Exception $e) {
            $error['errors'] = "Lỗi Không Hợp Lệ !";
            echo json_encode($error);
        }
    }
    //api giai ma token user
    public function user_order_cart()
    {

        try {
            $token = isset($_GET['token']) ? $_GET['token'] : "";
            $json = JWT::decode($token, "khoa_token", true);
            $obj_id_user_oder = json_decode($json);
            $user_data_oder = $this->userModel->user_Oder($obj_id_user_oder);
            $data_oders = [];
            echo json_encode($user_data_oder, JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $error['errors'] = "Lỗi Token Không Hợp Lệ !";
            echo json_encode($error);
        }
    }
    public function change_profile()
    {
        try {
            $token = isset($_POST['token']) ? $_POST['token'] : "";
            $json = JWT::decode($token, "khoa_token", true);
            $obj_id_user_oder = json_decode($json);
            $image = isset($_POST['image']) ? $_POST['image'] : "";

            $paramas['image'] = $image;
            $id_user['id'] = $obj_id_user_oder;
            // var_dump($obj_id_user_oder);
            if (isset($_POST['email']) == true) {
                $paramas['email'] = $_POST['email'];

                if (Validate::Validate_email($_POST['email'])) {
                    if ($paramas['email'] == "") {
                        $error = [
                            1 => 1,
                            'errors' => "Thiếu Thông Tin",
                        ];
                        echo json_encode($error, JSON_NUMERIC_CHECK);
                    } else {
                        if ($this->userModel->check_email_isset_regiter($paramas['email']) > 0) {
                            $error = [
                                1 => 1,
                                'errors' => "Email Đã Tồn Tại",
                            ];
                            echo json_encode($error, JSON_NUMERIC_CHECK);
                        } else {
                            $user_data_oder = $this->userModel->change_email_profile_user($paramas, $id_user);
                            $sucesfull = [
                                1 => 2,
                                'sucesfull' => "Đổi Email Thành Công !",
                            ];
                            echo json_encode($sucesfull, JSON_NUMERIC_CHECK);
                        }
                    }
                } else {
                    $error = [
                        1 => 1,
                        'errors' => "Email Không Hợp Lệ",
                    ];
                    echo json_encode($error, JSON_NUMERIC_CHECK);
                }
            } else if (isset($_POST['phone']) == true) {
                $paramas['phone'] = isset($_POST['phone']) ? $_POST['phone'] : "";

                if ($paramas['phone'] == "") {
                    $error = [
                        1 => 1,
                        'errors' => "Thiếu Thông Tin",
                    ];
                    echo json_encode($error, JSON_NUMERIC_CHECK);
                } else {
                    if (Validate::validate_phone_number($paramas['phone']) == false) {
                        $error = [
                            1 => 1,
                            'errors' => "Số Điện Thoại Không Hợp Lệ",
                        ];
                        echo json_encode($error, JSON_NUMERIC_CHECK);
                    } else if ($this->userModel->check_Phone_isset_regiter($paramas['phone']) > 0) {
                        $error = [
                            1 => 1,
                            'errors' => "Số Điện Thoại Đã Được Sử Dụng",
                        ];
                        echo json_encode($error, JSON_NUMERIC_CHECK);
                    } else {
                        $sucesfull = [
                            1 => 2,
                            'sucesfull' => "Đổi Số Điện Thoại Thành Công !",
                        ];
                        echo json_encode($sucesfull, JSON_NUMERIC_CHECK);

                        $user_data_oder = $this->userModel->change_phone_profile_user($paramas, $id_user);
                    }
                }
            } else if (isset($_POST['passwords']) == true) {
                $passwrod = isset($_POST['passwords']) ? $_POST['passwords'] : "";
                $passwrod2 = isset($_POST['passwords2']) ? $_POST['passwords2'] : "";
                $paramas['passwords'] = md5($passwrod);
                if (strlen($passwrod) < 5 || strlen($passwrod2) < 5) {
                    $error = [
                        1 => 1,
                        'errors' => "Mật Khẩu Phải Lớn Hơn 5 Kí Tự",
                    ];
                    echo json_encode($error, JSON_NUMERIC_CHECK);
                } elseif ($passwrod != $passwrod2) {
                    $error = [
                        1 => 1,
                        'errors' => "Mật Khẩu Không Trùng Nhau !",
                    ];
                    echo json_encode($error, JSON_NUMERIC_CHECK);
                } else {
                    $sucesfull = [
                        1 => 2,
                        'sucesfull' => "Đổi Mật Khẩu Thành Công !",
                    ];
                    echo json_encode($sucesfull, JSON_NUMERIC_CHECK);

                    $user_data_oder = $this->userModel->change_phone_password_user($paramas, $id_user);
                }
            } else if (isset($_POST['upload'])) {
                $img = isset($_POST['upload']) ? $_POST['upload'] : "";
                $filename = "img" . rand() . ".jpg";
                $paramas['img'] = "img/" . $filename;
                echo file_put_contents("../public/img/" . $filename, base64_decode($img));
                $user_data_oder = $this->userModel->change_img_user($paramas, $id_user);
                if ($user_data_oder == false) {
                    $sucesfull = [
                        1 => 2,
                        'sucesfull' => "Up Ảnh Thành Công !",
                    ];
                    echo json_encode($sucesfull, JSON_NUMERIC_CHECK);
                }
            }

            // $data_oders =[];
            // var_dump($obj_id_user_oder->id);
            // echo "thanh cong";
            // echo json_encode($obj_id_user_oder,JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $error['errors'] = "Lỗi Token Không Hợp Lệ !";
            echo json_encode($error);
        }
    }
    // user profile
    public function user_profile()
    {
        try {
            $token = isset($_GET['token']) ? $_GET['token'] : "";
            $json = JWT::decode($token, "khoa_token", true);
            $obj_id_user_oder = json_decode($json);
            //    var_dump($obj_id_user_oder);
            $user_data_oder = $this->userModel->user_profile($obj_id_user_oder);
            // $data_oders =[];
            echo json_encode($user_data_oder, JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $error['errors'] = "Lỗi Token Không Hợp Lệ !";
            echo json_encode($error);
        }
    }
    //slider
    public function slider()
    {
        $slider = $this->sliderModel->getAll();
        // var_dump($slider);
        echo json_encode($slider, JSON_NUMERIC_CHECK);
    }

    // san pham goi y
    public function product_suggestion()
    {
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $productModel = $this->productModel->product_suggestion($start, $limit);
        // var_dump($slider);
        echo json_encode($productModel, JSON_NUMERIC_CHECK);
    }

    // san pham mua nhieu
    public function product_oders()
    {
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $productModel = $this->productModel->product_oders($start, $limit);
        // var_dump($slider);
        echo json_encode($productModel, JSON_NUMERIC_CHECK);
    }
    // san pham moi
    public function product_new()
    {

        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $product_new = $this->productModel->product_new($start, $limit);

        echo json_encode($product_new, JSON_NUMERIC_CHECK);
    }
    public function product_host()
    {
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $product_host = $this->productModel->product_host($start, $limit);

        echo json_encode($product_host, JSON_NUMERIC_CHECK);
    }
    public function all_product()
    {
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $product_new = $this->productModel->all_product($start, $limit);

        echo json_encode($product_new, JSON_NUMERIC_CHECK);
    }
    public function search_product()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : "";
        // addslashes($search);
        echo json_encode($this->productModel->search($search), JSON_NUMERIC_CHECK);
    }
    // san pham giam gia 
    public function product_sale()
    {
        $total_records = $this->productModel->count_total_records();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 20;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $product_sale = $this->productModel->product_sale($start, $limit);

        echo json_encode($product_sale, JSON_NUMERIC_CHECK);
    }
    // dang ki
    public function register()
    {
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : "";
        $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $error = [];
        if ($fullname == "" || $phone == "" || $email == "" || $password == "") {
            $error = [
                1 => 1,
                'errors' => "Bạn Chưa Nhập Đủ Thông Tin",
            ];
            echo json_encode($error, JSON_NUMERIC_CHECK);
        } else {
            if (Validate::validate_phone_number($phone) == false) {
                $error = [
                    1 => 1,
                    'errors' => "Số Điện Thoại Không Hợp Lệ",
                ];
                echo json_encode($error, JSON_NUMERIC_CHECK);
            } elseif (Validate::Validate_email($email)) {

                if ($this->userModel->check_email_isset_regiter($email) > 0) {
                    $error = [
                        1 => 1,
                        'errors' => "Email Đã Tồn Tại",
                    ];
                    echo json_encode($error, JSON_NUMERIC_CHECK);
                } else if ($this->userModel->check_Phone_isset_regiter($phone) > 0) {
                    $error = [
                        1 => 1,
                        'errors' => "Số Điện Thoại Đã Được Sử Dụng",
                    ];
                    echo json_encode($error, JSON_NUMERIC_CHECK);
                } else {
                    $slug_username = Rexgex::slug($fullname);
                    $paramas['fullname'] = $fullname;
                    $paramas['phone'] = $phone;
                    $paramas['email'] = $email;
                    $paramas['username'] = $slug_username;
                    $paramas['pass'] = md5($password);
                    $this->userModel->register($paramas);
                    $sucesfull = [
                        1 => 2,
                        'sucesfull' => "Đăng Kí Thành Công !",
                    ];
                    echo json_encode($sucesfull, JSON_NUMERIC_CHECK);
                }
            } else {
                $error = [
                    1 => 1,
                    'errors' => "Định Dạng Mail Không Hợp Lệ",
                ];
                echo json_encode($error, JSON_NUMERIC_CHECK);
            }
        }
    }
    // select order_user theo id
    public function select_id_product_order_user()
    {
        try {
            
            $id_user = isset($_GET['id_user'])?$_GET['id_user']:"";
            $id_product = isset($_GET['id_product'])?$_GET['id_product']:"";


            $check_id_product = $this->userModel->Select_id_user_order($id_user,$id_product);
            echo json_encode($check_id_product,JSON_NUMERIC_CHECK);     
                 
            
        } catch (Exception $e) {
            $error['errors'] = "Lỗi các trường không hợp lệ !";
            echo json_encode($error);
        }
    }
    // thêm quantily vào user_order
    public function search_id_product_order_user()
    {
        try {
    
            $id_user = isset($_POST['id_user'])?$_POST['id_user']:"";
            $id_product = isset($_POST['id_product'])?$_POST['id_product']:"";
            $quantily = isset($_POST['quantily'])?$_POST['quantily']:"";


            if ($id_user == "" || $id_product == "" || $quantily == "") {
                $errorNull['errors'] = "Lỗi trường thông tin đẩy lên !";
                echo json_encode($errorNull);
            } else {
                $paramas['id_user'] = $id_user;
                    $paramas['id_product'] = $id_product;
                    $paramas['quantily'] = $quantily;
               $check_id_product = $this->userModel->add_user_order($paramas);
                echo json_encode($check_id_product,JSON_NUMERIC_CHECK);     
            }     

            echo json_encode($check_id_product, JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $error['errors'] = "Lỗi các trường không hợp lệ !";
            echo json_encode($error);
        }
    }
    // update quantily vào user_order theo id_product
    public function update_id_product_order_user(){
        try {
           
            $id_user = isset($_POST['id_user'])?$_POST['id_user']:"";
            $id_product = isset($_POST['id_product'])?$_POST['id_product']:"";
            $quantily = isset($_POST['quantily'])?$_POST['quantily']:"";


            if ($id_user == "" || $id_product == "" || $quantily == "") {
                $errorNull['errors'] = "Lỗi trường thông tin đẩy lên !";
                echo json_encode($errorNull);
            } else {
                $paramas['id_user'] = $id_user;
                    $paramas['id_product'] = $id_product;
                    $paramas['quantily'] = $quantily;
               $check_id_product = $this->userModel->update_user_order($paramas);
                echo json_encode($check_id_product,JSON_NUMERIC_CHECK);     
            }   

        } catch (Exception $e) {
            $error['errors'] = "Lỗi các trường không hợp lệ !";
            echo json_encode($error);
        }
    }
    //xóa id_product trong bảng user_order
    public function delete_id_product_order_user()
    {
        try {
            
            $id_user = isset($_POST['id_user'])?$_POST['id_user']:"";
            $id_product = isset($_POST['id_product'])?$_POST['id_product']:"";

             if ($id_user == "" || $id_product == "") {
                $errorNull['errors'] = "Lỗi trường thông tin đẩy lên !";
                echo json_encode($errorNull);
            } else {
                $paramas['id_user'] = $id_user;
                $paramas['id_product'] = $id_product;

               $check_id_product = $this->userModel->delete_id_product_user_order($paramas);
                echo json_encode($check_id_product,JSON_NUMERIC_CHECK);     
            }  
            
        } catch (Exception $e) {
            $error['errors'] = "Lỗi các trường không hợp lệ !";
            echo json_encode($error);
        }
    }
    //Chuyển sản phẩm từ order_user sang bảng transaction_data
    public function insert_transaction_data_to_user_order()
    {
        try {
        
            $id_user = isset($_POST['id_user'])?$_POST['id_user']:"";
            $id_product = isset($_POST['id_product'])?$_POST['id_product']:"";
            $quantily = isset($_POST['quantily'])?$_POST['quantily']:"";
            $name = isset($_POST['name'])?$_POST['name']:"";
            $address = isset($_POST['address'])?$_POST['address']:"";
            $phone = isset($_POST['phone'])?$_POST['phone']:"";

             if ($id_user == "" || $id_product == "") {
                $errorNull['errors'] = "Lỗi trường thông tin đẩy lên !";
                echo json_encode($errorNull);
            } else {
                $paramas['id_user'] = $id_user;
                $paramas['id_product'] = $id_product;
                $paramas['quantily'] = $quantily;
                $paramas['name'] = $name;
                $paramas['address'] = $address;
                $paramas['phone'] = $phone;

               $check_id_product = $this->userModel->insert_transaction_data($paramas);
                echo json_encode($check_id_product,JSON_NUMERIC_CHECK);     
            }  
            
        } catch (Exception $e) {
            $error['errors'] = "Lỗi các trường không hợp lệ !";
            echo json_encode($error);
        }
    }
    
}
