<?php

class login_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function MyloginInfo() {

        $res = array();
        Session::init();
        $user_id = Session::get('user_id');
        $sth = $this->db->prepare("SELECT email,name,lastname from users where user_id = :user_id and  status='Y' ");
        $sth->execute(array(':user_id' => $user_id));
        $result = $sth->fetchAll();
        return $result;
    }

    function send_mail($pto, $psubject) {
        $to = $pto;
        $subject = $subject; //"My subject";
        $txt = DOMAIN ;
        $headers = "From: info@khanehvaashpazkhaneh.com";

        mail($to, $subject, $txt, $headers);
    }
    
    function check_login($pemail , $ppassword){
        $sth = $this->db->prepare("SELECT * FROM users WHERE 
				   email = :email AND password = :password
                                   and status='Y' "
        );

        $sth->execute(array(
            ':email' =>$pemail,
            ':password' => Hash::create('sha256', $ppassword, HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count == 1) {
            // login
            $cookie = cookie::get_cookie('sn');
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user_id', (int) $data['user_id']);
            //$this->SetLastLogin((int) $data['user_id']);
            //$this->RegisterUserInMainServer($data);
                       
            //$this->movetmp2basket($cookie,$data['user_id']);
            //$this->update_basket($cookie, $data['user_id']);
            return 'OK' ;
        } else {
            return ' اطلاعات وارد شده اشتباه است! ';
            // header('location: /login');
        }
        
    }

    public function run($referrer) {

        $sth = $this->db->prepare("SELECT * FROM users WHERE 
				   email = :email AND password = :password
                                   and status='Y' "
        );

        $sth->execute(array(
            ':email' => public_functions::cleaner($_POST['email']),
            ':password' => Hash::create('sha256', public_functions::cleaner($_POST['password']), HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();

        $sthrole = $this->db->prepare("SELECT role_id FROM users t1
                                       JOIN   web_user_role t2
                                       ON (t1.user_id=t2.user_id )
                                       WHERE  
				       t1.email = :email AND t1.password = :password
                                       and status='Y' ");
        $sthrole->execute(array(
            ':email' => public_functions::cleaner($_POST['email']),
            ':password' => HASH::create('sha256', public_functions::cleaner($_POST['password']), HASH_PASSWORD_KEY)
        ));

        $datarole = $sthrole->fetchAll();


        if ($datarole) {
            Session::init();
            Session::set('__AloggedIn', true);
            Session::set('__user_id', (int) $data['user_id']);
            header('location: /webadmin');
            die();
        }

        $count = $sth->rowCount();
        if ($count == 1) {
            // login
            $cookie = cookie::get_cookie('sn');
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user_id', (int) $data['user_id']);
            //$this->SetLastLogin((int) $data['user_id']);
            //$this->RegisterUserInMainServer($data);
               
        
            //$this->movetmp2basket($cookie,$data['user_id']);
            //$this->update_basket($cookie, $data['user_id']);

            if ($referrer == 'basket') {
                header('location: /basket');
            } else
                header('location: /dashboard');
        } else {
            return ' پست الکترونیک یا کلمه عبور شما اشتباه وارد شده است';
            // header('location: /login');
        }
    }

    private function SetLastLogin($user_id) {
        $sth = $this->db->prepare(" UPDATE users
                                      SET  last_login = NOW()
				      WHERE user_id = :user_id "
        );
        $sth->execute(array(
            ':user_id' => $user_id
        ));
    }

    private function RegisterUserInMainServer($value) {

        $pccity_id = '&pccity_id=0101';
        $pcname = '&pcname=' . urlencode(public_functions::WIN1256STR($value['name']));
        $pclast_name = '&pclast_name=' . urlencode(public_functions::WIN1256STR($value['lastname']));
        $pcphone_no = '&pcphone_no=' . $value['tel'];
        $pcmobile_no = '&pcmobile_no=' . $value['mobile_no'];
        $pcemail = '&pcemail=' . $value['email'];
        $pczip_code ='&pczip_code=';
        $pcaddress ='&pcaddress=';
        $pcsend_email='&pcsend_email=N';
        $pcsend_sms='&pcsend_sms=N';     
        $psex ='&psex='.$value['gender'];
        $pcbirthday='&pcbirthday=';
        $formal_SHENASEH_MELI = '&formal_SHENASEH_MELI=' . $value['National_Code'];

       // $url = JSON_IP . '/pls/zaman/website4hk2.docust?sid=SNO00901841106' . $pccity_id .$pcname .$pclast_name . $pcphone_no . $pcmobile_no . $pcemail . $pczip_code . $pcaddress .$pcsend_email .$pcsend_sms .$psex .$pcbirthday .$formal_SHENASEH_MELI ;
        $json = public_functions::json_reader($url);
//        if ($value['user_id']==169){
//           
//            var_dump($json);
//        }
        return $json;
        
    }

    private function GetLastDeliveryData($user_id) {

        $sth = $this->db->prepare(" SELECT * FROM web_deliveries
				      WHERE user_id = :user_id  
                                      ORDER BY `web_deliveries`.`invoice_no`  DESC
                                       LIMIT 0,1
                                ");
        $sth->execute(array(
            ':user_id' => $user_id
        ));

        return $sth->fetchAll();
    }

    public function movetmp2basket($cookie, $user_id) {

        $sth = $this->db->prepare("SELECT * FROM web_tmp_invoice_items WHERE 
				cookie = :cookie and status=1 "
        );
        $sth->execute(array(
            ':cookie' => $cookie
        ));

        $data['invoice_no'] = public_functions::get_seq('web_invoices', 'invoice_no', 12);

        $sth4invoice = $this->db->prepare("INSERT INTO web_invoices(invoice_no ,user_id,status) 
                                  VALUES (:invoice_no ,:user_id,:status)
                                  "
        );
        $sth4invoice->execute(array(
            ':invoice_no' => $data['invoice_no'],
            ':user_id' => $user_id,
            ':status' => 1
        ));






        foreach ($tmpitems as $row) {
            //$url = JSON_IP . '/pls/zaman/websitepkg4hk.transfer_part_data?pid=' . $row['part_no'];
            $json = public_functions::json_reader($url);
            $json = json_decode($content, true);
            $data = array();

            $data['cookie'] = $cookie;
            $data['organ_id'] = ORGAN_ID;

            foreach ($json['part'] as $item) {
                $data['qty'] = $item['StockQty'];
                $data['part_no'] = $item['PART_NO'];
                $data['discount_percent'] = $item['pdpercent'];
                $data['tax'] = $item['tax'] * $data['qty'];
                $data['duty'] = $item['duty'] * $data['qty'];
                $data['discount'] = ($item['Price'] * $data['qty'] ) * $data['discount_percent'] / 100;
                $data['unitprice'] = ($item['Price']);
                $data['price'] = ($data['qty'] * $data['unitprice']) - $data['discount'] + ($data['tax'] + $data['duty']);
            }
            //
            //if ($this->ifexists($data['part_no'], $data['cookie'])) {
            //    $this->delete($data['part_no'], $data['cookie']);
            //}
            $sth2 = $this->db->prepare("INSERT INTO web_invoice_items (invoice_no,part_no,qty,unitprice,price,discount,discount_percent,tax,duty,cookie,organ_id)
                      VALUES (:invoice_no,:part_no,:qty,:unitprice,:price,:discount,:discount_percent,:tax,:duty,:cookie,:organ_id)");
            //$stmt->bindParam(':invoice_no', $data[]);
            $sth2->execute(array(
                ':invoice_no' => $data['invoice_no'],
                ':part_no' => $data['part_no'],
                ':qty' => $data['qty'],
                ':price' => $data['price'],
                ':unitprice' => $data['unitprice'],
                ':discount' => $data['discount'],
                ':discount_percent' => $data['discount_percent'],
                ':tax' => $data['tax'],
                ':duty' => $data['duty'],
                ':cookie' => $data['cookie'],
                ':organ_id' => $data['organ_id']
            ));
        }
    }

    /**
     * update temp basket items with new prices
     * @param type $cookie  
     * @param type $user_id
     * 
     */
    public function update_basket($cookie, $user_id) {
        
        $sth = $this->db->prepare("SELECT * FROM web_tmp_invoice_items WHERE 
				   (cookie = :cookie or user_id =:user_id ) and status=1 "
        );
        $sth->execute(array(
            ':cookie' => $cookie,
            ':user_id' => $user_id
        ));

        $items = $sth->fetchall();

        foreach ($items as $rows) {



           // $url = JSON_IP . '/pls/zaman/websitepkg4hk.transfer_part_data?pid=' . $rows['part_no'];
            $json = public_functions::json_reader($url);

            $data = array();
            $data['cookie'] = $cookie;
            $data['organ_id'] = ORGAN_ID;


            if (isset($json['part'])) {
                echo '1111';
                $data['qty'] = $rows['qty'];
                $data['part_no'] = $json['part']['PART_NO'];
                $data['discount_percent'] = $json['part']['pdpercent'];
                $data['tax'] = $json['part']['tax'] * $data['qty'];
                $data['duty'] = $json['part']['duty'] * $data['qty'];
                $data['discount'] = ($json['part']['Price'] * $data['qty'] ) * $data['discount_percent'] / 100;
                $data['unitprice'] = ($json['part']['Price']);
                $data['price'] = ($data['qty'] * $data['unitprice']) - $data['discount'] + ($data['tax'] + $data['duty']);

                //
                $data['invoice_no'] = 0;
                //if ($this->ifexists($data['part_no'], $data['cookie'])) {
                //    $this->delete($data['part_no'], $data['cookie']);
                //}
                /*
                  $sth2 = $this->db->prepare("UPDATE web_tmp_invoice_items
                  SET user_id =:user_id
                  unitprice =:unitprice ,
                  price = :price ,
                  discount = :discount ,
                  discount_percent = :discount_percent
                  tax = :tax
                  duty = :duty
                  WHERE organ_id = :organ_id
                  and  cookie = :cookie
                  and  part_no = :part_no ");
                  //$stmt->bindParam(':invoice_no', $data[]);
                  $sth2->execute(array(
                  ':user_id' => $user_id,
                  ':unitprice' => $data['unitprice'],
                  ':price' => $data['price'],
                  ':discount' => $data['discount'],
                  ':discount_percent' => $data['discount_percent'],
                  ':tax' => $data['tax'],
                  ':duty' => $data['duty'],
                  ':cookie' => $data['cookie'],
                  ':organ_id' => $data['organ_id']
                  ));
                 * */
                if ($this->ifexists($data['part_no'], $cookie)) {
                    $this->delete($data['part_no'], $cookie);
                }

                $sth2 = $this->db->prepare("INSERT INTO web_tmp_invoice_items (invoice_no,part_no,qty,unitprice,price,discount,discount_percent,tax,duty,cookie,user_id,organ_id)
                      VALUES (:invoice_no,:part_no,:qty,:unitprice,:price,:discount,:discount_percent,:tax,:duty,:cookie,:user_id,:organ_id)");
                //$stmt->bindParam(':invoice_no', $data[]);
                $sth2->execute(array(
                    ':invoice_no' => $data['invoice_no'],
                    ':part_no' => $data['part_no'],
                    ':qty' => $data['qty'],
                    ':price' => $data['price'],
                    ':unitprice' => $data['unitprice'],
                    ':discount' => $data['discount'],
                    ':discount_percent' => $data['discount_percent'],
                    ':tax' => $data['tax'],
                    ':duty' => $data['duty'],
                    ':cookie' => $data['cookie'],
                    ':user_id' => $user_id,
                    ':organ_id' => $data['organ_id']
                ));
            }
        }

        return false;
    }

    public function delete($part_no, $cookie) {
        Session::init();
        $user_id = Session::get('iuser_id');

        $sth = $this->db->prepare("delete from web_tmp_invoice_items 
                                     where part_no =:part_no 
                                     and ( cookie =:cookie OR user_id= :user_id )
                                     and status=1
                                    ");
        $sth->execute(array(
            ':part_no' => $part_no,
            ':cookie' => $cookie,
            ':user_id' => $user_id
        ));
        //return $part_no;
    }

    public function ifexists($part_no, $cookie) {
        Session::init();
        $user_id = Session::get('iuser_id');
        $organ_id = ORGAN_ID;

        $sth = $this->db->prepare("SELECT * FROM web_tmp_invoice_items WHERE 
                                   (cookie = :cookie OR user_id=:user_id) and part_no=:part_no and organ_id=:organ_id ");
        $sth->execute(array(
            ':cookie' => $cookie,
            ':part_no' => $part_no,
            ':user_id' => $user_id,
            ':organ_id' => $organ_id
        ));
        if ($sth->rowCount() > 0) {
            return true;
        } else
            return false;
    }

    function send_resetpassword_link($email) {

        if ($this->check_user_email($email)) {
            $pemail = $email;



            $validkey = public_functions::generateRandomString(250, 'both');
            $link = URL . 'login/reset_password?key=' . $validkey;
            $exp_date = date("Y-m-d H:i:s", strtotime('+1 hours'));
            $tag = 'RESET_PASSWORD';



            $sth = $this->db->prepare("Insert into  web_send_email_keys(validkey,tag,link,exp_date,email)
                                    VALUES(:validkey,:tag,:link,:exp_date,:email)                           
                                    ");
            $sth->execute(array(
                ':validkey' => $validkey,
                ':tag' => $tag,
                ':link' => $link,
                ':exp_date' => $exp_date,
                ':email' => $pemail
            ));



            public_functions::send_mail($pemail, 'بازیابی کلمه عبور', $link, 'info@khanehvaashpazkhaneh.com');
            return 'لینک بازیابی کلمه عبور به آدرس ایمیل شما ارسال شد';
        }
        return 'خطایی در انجام بازیابی کلمه عبور بوجود آمده است';
    }

    private function check_user_email($pemail) {
        //echo $pemail;
        $sth = $this->db->prepare("SELECT * FROM users WHERE  email = :email and status='Y' ");
        $sth->execute(array(':email' => $pemail));
        echo $sth->rowCount();
        if ($sth->rowCount() == 1) {
            return true;
        } else
            return false;
    }

    function check_key_exist($key) {

        $sth = $this->db->prepare("SELECT * FROM web_send_email_keys WHERE  validkey = :key and exp_date > NOW() and tag='RESET_PASSWORD' ");
        $sth->execute(array(':key' => $key));

        if ($sth->rowCount() > 0) {
            return true;
        } else
            return false;
    }

    function check_key_with_email($key, $email) {

        $sth = $this->db->prepare("SELECT * FROM web_send_email_keys WHERE  validkey = :key and email=:email and exp_date > NOW() and tag='RESET_PASSWORD' ");
        $sth->execute(array(':key' => $key, ':email' => $email));

        if ($sth->rowCount() > 0) {
            return true;
        } else
            return false;
    }

    function RegisterCheckUserAccess($ip, $formname) {
        return true;
        $sth = $this->db->prepare("insert into web_user_access_control(ip,accessname,access_time) values(:ip,:accessname,:access_time) ");
        $sth->execute(array(':ip' => $ip, ':accessname' => $formname, ':accesstime' => 1));

        if ($sth->rowCount() > 0) {
            return true;
        } else
            return false;


        $sth = $this->db->prepare("SELECT * FROM web_user_access_control WHERE ip=:ip ");
        $sth->execute(array(':ip' => $ip, ':formname' => $formname));

        if ($sth->rowCount() > 0) {
            return true;
        } else
            return false;
    }

    function change_reset_password($password, $key, $email) {
        $sth = $this->db->prepare("Update users t1
                                   set t1.password = :password
                                   where t1.email  = :email
                                    and  t1.status = 'Y'
                                    and  exists( SELECT t2.email 
                                                 from   web_send_email_keys t2 
                                                 where  t2.email = t1.email 
                                                 and    t2.validkey = :key 
                                                 and    t2.exp_date > NOW()     )
                                    ");
        $sth->execute(array(':password' => Hash::create('sha256', $password, HASH_PASSWORD_KEY), ':email' => $email, ':key' => $key));
    }

}
