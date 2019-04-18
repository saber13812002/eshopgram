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
        return $sth->execute(array(
            ':host' => $host,
            ':product_id' => $product_id,
            ':cookie' => $cookie,
        ));
    }
}

/*


CREATE TABLE `carts` (
    `id` int(10) NOT NULL,
    `host` varchar(50) NOT NULL,
    `product_id` int(20) NOT NULL,
    `cookie` varchar(200) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


  */