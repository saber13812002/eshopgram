<?php

set_time_limit(20);
date_default_timezone_set('UTC');
require __DIR__ . '/../../mgp/vendor/autoload.php';
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

function cleaner($str) {

    $str = trim($str);
    $str = htmlspecialchars($str, ENT_IGNORE, 'utf-8');
    $str = strip_tags($str);
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    //$str = public_functions::convertnumber2en($str);
    //$input = stripslashes($input);
    //$str = mysql_real_escape_string($str);
    //if ($str==='') return null;
    return $str;
}

;

function generateRandomString($length = 20, $char = 'both') {
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

;




/////// CONFIG ///////
$username = '7saminta';
$password = '7saminta@123654';
$debug = false;
$truncatedDebug = false;
//////////////////////
/////// MEDIA ////////
//////////////////////
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong1: ' . $e->getMessage() . "\n";
    exit(0);
}
try {
    // The most basic upload command, if you're sure that your photo file is
    // valid on Instagram (that it fits all requirements), is the following:
    // $ig->timeline->uploadPhoto($photoFilename, ['caption' => $captionText]);
    // However, if you want to guarantee that the file is valid (correct format,
    // width, height and aspect ratio), then you can run it through our
    // automatic photo processing class. It is pretty fast, and only does any
    // work when the input file is invalid, so you may want to always use it.
    // You have nothing to worry about, since the class uses temporary files if
    // the input needs processing, and it never overwrites your original file.
    //
    // Also note that it has lots of options, so read its class documentation!
    //$photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
    //$ig->timeline->sendText($photo->getFile(), ['caption' => $captionText]);
    //$ig->direct->sendText(['users'=>['617374186']], 'text test');
    //$ig->direct->sendText(['users'=>['617374186']], 'https://stackoverflow.com/questions/37957817/how-can-i-capture-direct-message-via-instagram-api');

    $website_username = cleaner($_GET['website_username']);
    $instAaccount = cleaner($_GET['instaAccount']);
    $verification_code = generateRandomString(6, 'digit');
    /*     * ******database****** */

//    echo $website_username;
//    echo $instAaccount;
    $servername = "localhost";
    $username = "eshopgram_user";
    $password = "mohsenz?3=JFirFD.^";
    $dbname = "eshopgram_db";

    try {

        $userId = $ig->people->getUserIdForName($instAaccount);
        //$user_info = $ig->people->getInfoById($userId);
        //$ig->direct->sendPost(['users'=>[$userId]], '1952648852049903071_21818262',['media_type'=>'photo']);
        $ig->direct->sendText(['users' => [$userId]], $verification_code);


        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Delete from verification_codes where website_username=:website_username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':website_username' => $website_username));

        $sql = "INSERT INTO  verification_codes (website_username,instaAccount,instaid, verification_code)
    VALUES (:website_username,:instaAccount,:instaid, :verification_code)";
        $stmt = $conn->prepare($sql);
        // use exec() because no results are returned
//    $stmt->bindParam(':name', 'گلدان');
//    $stmt->bindParam(':price', $jsoninfo['price']);
//    $stmt->bindParam(':stock', $jsoninfo['stock']);
//    $stmt->bindParam(':supplier_id', $jsoninfo['productid']);
//    $stmt->bindParam(':media_url', $jsoninfo['imageurl']);
//    $stmt->bindParam(':xloc', $jsoninfo['xloc']);
//    $stmt->bindParam(':yloc', $jsoninfo['yloc']);


        $stmt->execute(array(':website_username' => $website_username,
            ':instaAccount' => $instAaccount,
            ':instaid' => $userId,
            ':verification_code' => $verification_code
                )
        );
        // echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    /*     * ******database****** */


    echo '
         {
          "success":"Y",
          "message":""
         }
        ';
} catch (\Exception $e) {
    //echo 'Something went wrong2: ' . $e->getMessage() . "\n";
    //echo '___'.$e->getMessage().'___';
    //if ($e->getMessage() === 'InstagramAPI\Response\UserInfoResponse: User not found.') {
    echo '         {
          "success":"N",
          "message":"این نام کاربری در اینستاگرم وجود ندارد."
         }
         ';
    //}
}