<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
    }

    //	public function loadModel($name) {
    //		
    //		$path = 'models/'.$name.'_model.php';
    //		
    //		if (file_exists($path)) {
    //			require 'models/'.$name.'_model.php';
    //			
    //			$modelName = $name . '_Model';
    //			$this->model = new $modelName();
    //		}		
    //	}
    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'Models/') {
        
        $path = $modelPath . $name . '_model.php';
        
        if (file_exists($path)) {

            require $modelPath . $name . '_model.php';
            
            $modelName = $name . '_model';

            $this->model = new $modelName();
            //var_dump($path);
            //echo $modelName.'1';
        }
    }
    public function checkCaptcha() {
        
        return 1 ;
        
        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = public_functions::cleaner ($_POST['g-recaptcha-response']);
        }
        //var_dump($captcha.'ccc');
        if ($captcha=="" && $captcha == null ) {
            $captcha_msg .= ' تیک من روبات نیستم را بزنید و دوباره تلاش کنید ';
            return 5;
        }
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le0rigTAAAAAFf-p_N1KS4xiHbzesTKEdHD1QrB&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $json = json_decode($response, true);
        //return  $json['success']; 
          
        if ($json['success']==false) { 
            $captcha_msg .= ' دسترسی غیر مجاز ';
        } else {

            return 1;
        }
        return 5;
    }
    
    function ChooseController(){
        
    }



}
