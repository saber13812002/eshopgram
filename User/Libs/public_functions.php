<?php

class public_functions {

    function __construct() {
        
    }

    function send_mail($pto, $psubject, $ptext, $pfrom = 'info@khanehvaashpazkhaneh.com') {
        $to = $pto;
        $subject = $psubject; //"My subject";
        $txt = $ptext; //"به وب سایت خانه و آشپزخانه خوش آمدید";
        $headers = "From: " . $pfrom; // "From: info@khanehvaashpazkhaneh.com";

        mail($to, $subject, $txt, $headers);
    }

    function send_sms($cDomainname, $cUserName, $cPassword, $cFromNumber, $cSmsnumber, $msg) {

//     if (file_exists('Libs/StandardLibs/nusoap.php')){      
//         require_once('Libs/StandardLibs/nusoap.php');
//     }
        $client = new SoapClient("http://mehrafraz.com/webservice/Service.asmx?wsdl");
        //var_dump($client);
        print_r($client->SendSms(array("cUserName" => $cUserName,
                    "cPassword" => $cPassword,
                    "cBody" => $msg,
                    "cSmsnumber" => $cSmsnumber,
                    "cGetid" => "11231233423434",
                    "nCMessage" => "1",
                    "nTypeSent" => "1",
                    "m_SchedulDate" => "",
                    "cDomainname" => $cDomainname,
                    "cFromNumber" => $cFromNumber,
                    "nSpeedsms" => "0",
                    "nPeriodmin" => "0",
                    "cstarttime" => "",
                    "cEndTime" => "")));
        //echo "<p>Request :".htmlspecialchars($client->__getLastRequest()) ."</p>";
        //echo "<p>Response:".htmlspecialchars($client->__getLastResponse())."</p>";
    }

    public static function cleaner($str) {

        $str = trim($str);
        $str = htmlspecialchars($str, ENT_IGNORE, 'utf-8');
        $str = strip_tags($str);
        $str = filter_var($str, FILTER_SANITIZE_STRING);
        $str = public_functions::convertnumber2en($str);
        //$input = stripslashes($input);
        //$str = mysql_real_escape_string($str);
        //if ($str==='') return null;
        return $str;
    }

    public static function cleanerwithoutfilter($str) {

        $str = trim($str);
        $str = htmlspecialchars($str, ENT_IGNORE, 'utf-8');
        $str = strip_tags($str);
        //$str = filter_var($str, FILTER_SANITIZE_STRING);
        //$input = stripslashes($input);
        //$str = mysql_real_escape_string($str);
        //if ($str==='') return null;
        return $str;
    }

    function cleanMe($input) {
        $input = mysql_real_escape_string($input);
        $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
        $input = strip_tags($input);
        $input = stripslashes($input);
        return $input;
    }

    public function check_file($file) {
        $files = array('test.gif');
        if (in_array($_GET['file'], $files)) {
            $f = include ($_GET['file']);

            return $f;
        }
    }

