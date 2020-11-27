<?php 
class Database{
    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DB_NAME = "oderapp";
     
    public function conn(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $conn = mysqli_connect(self::HOST,self::USERNAME,self::PASSWORD,self::DB_NAME);
        $conn -> set_charset("utf8");
        if(mysqli_connect_errno()===0){
            return $conn;
        }
        return false;
    }
}

?>