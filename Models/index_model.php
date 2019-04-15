<?php

class index_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function GetUserAgent($website) {
       
        //$res = array();
        //Session::init();
        //$user_id = Session::get('iuser_id');
        echo $website;
//        $sth = $this->db->prepare("SELECT * from instagram_user_info where web_site_url = :website_url  ");
//        $sth->execute(array(':website_url' => $website));
//        $result = $sth->fetchAll();
//        return $result;
    }
    
}