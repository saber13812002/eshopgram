<?php

class register extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        if (Session::get('loggedIn') == true) {
            $this->view->loggedIn = true;
            session_destroy();
            header('location: ../login');
        } else
            $this->view->loggedIn = false;
    }

    function index() {

        if (isset($_POST['thecmd'])) {
            if ($_POST['thecmd'] == CMD_REGISTER && $_SERVER['HTTP_HOST'] == DOMAIN) {
                if ($this->checkCaptcha() === 1)
                    $this->create();
            }
        } else {
            //$this->view->alluser = $this->model->view_users();
            $this->view->render('register/index', false, ' ', ' ', ' ');
        }
    }

    function verification() {

        if (isset($_POST['thecmd'])) {
            if ($_POST['thecmd'] == CMD_REGISTER && $_SERVER['HTTP_HOST'] == DOMAIN) {
                if ($this->checkCaptcha() === 1)
                    $this->create();
            }
        } else {
            //$this->view->alluser = $this->model->view_users();
            $this->view->render('register/verification', false, ' ', ' ', ' ');
        }
    }

    function choose_theme() {

        if (isset($_POST['thecmd'])) {
            if ($_POST['thecmd'] == CMD_REGISTER && $_SERVER['HTTP_HOST'] == DOMAIN) {
                if ($this->checkCaptcha() === 1)
                    $this->create();
            }
        } else {
            //$this->view->alluser = $this->model->view_users();
            $this->view->render('register/choose_theme', false, ' ', ' ', ' ');
        }
    }

    function domain() {

        if (isset($_POST['thecmd'])) {
            if ($_POST['thecmd'] == CMD_REGISTER && $_SERVER['HTTP_HOST'] == DOMAIN) {
                if ($this->checkCaptcha() === 1)
                    $this->create();
            }
        } else {
            //$this->view->alluser = $this->model->view_users();
            $this->view->render('register/domain', false, ' ', ' ', ' ');
        }
    }
    
    
       function successful_record() {

        if (isset($_POST['thecmd'])) {
            if ($_POST['thecmd'] == CMD_REGISTER && $_SERVER['HTTP_HOST'] == DOMAIN) {
                if ($this->checkCaptcha() === 1)
                    $this->create();
            }
        } else {
            //$this->view->alluser = $this->model->view_users();
            $this->view->render('register/successful_record', false, ' ', ' ', ' ');
        }
    }
    

    private function create() {
        //echo public_functions::cleaner( $_POST['email']);
        $err = array();
        $err_list = array();
        $data = array('email' => null, 'password' => null, 'name' => null, 'lastname' => null, 'tel' => null, 'postalcode' => null, 'address' => null, 'mobile_no' => null, 'gender' => null, 'National_Code' => null);
        $data['email'] = public_functions::cleaner($_POST['email']);
        $data['password'] = public_functions::cleaner($_POST['password']);
        $data['name'] = public_functions::cleaner($_POST['name']);
        $data['lastname'] = public_functions::cleaner($_POST['lastname']);
        //$data['tel'] = public_functions::convertnumber2en(public_functions::cleaner($_POST['tel']));
        //$data['postalcode'] = public_functions::convertnumber2en(public_functions::cleaner($_POST['postalcode']));
        //$data['address'] = public_functions::cleaner($_POST['address']);
        $data['mobile_no'] = public_functions::convertnumber2en(public_functions::cleaner($_POST['mobile_no']));
        $data['gender'] = public_functions::cleaner($_POST['gender']);
        $data['National_Code'] = public_functions::convertnumber2en(public_functions::cleaner($_POST['national_code']));





        if ($this->check_national_code($data['National_Code'])) {

            $err = $this->model->create($data);
        } else {
            $this->view->data = $data;
            $err_list[3] = 'کد ملی صحیح نیست';
            $this->view->errorlist = $err_list;
        }
        //$this->view->msg = $data['name'] . '  ' . $data['lastname'];
        //$this->view->alluser = $this->model->view_users();        
        //$this->view->render('register/index');
        if ($err[0] == '00000') {
            //public_functions::send_mail($data['email'], 'به وب سایت خانه وآشپزخانه خوش آمدید', 'ثبت اطلاعات شما با موفقیت انجام شد', 'info@khanehvaashpazkhaneh.com');
            $this->view->success = 'ثبت با موفقیت انجام شد';
            //header('location: ../login');
            $this->view->render('register/index');
        } else if ($err[0] != '00000') {
            if (strpos($err[2], 'mobile_uq'))
                $err_list[1] = ' شماره موبایل قبلا در سیستم ثبت شده است ';

            if (strpos($err[2], 'email_uq'))
                $err_list[2] = ' آدرس ایمیل قبلا در سیستم ثبت شده است';
            $this->view->errorlist = $err_list;
            $this->view->data = $data;
        }

        //$this->view->render('register/index');
    }

    function showall() {
        $this->view->alluser = $this->model->view_users();
        $this->view->render('register/index');
    }

    private function check_national_code($code_melli) {

        if (!preg_match('/^[0-9]{10}$/', $code_melli))
            return false;


        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $code_melli))
                return false;

        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum+=((10 - $i) * intval(substr($code_melli, $i, 1)));

        $ret = $sum % 11;
        $parity = intval(substr($code_melli, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

}
