<?php

class register_model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_seq($seq_name) {

        $sth = $this->db->prepare("select seq(:seqname)");
        $sth->execute(array(':seqname' => $seq_name));
        $row = $sth->fetch();
        return $row[0];
    }
    

    function create($data) {
        $user_id     = $this->get_seq('USER_ID');
        $sth = $this->db->prepare("INSERT INTO users (user_id,email,password,name,lastname,mobile) 
				VALUES(:user_id,:email,:password,:name,:lastname,:mobile_no)");
        $sth->execute(array(
            ':user_id'=> $user_id,
            ':email' => $data['email'],
            ':password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            ':name' => $data['name'],
            ':lastname' => $data['lastname'],
            ':mobile_no' => $data['mobile_no']
        ));
    }
}