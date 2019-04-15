<?php

class dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        Session::init();
        if (Session::get('loggedIn') == true)
            $this->view->loggedIn = true;
        else
            $this->view->loggedIn = false; 
        
    }
    
        function index() { 
        //var_dump(1);
            $this->view->render('dashboard/index', false);               
    }
    
    
    
}