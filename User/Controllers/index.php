<?php

class index extends Controller {

    function __construct() {
        parent::__construct();
    }
        function index() {
             var_dump($_SERVER);
             //$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=5458271479.4c46a18.a23d9e8f9b3d4d73bbd6499ae396f74f';
             //$this->view->instagram = public_functions::json_curl_reader($url);
             //var_dump($this->view->instagram );
        $this->view->render('index/index', false);
    }
}
