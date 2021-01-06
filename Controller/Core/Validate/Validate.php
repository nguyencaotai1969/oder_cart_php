<?php 

class Validate{
    public static function Validate_number($id){
       return preg_replace( '/[^0-9]/', '', $id );
    }
    public static function Validate_email($email){
    	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
    	return preg_match($regex, $email);
    }
    public static function validate_phone_number($phone){
    	$regEx = '/(84|0[3|5|7|8|9])+([0-9]{8})\b/';
    	return  preg_match($regEx, $phone);
    }
    public static function validate_address($address){
    	$regEx = '/^\\d+ [a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$/';
    	return  preg_match($regEx, $address);
    }
    
    public static function up_many_file_slider(){
        
        $data = [];
        $targetDir = "img/";
        $allowTypes = array('jpg', 'png', 'jpeg');

        $fileNames = array_filter($_FILES['file_slider']['name']);
        if (!empty($fileNames)) {
            foreach ($_FILES['file_slider']['name'] as $key => $val) {
                // File upload path 

                $fileName = basename($_FILES['file_slider']['name'][$key]);
                $date = getdate();
                $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
                preg_match('/\.(jpg|jpeg|png)(?:[\?\#].*)?$/i', $fileName, $matches);
                $png = isset($matches[1]) ? $matches[1] : "";
                $datass = Rexgex::slug($fileName) . $link_image . "." . $png;
                $targetFilePath = $targetDir . $datass;
               
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["file_slider"]["tmp_name"][$key], $targetFilePath)) {
                        $data['error'] = [
                            "sucssec" => 1,
                            $data[] = $datass
                        ];
                    } else {
                        $data['error'] = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $data['error'] = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            }
        }
        return $data;
    }
    public static function up_img(){
        $data = [];

        // File upload path
        $targetDir = "img/";
     
        $fileName = basename($_FILES["file"]["name"]);
        preg_match('/\.(jpg|jpeg|png)(?:[\?\#].*)?$/i', $fileName, $matches);
        $date = getdate();
        $link_image = $date['mday'] . $date['mon'] . $date['year'] . $date['seconds'];
        $png = isset($matches[1])? $matches[1]:"";
        $datas = Rexgex::slug($fileName) . $link_image . "." .$png ;
        $targetFilePath = $targetDir . $datas;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        if (!empty($_FILES["file"]["name"])) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $data['error'] = [
                        "sucssec" => 1,
                        "name_file"=> $datas
                    ];
                } else {
                   $data['error'] = "Sorry, there was an error uploading your file.";
                }
            } else {
               $data['error'] = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        } else {
            $data['error'] = 'Please select a file to upload.';
        }
        return $data;

  
    }
}

?>