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
}

?>