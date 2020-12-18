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
  public function Revenue(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-12-01' and '2020-12-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueXI(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-11-01' and '2020-11-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueX(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-10-01' and '2020-10-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueIX(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-09-01' and '2020-09-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueVIII(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-08-01' and '2020-08-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueVII(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-07-01' and '2020-07-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueVI(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-06-01' and '2020-06-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueV(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-05-01' and '2020-05-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueIV(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-04-01' and '2020-04-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueIII(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-03-01' and '2020-03-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueII(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-02-01' and '2020-02-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function RevenueI(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data 
    JOIN product ON transaction_data.id_product=product.id WHERE status = 2
      AND transaction_data.date between '2020-01-01' and '2020-01-31' ");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function check(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM transaction_data JOIN product ON transaction_data.id_product=product.id WHERE status = 0");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  public function select_data_product_litmit(){
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 1");
    $data = [];
    if ($result && $result->num_rows > 0) {

      // output data of each row
      while ($row = $result->fetch_assoc()) {

        $data[] = $row;
      }
      return $data;
    }
  }
  //isert slider product
  public function insert_slider_product($paramass,$id)
  {
    $conn = $this->conn();
    $insert = "INSERT INTO `slider_product` (`id`, `img`, `id_product`) VALUES (NULL, '{$paramass['images']}', '$id')";
    $conn->query($insert) === true;
  }
  public function update_product_host($paramas, $id)
  {
    $conn = $this->conn();
    $UPDATE = "UPDATE `product` set  `name` = '{$paramas['names']}', `image` = '{$paramas['images']}', `pirce`='{$paramas['pirce']}', `details`='{$paramas['details']}', `amount`='{$paramas['amount']}', `product_id`='{$paramas['product_id']}' 
    where id = '$id'";
    $conn->query($UPDATE) === true;
  }
  public function update_product_new($paramas, $id)
  {
    $conn = $this->conn();
    $UPDATE = "UPDATE `product` set  `name` = '{$paramas['names']}', `image` = '{$paramas['images']}', `pirce`='{$paramas['pirce']}', `details`='{$paramas['details']}', `amount`='{$paramas['amount']}', `product_id`='{$paramas['product_id']}' 
    where id = '$id'";
    $conn->query($UPDATE) === true;
  }
  public function update_product_sale($paramas, $id)
  {
    $conn = $this->conn();
    $UPDATE = "UPDATE `product` set  `name` = '{$paramas['names']}', `image` = '{$paramas['images']}', `pirce`='{$paramas['pirce']}', `details`='{$paramas['details']}', `amount`='{$paramas['amount']}', `product_id`='{$paramas['product_id']}' 
    where id = '$id'";
    $conn->query($UPDATE) === true;
  }
  public function insert_product($paramas)
  {
    $conn = $this->conn();
    $insert = "INSERT INTO `product` (`id`, `name`, `image`, `pirce`, `details`, `amount`, `product_id`) 
     VALUES (NULL, '{$paramas['names']}', '{$paramas['images']}', '{$paramas['pirce']}', '{$paramas['details']}', '{$paramas['amount']}', '{$paramas['product_id']}')";
    $conn->query($insert) === true;
  }
  public function change_product_new($id)
  {
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM product where id =  $id");
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
  public function delete_product_new($id)
  {
    $conn = $this->conn();
    $DELETE = "DELETE FROM `product` WHERE `product`.`id` = $id";
    $conn->query($DELETE) === true;
  }
  public function change_product_host($id)
  {
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
  public function delete_product_host($id)
  {
    $conn = $this->conn();
    $DELETE = "DELETE FROM `product` WHERE `product`.`id` = $id";
    $conn->query($DELETE) === true;
  }
  public function delete_slider_id($id){
    $conn = $this->conn();
    $DELETE = "DELETE FROM `slider_product` WHERE `slider_product`.`id` = $id";
    $conn->query($DELETE) === true;
  }
  public function getAll_category()
  {
    $conn = $this->conn();
    $select = "SELECT * FROM `category`";
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
  public function get_slider_category($id)
  {
    $conn = $this->conn();
    $select = "SELECT * FROM `slider_product` where id_product = '$id'";
    $result =  $conn->query($select);
    $data = [];
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        // echo "<pre>";
        // var_dump($row);
        $data[] = $row;
      }
    }
    return $data;
  }
  public function get_size($id)
  {
    $conn = $this->conn();
    $select = "SELECT * FROM `size_product` WHERE id_product =  '$id'";
    $result =  $conn->query($select);
    $data = [];
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        // echo "<pre>";
        // var_dump($row);
        $data[] = $row;
      }
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
    $select = "SELECT * FROM `silder` order by id DESC";
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
  public function insert_slider($paramas)
  {
    $conn = $this->conn();
    $insert = "INSERT INTO `silder`(`name`, `image`) VALUES ('{$paramas['names']}','{$paramas['images']}') ";
    $conn->query($insert) === true;
  }

  public function update_slider($paramas)
  {
    $conn = $this->conn();
    $insert = "UPDATE `silder` SET `name`='{$paramas['names']}',`image`='{$paramas['images']}' WHERE id = '{$paramas['id']}' ";
    $conn->query($insert) === true;
  }
  public function Delete_slider($id)
  {
    $conn = $this->conn();
    $DELETE = "DELETE FROM `silder` WHERE id = '$id' ";
    $conn->query($DELETE) === true;
  }

  public function change_product_suggestion($id)
  {
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM product where product_id = 3 and id = $id");
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
  public function change_slider($id)
  {
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM silder where id = $id");
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
  public function update_product_suggestion($paramas, $id)
  {
    $conn = $this->conn();
    $UPDATE = "UPDATE `product` set  `name` = '{$paramas['names']}', `image` = '{$paramas['images']}', `pirce`='{$paramas['pirce']}', `details`='{$paramas['details']}', `amount`='{$paramas['amount']}', `product_id`='{$paramas['product_id']}' 
        where id = '$id'";
    $conn->query($UPDATE) === true;
  }
  public function delete_product_suggestion($id)
  {
    $conn = $this->conn();
    $DELETE = "DELETE FROM `product` WHERE `product`.`id` = $id";
    $conn->query($DELETE) === true;
  }
  public function change_product_oder($id)
  {
    $conn = $this->conn();
    $result = mysqli_query($conn, "SELECT * FROM product where product_id = 2 and id = $id");
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
  public function update_product_oder($paramas, $id)
  {
    $conn = $this->conn();
    $UPDATE = "UPDATE `product` set  `name` = '{$paramas['names']}', `image` = '{$paramas['images']}', `pirce`='{$paramas['pirce']}', `details`='{$paramas['details']}', `amount`='{$paramas['amount']}', `product_id`='{$paramas['product_id']}' 
        where id = '$id'";
    $conn->query($UPDATE) === true;
  }
  public function delete_product_oder($id)
  {
    $conn = $this->conn();
    $DELETE = "DELETE FROM `product` WHERE `product`.`id` = $id";
    $conn->query($DELETE) === true;
  }
  public function delete_product_sale($id)
  {
    $conn = $this->conn();
    $DELETE = "DELETE FROM `product` WHERE `product`.`id` = $id";
    $conn->query($DELETE) === true;
  }
  
  public function insert_product_size($paramass)
  {
    $conn = $this->conn();
    $insert = "INSERT INTO `size_product`( `id_product`, `size`, `quantity`) VALUES ({$paramass['id_product']},{$paramass['size']},{$paramass['quantity']} ) ";
    $conn->query($insert) === true;
  }
  public function update_product_size($paramass)
  {
    $conn = $this->conn();
    $insert = "UPDATE `size_product` SET `quantity`= {$paramass['quantity']} WHERE id_product =  {$paramass['id_product']} AND size = {$paramass['size']} ";
    $conn->query($insert) === true;
  }
}
