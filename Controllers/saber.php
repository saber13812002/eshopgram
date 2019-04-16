<?php

class Saber extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::init();
        if (Session::get('loggedIn') == true) {
            $this->view->loggedIn = true;
            session_destroy();
            header('location: ../login');
        } else
            $this->view->loggedIn = false;
    }


    function index()
    {

        $referrer = 'saber';

        if (isset($_REQUEST['referrer']))
            $referrer = public_functions::cleaner($_REQUEST['referrer']);

        $this->view->data = $this->run($referrer);

        $this->view->data = $this->model->getData();

        $this->view->render('saber/index', false, ' ', ' ', ' ');
    }

    private function run($referrer)
    {
        return $this->model->run($referrer);
    }
}
