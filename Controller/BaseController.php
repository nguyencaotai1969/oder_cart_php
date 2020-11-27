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

    public function checkACL($pms){
        //1. Khai báo các quyền tự do.
        $public_acl = ['Index.Index','Index.show','Index.Logout','Facebook.Index','Facebook.Fa2_facebook',
        'Mail_10minutes.Index','Api.Mail_minutes','Api.More_mail_minutes','Api.Api_extension','Api.Recover_mail_minutes','Facebook.Comment',
        'Api.New_mail_minutes','Facebook.Fa_fb','Facebook.Sub','Facebook.Laytoken','Facebook.Addtoken','Facebook.Like','Facebook.Listuser','Facebook.Newfeed','User.Index','Facebook.Cookies_render_token'];
        if(in_array($pms, $public_acl)) // nếu là chức năng public thì không cần kiểm tra
            return true;
        //2. Kiểm tra tài khoản đã đăng nhập hay chưa.
        // Nếu Action không có trong danh sách quyền tự do và tài khoản chưa đăng nhập
        // thì yêu cầu đăng nhập.
        // if(empty($_SESSION['username'])){ // chưa đăng nhập thì yêu cầu đăng nhập
        //     header('Location:?controller=index&action=index');
        // }else{
        //     //3.  đã đăng nhập
        //     $listACL = $_SESSION['username']['acl'];
        //         // var_dump($listACL);
        //     if(!in_array($pms, $listACL)){
        //         // khong co quyen
        //        die("Ban khong co quyen su dung chuc nang nay");
        //     }else{
        //         // co quyen
        //         return true;
        //     }
        // }

        //3. Nếu đã đăng nhập thì kiểm tra danh sách quyền trong session có chứa chức năng
        // đang vào hay không?


    }

}

?>