    public static function generateRandomString($length = 20, $char = 'both') {
        if ($char == 'digit')
            $characters = '0123456789';
        elseif ($char == 'char')
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        elseif ($char == 'both')
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        elseif ($char == '3rd')
            $characters = '!@#$%^&*()+~-><?:{}[]|/';

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function gen_rand_str4cookie() {
        $str = public_functions::generateRandomString(50);
//        $db = new Database();
//        $sth = $db->prepare("SELECT * from web_tmp_invoice_items where cookie = :cookie ");
//        $sth->execute(array(':cookie' => $str));
//
//        if ($sth->rowCount() > 0) {
//            return  date("Ymdhisa-").public_functions::generateRandomString(500);
//        } else {
        return date("Ymdhis-") . '-' . $_SERVER['REMOTE_ADDR'] . '-' . $str;
        //}
    }

    public static function get_seq($tbl, $id, $digit) {
        $str = public_functions::generateRandomString($digit, 'digit');
        $db = new Database();
        $sth = $db->prepare("SELECT * from :tbl where :id = :invoice_no  ");
        $sth->execute(array(
            ':tbl' => $id,
            ':id' => $tbl,
            ':invoice_no' => $str));

        if ($sth->rowCount() > 0) {
            return public_functions::generateRandomString($digit);
            ;
        } else {
            return $str;
        }
    }

    public static FUNCTION WIN1256STR_REV($PSTR) {


        $char_tab1[1] = '\u0627';
        $char_tab1[2] = '\u0628';
        $char_tab1[3] = '\u067E';
        $char_tab1[4] = '\u062A';
        $char_tab1[5] = '\u062B';
        $char_tab1[6] = '\u062E';
        $char_tab1[7] = '\u062C';
        $char_tab1[8] = '\u0686';
        $char_tab1[9] = '\u0645';
        $char_tab1[10] = '\u0631';
        $char_tab1[11] = '\u062F';
        $char_tab1[12] = '\u0630';
        $char_tab1[13] = '\u0635';
        $char_tab1[14] = '\u0636';
        $char_tab1[15] = '\u0637';
        $char_tab1[16] = '\u0638';
        $char_tab1[17] = '\u0647';
        $char_tab1[18] = '\u06A9';
        $char_tab1[19] = '\u06AF';
        $char_tab1[20] = '\u0642';
        $char_tab1[21] = '\u0641';
        $char_tab1[22] = '\u06CC';
        $char_tab1[23] = '\u0648';
        $char_tab1[24] = '\u0633';
        $char_tab1[25] = '\u0634';
        $char_tab1[26] = '\u0644';
        $char_tab1[27] = '\u0646';
        $char_tab1[28] = '\u0639';
        $char_tab1[29] = '\u063A';
        $char_tab1[30] = '\u0698';
        $char_tab1[31] = '\u062D';
        $char_tab1[32] = '\u0632';
        $char_tab1[33] = '\u0622';
        $char_tab1[34] = '\u0621';
        $char_tab1[35] = '\u064A';
        $char_tab1[36] = '\u0643';
        $char_tab1[37] = '\u0624';
        $char_tab1[38] = '\u0625';
        $char_tab1[39] = '\u0623';
        $char_tab1[40] = '\u0629';
        $char_tab1[41] = '\u06be';
        $char_tab1[42] = '\u0626';

        $char_tab2[1] = 'Ø§'; // 'ا';
        $char_tab2[2] = 'Ø¨'; // 'ب';
        $char_tab2[3] = 'Ù¾'; // 'پ';
        $char_tab2[4] = 'Øª'; // 'ت';
        $char_tab2[5] = 'Ø«'; // 'ث';
        $char_tab2[6] = 'Ø®'; // 'خ';
        $char_tab2[7] = 'Ø¬'; // 'ج';
        $char_tab2[8] = 'Ú†'; // 'چ';
        $char_tab2[9] = 'Ù…'; //'م';
        $char_tab2[10] = 'Ø±'; // 'ر';
        $char_tab2[11] = 'Ø¯'; // 'د';
        $char_tab2[12] = 'Ø°'; // 'ذ';
        $char_tab2[13] = 'Øµ'; // 'ص';
        $char_tab2[14] = 'Ø¶'; //'ض';
        $char_tab2[15] = 'Ø·'; // 'ط';
        $char_tab2[16] = 'Ø¸'; //'ظ';
        $char_tab2[17] = 'Ù‡'; // 'ه';
        $char_tab2[18] = 'Ú©'; // 'ک';
        $char_tab2[19] = 'Ú¯'; // 'گ';
        $char_tab2[20] = 'Ù‚'; // 'ق';
        $char_tab2[21] = 'Ù'; // 'ف';
        $char_tab2[22] = 'ÛŒ'; //'ي';
        $char_tab2[23] = 'Ùˆ'; //'و';
        $char_tab2[24] = 'Ø³'; // 'س';
        $char_tab2[25] = 'Ø´'; // 'ش';
        $char_tab2[26] = 'Ù„'; // 'ل';
        $char_tab2[27] = 'Ù†'; // 'ن';
        $char_tab2[28] = 'Ø¹'; // 'ع';
        $char_tab2[29] = 'Øº'; // 'غ';
        $char_tab2[30] = 'Ú˜'; // 'ژ';
        $char_tab2[31] = 'Ø­'; // 'ح';
        $char_tab2[32] = 'Ø²'; // 'ز';
        $char_tab2[33] = 'Ø¢'; // 'آ';
        $char_tab2[34] = '34'; // 'ء' ;
        $char_tab2[35] = 'ÙŠ'; // 'ي';
        $char_tab2[36] = '36'; // 'ك';
        $char_tab2[37] = '37'; // 'ؤ';
        $char_tab2[38] = '38'; //'إ';
        $char_tab2[39] = '39'; // 'أ';
        $char_tab2[40] = '40'; // 'ة';
        $char_tab2[41] = '41'; // 'ھ';
        $char_tab2[42] = '42'; // 'ئ';

        $inStr = '';
        foreach ($char_tab1 as $key => $value) {
            $PSTR = str_replace($char_tab2[$key], $char_tab1[$key], $PSTR);
        }

        //inStr = str_repeat( inStr, $char_tab1[j), $char_tab2[j) );

        return $PSTR;
    }

    public static FUNCTION WIN1256STR($PSTR) {


        $char_tab1[1] = 'u0627';
        $char_tab1[2] = 'u0628';
        $char_tab1[3] = 'u067E';
        $char_tab1[4] = 'u062A';
        $char_tab1[5] = 'u062B';
        $char_tab1[6] = 'u062E';
        $char_tab1[7] = 'u062C';
        $char_tab1[8] = 'u0686';
        $char_tab1[9] = 'u0645';
        $char_tab1[10] = 'u0631';
        $char_tab1[11] = 'u062F';
        $char_tab1[12] = 'u0630';
        $char_tab1[13] = 'u0635';
        $char_tab1[14] = 'u0636';
        $char_tab1[15] = 'u0637';
        $char_tab1[16] = 'u0638';
        $char_tab1[17] = 'u0647';
        $char_tab1[18] = 'u06A9';
        $char_tab1[19] = 'u06AF';
        $char_tab1[20] = 'u0642';
        $char_tab1[21] = 'u0641';
        $char_tab1[22] = 'u06CC';
        $char_tab1[23] = 'u0648';
        $char_tab1[24] = 'u0633';
        $char_tab1[25] = 'u0634';
        $char_tab1[26] = 'u0644';
        $char_tab1[27] = 'u0646';
        $char_tab1[28] = 'u0639';
        $char_tab1[29] = 'u063A';
        $char_tab1[30] = 'u0698';
        $char_tab1[31] = 'u062D';
        $char_tab1[32] = 'u0632';
        $char_tab1[33] = 'u0622';
        $char_tab1[34] = 'u0621';
        $char_tab1[35] = 'u064A';
        $char_tab1[36] = 'u0643';
        $char_tab1[37] = 'u0624';
        $char_tab1[38] = 'u0625';
        $char_tab1[39] = 'u0623';
        $char_tab1[40] = 'u0629';
        $char_tab1[41] = 'u06be';
        $char_tab1[42] = 'u0626';

        $char_tab1[60] = 'u064A';

        $char_tab2[1] = 'ا'; // 'ا';
        $char_tab2[2] = 'ب'; // 'ب';
        $char_tab2[3] = 'پ'; // 'پ';
        $char_tab2[4] = 'ت'; // 'ت';
        $char_tab2[5] = 'ث'; // 'ث';
        $char_tab2[6] = 'خ'; // 'خ';
        $char_tab2[7] = 'ج'; // 'ج';
        $char_tab2[8] = 'چ'; // 'چ';
        $char_tab2[9] = 'م'; //'م';
        $char_tab2[10] = 'ر'; // 'ر';
        $char_tab2[11] = 'د'; // 'د';
        $char_tab2[12] = 'ذ'; // 'ذ';
        $char_tab2[13] = 'ص'; // 'ص';
        $char_tab2[14] = 'ض'; //'ض';
        $char_tab2[15] = 'ط'; // 'ط';
        $char_tab2[16] = 'ظ'; //'ظ';
        $char_tab2[17] = 'ه'; // 'ه';
        $char_tab2[18] = 'ک'; // 'ک';
        $char_tab2[19] = 'گ'; // 'گ';
        $char_tab2[20] = 'ق'; // 'ق';
        $char_tab2[21] = 'ف'; // 'ف';
        $char_tab2[22] = 'ي'; //'ي';
        $char_tab2[23] = 'و'; //'و';
        $char_tab2[24] = 'س'; // 'س';
        $char_tab2[25] = 'ش'; // 'ش';
        $char_tab2[26] = 'ل'; // 'ل';
        $char_tab2[27] = 'ن'; // 'ن';
        $char_tab2[28] = 'ع'; // 'ع';
        $char_tab2[29] = 'غ'; // 'غ';
        $char_tab2[30] = 'ژ'; // 'ژ';
        $char_tab2[31] = 'ح'; // 'ح';
        $char_tab2[32] = 'ز'; // 'ز';
        $char_tab2[33] = 'آ'; // 'آ';
        $char_tab2[34] = 'ء'; // 'ء' ;
        $char_tab2[35] = 'ي'; // 'ي';
        $char_tab2[36] = 'ك'; // 'ك';
        $char_tab2[37] = 'ؤ'; // 'ؤ';
        $char_tab2[38] = 'إ'; //'إ';
        $char_tab2[39] = 'أ'; // 'أ';
        $char_tab2[40] = 'ة'; // 'ة';
        $char_tab2[41] = 'ھ'; // 'ھ';
        $char_tab2[42] = 'ئ'; // 'ئ';

        $char_tab2[60] = 'ی'; // 'ی';
        $inStr = '';
        foreach ($char_tab1 as $key => $value) {
            $PSTR = str_replace($char_tab2[$key], $char_tab1[$key], $PSTR);
        }

        //inStr = str_repeat( inStr, $char_tab1[j), $char_tab2[j) );

        return $PSTR;
    }

    public static function Empty2Null($question) {
        if (isset($question) && trim($question) === '')
            return NULL;
        else
            return $question;
    }

    public static function getUserIP() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public function curl_reader($url) {

        if ($url == NULL)
            return false;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode >= 200 && $httpcode < 300) {
            null;
        } else {
            return FALSE;
        }

        //$content = file_get_contents($url);

        for ($i = 0; $i <= 31; ++$i) {
            $content = str_replace(chr($i), "", $content);
        }
        $content = str_replace(chr(127), "", $content);

        // This is the most common part
        // Some file begins with 'efbbbf' to mark the beginning of the file. (binary level)
        // here we detect it and we remove it, basically it's the first 3 characters 
        if (0 === strpos(bin2hex($content), 'efbbbf')) {
            $content = substr($content, 3);
        }
        $content = iconv('WINDOWS-1256', 'UTF-8', $content);
        $content = public_functions::replace_chr238($content);

        return $content;
    }

