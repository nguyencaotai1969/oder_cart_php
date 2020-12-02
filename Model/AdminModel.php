<?php
class AdminModel extends Database
{
    protected  $conn;
    private $product = 'product';
    public function __construct()
    {
        $this->conn = $this->conn();
        // $this->Database = new Database();
    }
    public function update_product_host($paramas,$id){
  $conn = $this->conn();
  $UPDATE = "UPDATE `product` set  `name` = '{$paramas['names']}', `image` = '{$paramas['images']}', `pirce`='{$paramas['pirce']}', `details`='{$paramas['details']}', `amount`='{$paramas['amount']}', `product_id`='{$paramas['product_id']}' 
    where id = '{$id['id']}'";
  $conn->query($UPDATE) === true;
    }
    public function insert_product($paramas){
     $conn = $this->conn();
     $insert = "INSERT INTO `product` (`id`, `name`, `image`, `pirce`, `details`, `amount`, `product_id`) 
     VALUES (NULL, '{$paramas['names']}', '{$paramas['images']}', '{$paramas['pirce']}', '{$paramas['details']}', '{$paramas['amount']}', '{$paramas['product_id']}')";
     $conn->query($insert) === true;
    }
    public function change_product_host($id){
      $conn = $this->conn();
      $result = mysqli_query($conn, "SELECT * FROM product where product_id = 5 and id = $id");
      $data = [];
      if ($result && $result->num_rows > 0) {

       // output data of each row
       while ($row = $result->fetch_assoc()) {

        $data[] = $row;
       }
       return $data;
      } else {
       return $data = [
        "error" => "Khong tim thay ket qua!"
       ];
      }
    }
    public function delete_product_host($id){
    $conn = $this->conn();
    $DELETE = "DELETE FROM `product` WHERE `product`.`id` = $id";
    $conn->query($DELETE) === true;
    }
   public function getAll_category()
   {
    $conn = $this->conn();
    $select = "SELECT * from category";
    $result =  $conn->query($select);
    $data = [];
    if ($result->num_rows > 0) {
     // output data of each row
     while ($row = $result->fetch_assoc()) {
      // echo "<pre>";
      // var_dump($row);
      $data = $row;
     }
    } else {
     echo "0 results";
    }
    return $data;
   }
   public function getAll_User()
   {
    $conn = $this->conn();
    $select = "SELECT user.id,user.full_name,user.Phone,user.email,user.username,user.img,user.gid,tb_group_user.name 
    FROM user LEFT OUTER JOIN tb_group_user ON user.gid = tb_group_user.id WHERE user.gid = 2";
    $result =  $conn->query($select);
    $data = [];
    if ($result->num_rows > 0) {
     // output data of each row
     while ($row = $result->fetch_assoc()) {
      // echo "<pre>";
      // var_dump($row);
      $data[] = $row;
      
     }
    } else {
     echo "0 results";
    }
    return $data;
   }
   public function getAll_Slider()
   {
    $conn = $this->conn();
    $select = "SELECT * FROM `silder`";
    $result =  $conn->query($select);
    $data = [];
    if ($result->num_rows > 0) {
     // output data of each row
     while ($row = $result->fetch_assoc()) {
      // echo "<pre>";
      // var_dump($row);
      $data[] = $row;
      
     }
    } else {
     echo "0 results";
    }
    return $data;
   }
   public function insert_slider($paramas){
    $conn = $this->conn();
    $insert = "INSERT INTO `silder`(`name`, `image`) VALUES ('{$paramas['names']}','{$paramas['images']}') ";
    $conn->query($insert) === true;
   }

   public function update_slider($paramas){
    $conn = $this->conn();
    $insert = "UPDATE `silder` SET `name`='{$paramas['names']}',`image`='{$paramas['images']}' WHERE id = '{$paramas['id']}' ";
    $conn->query($insert) === true;
   }
   public function delete_slider($paramas){
    $conn = $this->conn();
    $insert = "DELETE FROM `silder` WHERE id = '{$paramas['id']}' ";
    $conn->query($insert) === true;
   }
 }