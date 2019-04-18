<?php

class cart extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function add()
    {
        //echo 'add';
        $entityBody = file_get_contents('php://input');
        $payload = json_decode($entityBody, true);
        //$_SERVER["HTTP_HOST"]
        $host = $_SERVER["HTTP_HOST"];
        $cookie = $_SERVER["HTTP_COOKIE"];

        $err = $this->model->create($host, $payload['id'], $cookie);
    }
}
