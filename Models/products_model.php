<?php

class products_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function GetUserAgent($website) {
       
        //$res = array();
        //Session::init();
        //$user_id = Session::get('iuser_id');

        //echo $website;
        $sth = $this->db->prepare("SELECT * from instagram_user_info where web_site_url = :website_url  ");
        $sth->execute(array(':website_url' => $website));
        $result = $sth->fetchAll();
        return $result;
    }
      function GetUserPosts($user_pk,$supplier_id) {
       
        //$res = array();
        //Session::init();
        //$user_id = Session::get('iuser_id');

        //echo $website;
        $sth = $this->db->prepare("SELECT * from PostParts where supplier_pk = :supplier_pk and supplier_id=:supplier_id   ");
        $sth->execute(array(':supplier_pk' => $user_pk, ':supplier_id'=>$supplier_id ));
        $result = $sth->fetchAll();
        return $result;
    }      
    
}