<?php

class BaseController{
    const VIEW_FOLDER_NAME = "../View";
    const VIEW_MODEL_NAME = "../Model";
    protected function view($viewpath, array $data =[]){
        foreach($data as $item => $value){
            $$item = $value;
        }
        $viewpath =  self::VIEW_FOLDER_NAME.'/'.str_replace('.','/',$viewpath).'.php';
       
        require ($viewpath);
    }
    protected function loadModel($ModelPath){
        $viewpath =  self::VIEW_MODEL_NAME."/".$ModelPath.'.php';
        require_once ($viewpath);
    }
    public function checkSession()
    {
        if (!isset($_SESSION['username'])) {
            header("Location:?controller=index&action=login");
        } else {

            if (time() - $_SESSION["login_time_stamp"] > 200000) {
                session_unset();
                session_destroy();
                header("Location:?controller=admin&action=admin");
            }
        }
    }
    public function checkACL($pms){
        //1. Khai báo các quyền tự do.
        $public_acl = ['Index.Product_suggestion'
        , 'Index.Login', 'Index.Api_read_message' 
        , 'Index.Admin','Index.Logout', 'Index.Index'
        , 'Index.User_order_cart', 'Index.Change_profile'
        , 'Index.User_profile', 'Index.Slider', 'Index.Product_suggestion'
        ,'Index.Product_oders', 'Index.Product_new', 'Index.Product_host'
        , 'Index.All_product', 'Index.Search_product',
            "Index.Insert_user_message"
        , 'Index.Product_sale', 'Index.Register', 'Index.Select_id_product_order_user'
        ,'Index.Search_id_product_order_user','Admin.Login', 'Admin.Admin'
        ,'Index.Update_id_product_order_user', 'Index.Delete_id_product_order_user'
        ,'Index.Insert_transaction_data_to_user_order',"Index.Select_transaction_data_to_id_user_Cho_Xac_Nhan"
        ,'Index.Update_transaction_data_to_id_Huy_Don_Hang'
        ,'Index.Select_transaction_data_to_id_user_Da_Huy'
        ,'Index.Select_transaction_data_to_id_user_Da_Mua'
        ,'Index.Select_transaction_data_to_id_user_Dang_Giao'
        ,'Index.Select_transaction_data_to_id_user'
        ,'Index.Select_Slider_Product'
        ,'Index.Select_product_dong_gia'
        , 'Index.Api_user_read_message'
        ,'Index.Select_product_tuong_tu'
        ,'Index.Select_product_size'
        ,'Index.Check_address'];
        if(in_array($pms, $public_acl)) // nếu là chức năng public thì không cần kiểm tra
            return true;
        //2. Kiểm tra tài khoản đã đăng nhập hay chưa.
        // Nếu Action không có trong danh sách quyền tự do và tài khoản chưa đăng nhập
        // thì yêu cầu đăng nhập.
        if(empty($_SESSION['username'])){ // chưa đăng nhập thì yêu cầu đăng nhập
            header('Location:?controller=index&action=login');
        }else{
            //3.  đã đăng nhập
            $listACL = $_SESSION['username']['acl'];
                // var_dump($listACL);
            if(!in_array($pms, $listACL)){
                // khong co quyen
               die("Ban khong co quyen su dung chuc nang nay");
            }else{
                // co quyen
                return true;
            }
        }

        //3. Nếu đã đăng nhập thì kiểm tra danh sách quyền trong session có chứa chức năng
        // đang vào hay không?


    }

}

?>