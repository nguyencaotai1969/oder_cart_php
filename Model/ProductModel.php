<?php 
class ProductModel extends Database{
    protected  $conn;
    private $product_suggestion = 'product_suggestion';
    public function __construct()
    {
        $this->conn = $this->conn();
        // $this->Database = new Database();
    }
    //san pham mua nhieu
    public function product_oders($start, $limit){
        $conn = $this->conn();
        $select = "SELECT * FROM `product` WHERE product_id = 2  ORDER by id DESC LIMIT  $start, $limit";   
        $result =  $conn->query($select);
        $data = [];
        if ($result && $result->num_rows >0) {
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
   
    // dem so luong data co trong san
    public function count_total_records(){
          $conn = $this->conn();
            $select = "SELECT count(id) as total FROM product";
          $result = mysqli_query($conn,$select);

          $row = mysqli_fetch_assoc($result);
       return  $total_records = $row['total'];

    }
    // tim kiem san pham
    public function search($search){
        $conn = $this->conn;
        $query = "SELECT * FROM product WHERE (name like '%$search%')";
        $result = mysqli_query($conn, $query);
            //echo $sql;
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()) {  
    
                    $data[] = $row;
                }
                return $data;
            }else{
                return $data= [
                    "error"=>"Khong tim thay ket qua!"
                ];
            }

            
           
            

    }
    // san pham goi y
    public function  product_suggestion($start, $limit){
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product where product_id = 3 ORDER BY id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows >0) {
          
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
    //san pham moi
    public function  product_new($start, $limit){
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product where product_id = 1 ORDER BY id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows >0) {
          
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
    public function all_product($start,$limit){
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product LIMIT $start, $limit");
        $data = [];
        if ($result && $result->num_rows >0) {
          
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
}

?>