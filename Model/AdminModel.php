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
    public function insert_product($paramas){
     $conn = $this->conn();
     $insert = "INSERT INTO `product` (`id`, `name`, `image`, `pirce`, `details`, `amount`, `product_id`) 
     VALUES (NULL, '{$paramas['names']}', '{$paramas['images']}', '{$paramas['pirce']}', '{$paramas['details']}', '{$paramas['amount']}', '{$paramas['product_id']}')";
     $conn->query($insert) === true;
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
      $data[] = $row;
     }
    } else {
     echo "0 results";
    }
    return $data;
   }
 }