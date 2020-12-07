<?php
class ProductModel extends Database
{
    protected  $conn;
    private $product_suggestion = 'product_suggestion';
    public function __construct()
    {
        $this->conn = $this->conn();
        // $this->Database = new Database();
    }
    //san pham mua nhieu
    public function product_oders($start, $limit)
    {
        $conn = $this->conn();
        $select = "SELECT * FROM `product` WHERE product_id = 2  ORDER by id DESC LIMIT  $start, $limit";
        $result =  $conn->query($select);
        $data = [];
        if ($result && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);
                $data[] = $row;
            }
            return $data;

        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }

    // dem so luong data co trong san
    public function count_total_user()
    {
        $conn = $this->conn();
        $select = "SELECT count(id) as total FROM user";
        $result = mysqli_query($conn, $select);

        $row = mysqli_fetch_assoc($result);
        return  $total_records = $row['total'];
    }
    public function count_total_records()
    {
        $conn = $this->conn();
        $select = "SELECT count(id) as total FROM product";
        $result = mysqli_query($conn, $select);

        $row = mysqli_fetch_assoc($result);
        return  $total_records = $row['total'];
    }
    public function count_total_records_admin($id)
    {
        $conn = $this->conn();
        $select = "SELECT count(id) as total FROM product  where product_id = $id";
        $result = mysqli_query($conn, $select);

        $row = mysqli_fetch_assoc($result);
        return  $total_records = $row['total'];
    }
    // tim kiem san pham
    public function search($search)
    {
        $conn = $this->conn;
        $query = "SELECT * FROM product  WHERE (name like '%$search%') ORDER BY RAND(90)";
        $result = mysqli_query($conn, $query);
        //echo $sql;
        if ($result && $result->num_rows > 0) {
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
    // san pham goi y
    public function  product_suggestion($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product where product_id = 3 ORDER BY id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    //san pham moi
    public function  product_new($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product where product_id = 1 ORDER BY id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;

        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    
    public function product_host($start, $limit){
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product where product_id = 5 ORDER BY id DESC LIMIT  $start, $limit");
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
    public function product_sale($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product where product_id = 4 ORDER BY id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {
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
    public function all_product($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product LIMIT $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function user_all($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM user where gid = 2 ORDER BY id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Select_transaction_data_to_id_user_Cho_Xac_Nhan($id_user)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE id_user = $id_user AND status = 0");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Update_transaction_data_to_id_Huy_Don_Hang($id){
        $conn = $this->conn();
        $select = "UPDATE `transaction_data` SET `status`= 3 WHERE id = $id ";
        $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result >0) {
                $data =[
                    "user_oder" =>"Hủy đơn hàng thành công"];
            return $data;
          } else {
                return $data =[
                    "Error" =>"lỗi"
                ];
          }  

    }
    public function Select_transaction_data_to_id_user_Da_Huy($id_user)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE id_user = $id_user AND status = 3 ");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    } 
    public function Select_transaction_data_to_id_user_Da_Mua($id_user)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE id_user = $id_user AND status = 2");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    } 
    public function Select_transaction_data_to_id_user_Dang_Giao($id_user)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE id_user = $id_user AND status = 1");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Select_ALL_transaction_data_Cho_Xac_Nhan($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE status = 0 ORDER BY transaction_data.id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Product_to_id($id)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Update_product_upto_soluong($id,$soluong)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "UPDATE `product` SET `amount`= $soluong WHERE id = $id");
        $data = [];
        if ( $result >0) {
            $data =[
                "user_oder" =>"Hủy đơn hàng thành công"];
        return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Update_transaction_data_to_id_Xac_nhan($id){
        $conn = $this->conn();
        $select = "UPDATE `transaction_data` SET `status`= 1 WHERE id = $id ";
        $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result >0) {
                $data =[
                    "user_oder" =>"Hủy đơn hàng thành công"];
            return $data;
          } else {
                return $data =[
                    "Error" =>"lỗi"
                ];
          }  

    }
    public function Update_transaction_data_to_id_Da_giao($id){
        $conn = $this->conn();
        $select = "UPDATE `transaction_data` SET `status`= 2 WHERE id = $id ";
        $result = mysqli_query($conn,$select);
    //  $data = [];
        if ( $result >0) {
                $data =[
                    "user_oder" =>"Hủy đơn hàng thành công"];
            return $data;
          } else {
                return $data =[
                    "Error" =>"lỗi"
                ];
          }  

    }
    public function Select_ALL_transaction_data_Da_Huy($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE  status = 3 ORDER BY transaction_data.id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Select_ALL_transaction_data_Dang_giao($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE  status = 1 ORDER BY transaction_data.id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }
    public function Select_ALL_transaction_data_Da_Mua($start, $limit)
    {
        $conn = $this->conn();
        $result = mysqli_query($conn, "SELECT transaction_data.*,product.name AS name_product,product.image,product.pirce,product.details,product_status.name AS name_status 
        FROM `transaction_data` 
        INNER JOIN product_status ON transaction_data.status = product_status.id 
        INNER JOIN product ON transaction_data.id_product = product.id
        WHERE  status = 2 ORDER BY transaction_data.id DESC LIMIT  $start, $limit");
        $data = [];
        if ($result && $result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<pre>";
                // var_dump($row);

                $data[] = $row;
            }
            return $data;
        } else {
            return $data = [
                "error" => "Khong tim thay ket qua!"
            ];
        }
    }

}
