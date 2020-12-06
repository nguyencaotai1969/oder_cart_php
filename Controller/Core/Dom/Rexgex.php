<?php 
set_time_limit(0);
class Rexgex{
    
    public static function get_Rexgex_data($link,&$data=""){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36");
        curl_setopt($ch,CURLOPT_REFERER, "https://wwww.google.com");
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_MAXREDIRS,5 );
        $data = curl_exec($ch); 
        $error = curl_error($ch);
        curl_close($ch);
        if(empty($error)){
            return true;
        }else{
            return false;
        }
    }
    public static function explode_string($string){
                return explode("\n",$string);
    }
    public static function regex_special_characters($string){
          
             return preg_match('/[^a-zA-Z0-9\s*]+/m', $string, $matches, PREG_OFFSET_CAPTURE, 0);
    
    }
    public static function regex_split_span($string){
        return preg_replace('/\s+/', '', $string);
    }
    public static function regex_number($string){
        return preg_match('/[^0-9*]+/',$string);
    }
    public static function regex_username_login($string){
       return preg_match('/[^A-z0-9*@.]+/',$string); 
    }
    public static function regex_text($string){
        return preg_match('/[^a-zA-z*]+/',$string);
    }
    public static function switch_data($category){
        switch ($category) {
            case $category == 1:
                header("Location:?controller=admin&action=product_new");
                break;
            case $category == 2:
                header("Location:?controller=admin&action=Product_oder");
                break;
            case $category == 3:
                header("Location:?controller=admin&action=product_suggestion");
                break;
            case $category == 4:
                header("Location:?controller=admin&action=product_sale");
                break;
            case $category == 5:
                header("Location:?controller=admin&action=product_host");
                break;
        }
    }
   public static function slug($str) {

        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);


        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str); // Removes special chars.
        $str = preg_replace('/-+/', '-', $str); // Replaces multiple hyphens with single one.
        return strtolower($str);
    }

    
}


?>