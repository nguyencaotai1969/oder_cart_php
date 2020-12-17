<?php
class MessageModel extends Database
{
 protected  $conn;
 private $user = 'user';
 public function __construct()
 {
  $this->conn = $this->conn();
  // $this->Database = new Database();
 }
 // select user message
 public function Checkuser_message()
 {
  $conn = $this->conn();
  $select = "SELECT * From user where gid > 1 ORDER BY id DESC";
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
 public function Admin_send_message($paramas){
    $conn = $this->conn();
    $select = "INSERT INTO `message` (`id`, `to_id_user`, `from_id_user`, `message`, `timestamp`)
     VALUES (NULL, '{$paramas['to_id_user']}', '{$paramas['from_id_user']}', '{$paramas['message']}', CURRENT_TIMESTAMP)";
    $result =  $conn->query($select) === true;
 }
 public function User_send_message($paramas){
    $conn = $this->conn();
    $select = "INSERT INTO `message` (`id`, `to_id_user`, `from_id_user`, `message`, `timestamp`)
     VALUES (NULL, 1, {$paramas['from_id_user']}, '{$paramas['message']}', CURRENT_TIMESTAMP)";
   
    $result =  $conn->query($select) === true;
 }
 public function Find_id($id){
  $conn = $this->conn();
  $select = "SELECT * FROM user WHERE id = $id ";
  $result =  $conn->query($select);

  
   if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
     // echo "<pre>";
     // var_dump($row);
     $data[] = $row;
    }
    return $data;
   }
 }
 public function Chat_message($from_id_user, $to_id_user){
  $conn = $this->conn();
  $select = "SELECT user.*,message.* FROM `message` JOIN user on message.from_id_user =
   user.id      WHERE (from_id_user = $from_id_user AND to_id_user = $to_id_user)
   OR (from_id_user = $to_id_user AND to_id_user = $from_id_user) ORDER BY timestamp ASC ";
  $result =  $conn->query($select);
  $data = [];
  try {
   if ($result->num_rows > 0) {
   // output data of each row
   while ($row = $result->fetch_assoc()) {
    // echo "<pre>";
    // var_dump($row);
    $data[] = $row;
   }
   return $data;
  } else {
   return $data = [
    "error" => "Lỗi Chưa Có Tin Nhắn"
   ];
  }
  } catch (\Throwable $th) {
   //throw $th;
  }  
 }
 public function User_chat($from_id_user, $to_id_user){
    $conn = $this->conn();
    $select = "SELECT user.*,message.* FROM `message` JOIN user on message.from_id_user =
   user.id  WHERE (from_id_user = $from_id_user AND to_id_user = $to_id_user)
   OR (from_id_user = $to_id_user AND to_id_user = $from_id_user) ORDER BY timestamp ASC ";
    $result =  $conn->query($select);
    $data = [];
    try {
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
         
                    unset($row['password']);
                    unset($row['email']);
                    unset($row['Phone']);
                    unset($row['username']);
                    unset($row['gid']);
          $data[] = $row;
        }
        return $data;
      } else {
        return $data = [
          "error" => "Lỗi Chưa Có Tin Nhắn"
        ];
      }
    } catch (\Throwable $th) {
      //throw $th;
    }  
 }

}
