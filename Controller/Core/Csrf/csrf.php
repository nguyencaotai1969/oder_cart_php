<?php 


class csrf
{
    public  static function csrf_token($session)
	{
        if (empty($session))
        $session = bin2hex(random_bytes(32));
        //create CSRF token
        $csrf = hash_hmac('sha256', 'this is string @csrf', $session);
        return $csrf;
        
    }
    // public static function csrf_token_login(session){
    //     if (empty($session))
    //     $session = bin2hex(random_bytes(32));
    //     //create CSRF token
    //     $csrf = hash_hmac('sha256', 'this is string @csrf', $session);
    //     return $csrf;
    // }
}

?>