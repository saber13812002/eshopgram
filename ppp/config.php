<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('DOMAIN','localhost/SaberProjects/eshopgram/eshopgram/public_html');
//define('DOMAIN','eshopgram.com');
define('URL', 'http://'.DOMAIN.'/');
//define('JSON_IP', 'http://213.217.34.130:7780');

define('LIBS', 'Libs/');
define('ORGAN_ID', '1'); 

//Database
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'eshopgram_db_1');
define('DB_USER', 'root');
define('DB_PASS', '');
// define('DB_USER', 'eshopgram_user');
// define('DB_PASS', 'mohsenz?3=JFirFD.^');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200#*@##~@#ddf#2342E4@#$');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'MOhsen@MolaeiCreatesThisapp777');


define('sep_MID', '10728666'); // کد پذیرنده
define('sep_Amount', '1000');// قیمت به ریال
define('sep_ResNum', '123456789');// شماره سفارش
define('sep_RedirectURL', 'https://khanehvaashpazkhaneh.com/finish');// لینک برگشت و برسی نتیجه تراکنش
define('sep_password','6400518');

define('webservice'  , 'https://sep.shaparak.ir/Payments/InitPayment.asmx');
define('webMethodURL', 'https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL');

/** SMS **/ 
define('SMS_DOMAIN', 'daya');
define('SMS_USER_NAME', 'daya');
define('SMS_PASS', 'monaa');
define('SMS_FROM_NUMBER', '30006151');


/** Instagram **/
define('INSTAGRAM_URL','https://www.instagram.com/7saminta/media/');
define('INSTAGRAM_GET_USER_INFO_BY_USERNAME','https://www.instagram.com/{username}/?__a=1');
define('Client_ID', '4c46a18cc7c84221bc93c3dde53ef944');
define('Client_Secret', 'b7bb782d4866449e960971e448154175');
define('redirect_uri', 'https://saminta.com/instagramAp'); 