    static function json_curl_reader($url) {

        if ($url == NULL)
            return false;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode >= 200 && $httpcode < 300) {
            null;
        } else {
            return FALSE;
        }

        //$content = file_get_contents($url);

        for ($i = 0; $i <= 31; ++$i) {
            $content = str_replace(chr($i), "", $content);
        }
        $content = str_replace(chr(127), "", $content);

        // This is the most common part
        // Some file begins with 'efbbbf' to mark the beginning of the file. (binary level)
        // here we detect it and we remove it, basically it's the first 3 characters 
        if (0 === strpos(bin2hex($content), 'efbbbf')) {
            $content = substr($content, 3);
        }
        $content = iconv('WINDOWS-1256', 'UTF-8', $content);
        $content = public_functions::replace_chr238($content);
        $json = json_decode($content, true);
        return $json;
    }

    public function json_reader($url) {
        // This will remove unwanted characters.
        // Check http://www.php.net/chr for details
        $content = file_get_contents($url);

        for ($i = 0; $i <= 31; ++$i) {
            $content = str_replace(chr($i), "", $content);
        }
        $content = str_replace(chr(127), "", $content);

        // This is the most common part
        // Some file begins with 'efbbbf' to mark the beginning of the file. (binary level)
        // here we detect it and we remove it, basically it's the first 3 characters 
        if (0 === strpos(bin2hex($content), 'efbbbf')) {
            $content = substr($content, 3);
        }
        $content = iconv('WINDOWS-1256', 'UTF-8', $content);
        $content = public_functions::replace_chr238($content);
        $json = json_decode($content, true);
        return $json;
    }

    public function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url) {
        $pagination = '';
        if ($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages) { //verify total pages and current page number
            $pagination .= '<ul class="pagination">';

            $right_links = $current_page + 3;
            $previous = $current_page - 3; //previous link
            $next = $current_page + 1; //next link
            $first_link = true; //boolean var to decide our first link

            if ($current_page > 1) {
                $previous_link = ($previous == 0) ? 1 : $previous;
                $pagination .= '<li class="first"><a href="' . $page_url . '?page=1" title="First">&laquo;</a></li>'; //first link
                $pagination .= '<li><a href="' . $page_url . '?page=' . $previous_link . '" title="Previous">&lt;</a></li>'; //previous link
                for ($i = ($current_page - 2); $i < $current_page; $i++) { //Create left-hand side links
                    if ($i > 0) {
                        $pagination .= '<li><a href="' . $page_url . '?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if ($first_link) { //if current active page is first link
                $pagination .= '<li class="first active">' . $current_page . '</li>';
            } elseif ($current_page == $total_pages) { //if it's the last active link
                $pagination .= '<li class="last active">' . $current_page . '</li>';
            } else { //regular current link
                $pagination .= '<li class="active">' . $current_page . '</li>';
            }

            for ($i = $current_page + 1; $i < $right_links; $i++) { //create right-hand side links
                if ($i <= $total_pages) {
                    $pagination .= '<li><a href="' . $page_url . '?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($current_page < $total_pages) {
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="' . $page_url . '?page=' . $next_link . '" >&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="' . $page_url . '?page=' . $total_pages . '" title="Last">&raquo;</a></li>'; //last link
            }

            $pagination .= '</ul>';
        }
        return $pagination; //return pagination links
    }

    static function RoundNearest($val, $nearest = 5000) {
        return floor($val / $nearest) * $nearest;
    }

    function urlExists($url = NULL) {
        if ($url == NULL)
            return false;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpcode >= 200 && $httpcode < 300) {
            return true;
        } else {
            return false;
        }
    }

    function check_national_code($code_melli) {

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

    function checkCaptcha() {
        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = public_functions::cleaner($_POST['g-recaptcha-response']);
        }
        //var_dump($captcha.'ccc');
        if ($captcha == "" && $captcha == null) {
            $captcha_msg .= ' تیک من روبات نیستم را بزنید و دوباره تلاش کنید ';
            return 5;
        }
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le0rigTAAAAAFf-p_N1KS4xiHbzesTKEdHD1QrB&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $json = json_decode($response, true);
        //return  $json['success']; 

        if ($json['success'] == false) {
            $captcha_msg .= ' دسترسی غیر مجاز ';
        } else {

            return 1;
        }
        return 5;
    }

    function check_q($sth) {
        if ($sth->rowCount() > 0 && $sth->errorInfo()[0] == '00000')
            return true;
    }
    function check_q2($sth) {
        if ($sth->errorInfo()[0] == '00000')
            return true;
    }
    function show_error($sth) {
        return $sth->errorInfo();
    }

    function read_var_req($arr, $cleaner = true) {

        foreach ($arr as $key => $value) {
            if (isset($arr[$key]))
                if ($cleaner == true)
                    $data[$key] = public_functions::cleaner($arr[$key]);
                elseif ($cleaner == false)
                    $data[$key] = ($arr[$key]);
        }
        return $data;
    }

    function get_string_between($string, $start, $end) {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0)
            return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function replace_chr238($str) {
        return str_replace('&#1740;', 'ی', str_replace("ي", "ی", $str));
    }

    function en2fa_digits($text) {
        $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '٥', '۶', '۷', '۸', '۹');
        $english_digits = array('0', '1', '2', '3', '4', '5', '5', '6', '7', '8', '9');
        $text = str_replace($english_digits, $persian_digits, $text);
        return $text;
    }

    function fa2en_digits($text) {
        $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '٥', '۶', '۷', '۸', '۹');
        $english_digits = array('0', '1', '2', '3', '4', '5', '5', '6', '7', '8', '9');
        $str = str_replace($persian_digits, $english_digits, $text);
        return $str;
    }

    function ab2fa_digits($text) {
        $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۴', '۵', '۵', '۶', '۶', '۷', '۸', '۹');
        $arabic_digits = array('٠', '١', '٢', '٣', '۴', '٤', '۵', '٥', '۶', '٦', '٧', '٨', '٩');
        $str = str_replace($arabic_digits, $persian_digits, $text);
        return $str;
    }

    public static function convertnumber2en($text) {
        $strfa = public_functions::ab2fa_digits($text);
        $stren = public_functions::fa2en_digits($strfa);
        return $stren;
    }

    public static function ChangeYa($str) {
        $chnged = str_replace('ي', 'ی', $str);
        $chnged = str_replace('ك', 'ک', $chnged);
        $chnged = str_replace('ة', 'ه', $chnged);

        return $chnged;
    }

    function ValidateEmail($pemail) {
        $email = $pemail;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "فرمت ایمیل وارد شده صحیح نیست";
            $emailErr .='<br>';
        }
        return $emailErr;
    }

    function ValidateMobileNo($pmobile_no) {
        $mobile_no = public_functions::convertnumber2en($pmobile_no);
        if (strlen($mobile_no) > 11 || strlen($mobile_no) <= 9) {
            $Err = "طول شماره همراه صحیح نیست مثال  : 09121234567";
            $Err .='<br>';
        } else {
            $mobile_no = str_pad($mobile_no, 11, "0", STR_PAD_LEFT);
            if (strpos($mobile_no, '9') != 1) {
                $Err = "شماره موبایل صحیح نیست مثال: 09121234567";
                $Err .='<br>';
            }
        }

        return $Err;
    }

    function GetAllFormRequestData() {
        if (isset($_REQUEST['token_id'])) {
            null;
        }

            
        foreach ($_REQUEST as $key => $value) {
            $k = public_functions::cleaner($key);
            $v = public_functions::cleaner($value);
            
            if (is_array($value)) {
                foreach ($value as $value2) {                    
                    $v2 = public_functions::cleaner($value2);
                    $v[] = $v2 ;
                }
                //var_dump($value);
            }
            //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

            $data[$k] = $v;
        }
        return $data;
    }

    static function ExecAPI($url, $parameters = null) {
        $curl = curl_init($url);

        if ($parameters) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $insta = curl_exec($curl);
        $insta = json_decode($insta, true);

        return $insta;
    }

}

?>
