<?php
class UserModel extends Database{
    protected  $conn;
    private $user = 'user';
    public function __construct()
    {
        $this->conn = $this->conn();
        // $this->Database = new Database();
    }
    public function getLogin($paramas){
    $conn = $this->conn();
    $sql = "SELECT * FROM $this->user WHERE email = '{$paramas['username']}' or Phone = '{$paramas['username']}'";
    $result =  $conn->query($sql);
    if($conn->errno){
        die('error query'.$conn->error);
    }if($result->num_rows == 1){
        $urows  = $result->fetch_assoc();
        if($urows['password']==$paramas['password']){
            return $urows;

        }
        
    }

}   
public function check_email_isset_regiter($email){
     $conn = $this->conn();
    $sql="SELECT * from user where email='$email'";
                    $kt=mysqli_query($conn, $sql);
                        return mysqli_num_rows($kt);
                  }
                  public function check_Phone_isset_regiter($Phone){
     $conn = $this->conn();
    $sql="SELECT * from user where Phone='$Phone'";
                    $kt=mysqli_query($conn, $sql);
                        return mysqli_num_rows($kt);
                  }
   
public function user_Oder($id_user){
    $conn = $this->conn();
    $select = "SELECT * FROM product JOIN user_order on product.id = user_order.id_product WHERE user_order.id_user =$id_user";
    $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result &&  $result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {  
                // echo "<pre>";
                // var_dump($row);
                $data[] = $row;
            }
            return $data;
          } else {
                return $data =[
                    "user_null_oder" =>"Bạn Chưa Đặt Sản Phẩm Nào !"
                ];
          }     
         
}

    public function getAll(){
        $conn = $this->conn();
        $select = "SELECT * From user";   
        $result =  $conn->query($select);
        $data = [];
        if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {  
                // echo "<pre>";
                // var_dump($row);
                $data[] = $row;
            }
          } else {
                echo "0 results";
          }     
          return $data;
    }
    public function CheckAclDB($gid){
        $sql = "SELECT tb_permission.id, tb_permission.name FROM `tb_g_p` 
                INNER JOIN tb_permission ON  tb_g_p.pms_id = tb_permission.id
                WHERE tb_g_p.gid = $gid";
        $objConn=$this->conn;
        $res=$objConn->query($sql);
        if($objConn->errno){
            die('Error query CheckAclDB: '.$objConn->error);
        }
        $acl = [];
        if($res->num_rows>0){

            while ($row = $res->fetch_assoc()){
                $acl[] = $row['name'];
            }
        }

        return $acl;
    }
    public function register($paramas){
        $conn = $this->conn();
        $insert_sql = "INSERT INTO `user`(`id`,`full_name`,`Phone`,`email`,`username`,`password`,`img`) VALUES
        (null,'{$paramas['fullname']}','{$paramas['phone']}','{$paramas['email']}','{$paramas['username']}','{$paramas['pass']}',DEFAULT)";
         $conn->query($insert_sql) === true;
    } 
    public function finByid($id){
        return __METHOD__;
    }
    public function delete(){
        return __METHOD__;
    }
    
    
}


?>
