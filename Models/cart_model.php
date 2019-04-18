<?php

class cart_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function saveData($host, $product_id, $cookie)
    {

        $sth = $this->db->prepare("INSERT INTO carts (host,product_id,cookie) 
				VALUES(:host,:product_id,:cookie)");
        $sth->execute(array(
            ':host' => $host,
            ':product_id' => $product_id,
            ':cookie' => $cookie,
        ));
    }
}
