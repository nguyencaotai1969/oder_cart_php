<?php
class SliderModel extends Database{
    protected  $conn;
    private $silder = 'silder';
    public function __construct()
    {
        $this->conn = $this->conn();
        // $this->Database = new Database();
    }
    public function getAll(){
        $conn = $this->conn();
        $select = "SELECT * From silder ORDER by id DESC LIMIT 10";   
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

}