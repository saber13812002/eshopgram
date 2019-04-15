<?php

class cookie {

    public static function get_cookie($key) {

            if (isset($_COOKIE[$key])){
            return $_COOKIE[$key] ;
            }
            else return null;
       ;
    }

    public  static function set_cookie($key,$value ) { 
        //setcookie ($name, $value = null, $expire = 0, $path = null, $domain = null, $secure = false, $httponly = false) {}
        //session_set_cookie_params(time()+600,null,'localgost',$key, $value ,URL,false,true);
        setcookie($key, $value, 2147483647,'/',null,false,false);
    }


}
