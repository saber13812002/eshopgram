<?php

class Session
{
	
	public static function init()
	{
		@session_start();
	}
	
	public static function set($key, $value)
	{
	    //$val = Hash::create('sha256', $value , HASH_GENERAL_KEY );	
            $_SESSION[$key] = $value;
	}
	
        public static function Un_set($key)
	{
	    
            unset($_SESSION[$key]);
            //$val = Hash::create('sha256', $value , HASH_GENERAL_KEY );	
            //@session_unregister($key);  
            
	}
        
	
	public static function get($key)
	{
		if (isset($_SESSION[$key])){
		 $val = $_SESSION[$key] ; // Hash::create('sha256', $_SESSION[$key] , HASH_GENERAL_KEY );
                 return $val; 
                }
	}
	
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}
	
}