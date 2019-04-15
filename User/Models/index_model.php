<?php

class index_model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function instagram_media(){
        var_dump(444);
        $servername = $_SERVER['SERVER_NAME'];
        
        $sth = $this->db->prepare(" Select * from instagram_accounts
                                    Where instagram_username = :servername
                                    ");
        $sth->execute(array(
            ':servername' => $servername
        )); 
        var_dump($sth->erroInfo());
        return $sth->erroInfo();
    }

}