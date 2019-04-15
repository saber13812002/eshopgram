<?php

class index extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $User_info_agent = $this->model->GetUserAgent($_SERVER['HTTP_HOST']);

        if ($User_info_agent){
          
        $this->view->useragent = $User_info_agent;
        $this->view->UserPosts = $this->model->GetUserPosts($User_info_agent[0]['user_pk']);
        
        $this->view->render('index/UserAgent/indexUserAgent', false);    
        }
        else{
        $this->view->render('index/index', false);
        }
//        if ($_SERVER['SERVER_NAME'] != DOMAIN) {
//            $this->view->instagram_account = $this->model->instagram_media();
//            echo $this->view->instagram_account[0]['access_token'];
//            $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.$this->view->instagram_account[0]['access_token'];
//            $this->view->instagram = public_functions::json_curl_reader($url);
//            $this->view->render('index/account', false);
//        } else {
//            $this->view->render('index/index', false);
//        }
    }


}
