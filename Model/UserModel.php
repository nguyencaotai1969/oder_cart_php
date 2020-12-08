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
                $urows['acl'] = $this->CheckAclDB($urows['gid']);
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
   public function user_profile($id_user){
       $conn = $this->conn();
    $select = "SELECT full_name,Phone,email,img FROM user where user.id =$id_user";
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
          }    
         
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
public function change_email_profile_user($paramas,$id){
             $conn = $this->conn();
        $UPDATE = "UPDATE `user` SET `email` = '{$paramas['email']}' WHERE `user`.`id` = {$id['id']}";
         $conn->query($UPDATE) === true;
}
public function change_phone_profile_user($paramas,$id){
                 $conn = $this->conn();

     $UPDATE = "UPDATE `user` SET `Phone`='{$paramas['phone']}'
     WHERE `user`.`id` = {$id['id']}";
             $conn->query($UPDATE) === true;

}
    public function change_phone_password_user($paramas,$id){
                    $conn = $this->conn();

        $UPDATE = "UPDATE `user` SET `password`='{$paramas['passwords']}'
        WHERE `user`.`id` = {$id['id']}";
        // echo $UPDATE;
                $conn->query($UPDATE) === true;

    }
    public function change_img_user($paramas,$id){
        $conn = $this->conn();

        $UPDATE = "UPDATE `user` SET `img`='{$paramas['img']}'
                WHERE `user`.`id` = {$id['id']}";
        // echo $UPDATE;
        $conn->query($UPDATE) === true;

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
        $insert_sql = "INSERT INTO `user`(`id`,`full_name`,`Phone`,`email`,`username`,`password`,`img`,`gid`) VALUES
        (null,'{$paramas['fullname']}','{$paramas['phone']}','{$paramas['email']}','{$paramas['username']}','{$paramas['pass']}',DEFAULT,2)";
         $conn->query($insert_sql) === true;
    } 
    public function finByid($id){
        return __METHOD__;
    }
    public function delete(){
        return __METHOD__;
    }



    //Select user_order theo id
    public function  Select_id_user_order($id_user,$id_product){
        $conn = $this->conn();
        $select = "SELECT user_order.*,product.name,product.image,product.pirce,product.details,product.amount,product.product_id FROM `user_order` 
        INNER JOIN product ON user_order.id_product = product.id WHERE id_user = $id_user AND id_product = $id_product";
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
                    "user_null_oder" =>"Sản phẩm chưa có trong giỏ!"
                ];
          }  

    }  
    //thêm vào user_order
    public function  add_user_order($paramas){
        $conn = $this->conn();
        $select = "INSERT INTO `user_order`(`id_user`, `id_product`, `amount_user_oder`) VALUES ('{$paramas['id_user']}','{$paramas['id_product']}','{$paramas['quantily']}')";
        $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result >0) {
                $data =[
                    "user_oder" =>"đã thêm vào giỏ"];
            return $data;
          } else {
                return $data =[
                    "Error" =>"lỗi"
                ];
          }  

    }   
        //update lại vào user_order
    public function update_user_order($paramas){
        $conn = $this->conn();
        $select = "UPDATE `user_order` SET `amount_user_oder`= '{$paramas['quantily']}' WHERE `id_user`= '{$paramas['id_user']}' AND `id_product`= '{$paramas['id_product']}' ";
        $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result >0) {
                $data =[
                    "user_oder" =>"đã thêm vào giỏ"];
            return $data;
          } else {
                return $data =[
                    "Error" =>"lỗi"
                ];
          }  

    }   
    // xóa theo id sản phẩm trong user_cart
    public function delete_id_product_user_order($paramas){
            $conn = $this->conn();
            $select = "DELETE FROM `user_order` WHERE id_user = '{$paramas['id_user']}' AND id_product = '{$paramas['id_product']}' ";
            $result = mysqli_query($conn,$select);
        //  $data = [];
            if ( $result >0) {
                    $data =[
                        "user_oder" =>"xóa thành công"];
                return $data;
              } else {
                    return $data =[
                        "Error" =>"lỗi"
                    ];
              }  

        }
        // Thêm dữ liệu từ bảng user_oder sang lưu trữ transaction_data
    public function insert_transaction_data($paramas){
        $conn = $this->conn();
        $date = getdate();
        $update =$date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
    
        $select = "INSERT INTO `transaction_data`(`id_user`, `id_product`, `quantity`, `date` ,`name`, `address`, `phone`) 
        VALUES ('{$paramas['id_user']}','{$paramas['id_product']}','{$paramas['quantity']}','$update','{$paramas['name']}',
        '{$paramas['address']}','{$paramas['phone']}') ";
        $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result >0) {
                $data =[
                    "user_oder" =>"Chuyển sang trạng thái giao hàng"];
            return $data;
          } else {
                return $data =[
                    "Error" =>"lỗi"
                ];
          }  

    }
    
    
    
}


?>
