<?php
session_start();

define('app_path',__DIR__);

require app_path."/../Model/Database.php";
require app_path."/../Controller/BaseController.php";


$controllerName = array_key_exists('controller',$_GET)?$_GET['controller']:'index';
$actionName = array_key_exists('action',$_GET)?$_GET['action']:'index';


$controller = ucwords(str_replace('-',' ',$controllerName));
$action = ucwords(str_replace('-',' ',$actionName));
// xóa dấu cách ở các từ
$controller = str_replace(' ','', $controller);
$action = str_replace(' ','', $action);
$acl = $controller .'.'.$action;

// echo "ACL: $acl <br>";
$classNameCtrl = $controller .'Controller';
//echo $controller;
//echo '<br>'. $action;
// kiểm tra tồn tại file và nhúng file
$file_controller = app_path.'/../Controller/'.$classNameCtrl.'.php';
if(!file_exists($file_controller)){
    die('File <b>'.$controller.'Controller.php</b> not found!');
}

// xuống đến đây là có tồn tại ==> nhúng code vào
require_once $file_controller;
// tạo đối tượng để chạy action
$objController = new $classNameCtrl();
$objController->checkACL($acl);
// var_dump($objController);
// kiểm tra tồn tại hàm (action)
if(!method_exists($objController,$action)){
    die('Action <b>'.$action.'</b> not exists!');
}
$objController->$action(); // gọi action ra chạy
// xong phần điều hướng action


?>

