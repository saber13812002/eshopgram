<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        if (Session::get('loggedIn') == true) {
            $this->view->loggedIn = true;
            session_destroy();
            header('location: ../login');
        } else
            $this->view->loggedIn = false; 
    }
    


    function index() {
        
        $captcha_msg = '';               
        $thecmd = '';
        $referrer = 'dashboard';
        
        if (isset($_REQUEST['referrer']))
            $referrer = public_functions::cleaner($_REQUEST['referrer']);        
        if (isset($_POST['thecmd']))
            $thecmd = public_functions::cleaner($_POST['thecmd']);

        if ($thecmd == CMD_ENTER){

               $checkCaptcha = $this->checkCaptcha();
               //echo $checkCaptcha ;
               if ($checkCaptcha === 1 )             
               {                    
                   $this->view->error_msg = $this->run($referrer);                   
               }
               if ($checkCaptcha === 5 )
               {
                   $this->view->error_msg .= ' تیک من روبات نیستم را بزنید و دوباره تلاش کنید ';
                   
               }    


        } 

        //$this->view->MyloginInfo = $this->model->MyloginInfo();
        $this->view->render('login/index', false, ' ', ' ', ' ');
    }

    private function run($referrer) { 
        return $this->model->run($referrer);
    }
    
    function forget_password()
    {
        $msg = null;
        if (isset($_POST['thecmd']))
            $thecmd = public_functions::cleaner($_POST['thecmd']);

        
        if ($thecmd == CMD_RESET_PASSWORD){ 
               $checkCaptcha =  $this->checkCaptcha();
               if ($checkCaptcha === 1 )             
               {  
                  
                if (isset($_POST['pemail']))
                   $pemail = public_functions::cleaner($_POST['pemail']);                   
                   //echo $pemail;
                   
                   $msg=$this->model->send_resetpassword_link($pemail);                    
                   
               }
               if ($checkCaptcha === 5 )
               {
                   $this->view->error_msg .= ' تیک من روبات نیستم را بزنید و دوباره تلاش کنید ';
                   
               }    
        
            
        } 
       $this->view->msg = $msg ;
       $this->view->render('login/forget_password', false, ' ', ' ', ' '); 
    }
    
    function reset_password(){
        $key= '';
        $password1=null;
        $password2=null;
        if (isset($_REQUEST['key']))
        $key = public_functions::cleaner($_REQUEST['key']);
        
        
        if (isset($_POST['thecmd']))
        $thecmd = public_functions::cleaner($_POST['thecmd']);
        

        if (isset($_REQUEST['key'])) {
         
         if ($this->model->check_key_exist($key) ){
         
          
          $this->view->key = $key ;
          
          
          //exit();
          }
          else
          { 
             //echo  public_functions::getUserIP();
              $errmsg = 'اعتبار این لینک منقضی شده است';
              //echo 1;
               
              header('location:'.URL.'error ');
              
          }
            }
                      else
          { 
               
              header('location:'.URL.'error ');
              
          }
         
        if ($thecmd == CMD_CHANGE_PASSWORD){
         
        if ($this->model->RegisterCheckUserAccess($user_ip ,'RESET_PASSWORD')) {        
        
        $this->view->key = $key;     
        if (isset($_REQUEST['pemail']))
        $pemail = public_functions::cleaner($_REQUEST['pemail']);    
        
        if (isset($_REQUEST['key']))
        $key = public_functions::cleaner($_REQUEST['key']);            
        if (isset($_POST['password1']))
        $password1 = public_functions::cleaner($_POST['password1']);
        if (isset($_POST['password2']))
        $password2 = public_functions::cleaner($_POST['password2']);  
         
        if ($password1==$password2 && ($password1!=null && $password2 !=null ))
            {
             if ($this->model->check_key_with_email($key,$pemail)){ 
               $this->model->change_reset_password($password1 , $key , $pemail);
               header('location:'.URL.'login');
             }
             else
                  $errmsg = 'آدرس ایمیل صحیح نیست';
            }
            else            
            $errmsg = ' کلمه های عبور وارد شده با هم مغایرت دارد' ;
            
        }
          
        

        }
                             
        
       $this->view->render('login/reset_password'); 
        
    }

}
