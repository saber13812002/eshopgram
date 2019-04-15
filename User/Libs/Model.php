<?php

class Model {

    function __construct() {

        $this->db = new Database();       
    }

    function Main_number_of_items_in_basket() {
        $cookie = cookie::get_cookie('sn');
        Session::init();
        $user_id = Session::get('user_id');
        $sth = $this->db->prepare("SELECT sum(qty) from web_tmp_invoice_items where ( cookie=:cookie or :user_id = user_id ) and  status=1 ");
        $sth->execute(array(':cookie' => $cookie,
            ':user_id' => $user_id
        ));
        $result = $sth->fetch();
        $result[0] = ($result[0] == null? 0 :$result[0] );
        return $result[0];
    }

    function Main_MyloginInfo() {

        $res = array();
        Session::init();
        $user_id = Session::get('user_id');
        $sth = $this->db->prepare("SELECT email,name,lastname from web_users where user_id = :user_id and  status='Y' ");
        $sth->execute(array(':user_id' => $user_id));
        $result = $sth->fetchAll();
        return $result;
    }
    
    function Main_basket_content() {
        $cookie = cookie::get_cookie('sn');
        Session::init();
        $user_id = Session::get('user_id'); 
        
        $sth = $this->db->prepare("SELECT t1.* , getpartname(t1.part_no) title , getbrandname(t1.part_no) brand
                                    from   web_tmp_invoice_items t1                                    
                                    where (t1.cookie=:cookie or :user_id = t1.user_id )
                                    and    t1.status=1 
                                    order by t1.part_no
                                    ");
        $sth->execute(array(':cookie' => $cookie,
            ':user_id' => $user_id
        ));
        $result = $sth->fetchAll();
        return $result;
    }
    

}
