<?php

class saber_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run($referrer) {

        $sth = $this->db->prepare("SELECT * FROM users"
        );

        $sth->execute();

        $data = $sth->fetch();
    }

    public function getData() {

        $sth = $this->db->prepare("SELECT * FROM users");

        $sth->execute();

        $data = $sth->fetchAll();

        return $data;
    }
}
