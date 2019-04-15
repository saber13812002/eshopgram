<?php

set_time_limit(20);
date_default_timezone_set('UTC');

require __DIR__ . '/../../../mgp/vendor/autoload.php';
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

/////// CONFIG ///////
$username = '7saminta';
$password = '7saminta@1236541';
$debug = false;
$truncatedDebug = false;

//////////////////////
/////// MEDIA ////////
//$photoFilename = 'C:\wamp64\www\scrapper\mgp25\download.jpg';
//$captionText = 'Test api';
//////////////////////
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: ' . $e->getMessage() . "\n";
    exit(0);
}

$website_username = $_GET['website_username'];
$instaAccount = $_GET['instaAccount'];
$verification_code = $_GET['verification_code'];


$servername = "localhost";
$username = "eshopgram_user";
$password = "mohsenz?3=JFirFD.^";
$dbname = "eshopgram_db";

try {



    //$ig->direct->sendPost(['users'=>[$userId]], '1952648852049903071_21818262',['media_type'=>'photo']);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "Select * From verification_codes 
                      where verification_code = :verification_code and
                            instaAccount = :instaAccount and
                            website_username = :website_username                                                         
                    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':verification_code' => $verification_code,
        ':instaAccount' => $instaAccount,        
        ':website_username' => $website_username
            )
    );


    $result = $stmt->fetchAll();

    if ($stmt->rowCount() > 0) {
        $user_info = $ig->people->getInfoById($result[0]['instaid']);
        //$user = $user_info->getUser()->getUsername();
        $userinfo = $user_info->getUser();
        
//    $final = '{
//                        "data": {
//                            "userinfo": {'.$user_info.'}
//                                }
//              }';
    //echo $final;
        
//        $sql = "Delete from instagram_user_info where website_username=:website_username";
//        $stmt = $conn->prepare($sql);
//        $stmt->execute(array(':website_username' => $website_username));
        
        $sql = "insert into   instagram_user_info(user_pk,i_username,i_full_name,i_profile_pic_url,i_biography,i_media_count,i_follower_count,i_following_count,token)
                values (:user_pk,:i_username,:i_full_name,:i_profile_pic_url,:i_biography,:i_media_count,:i_follower_count,:i_following_count,:token) ON DUPLICATE KEY UPDATE
                     token = :token
               ";
        $stmt = $conn->prepare($sql);
        $token = generateRandomString();
        $stmt->execute(array(':user_pk' => $userinfo->getPk() ,
                             ':i_username'=> $userinfo->getUsername(),
                             ':i_full_name' => $userinfo->getFullName(),
                             ':i_profile_pic_url'=> $userinfo->getProfilePicUrl(),
                             ':i_biography' => $userinfo->getBiography() ,
                             ':i_media_count' => $userinfo->getMediaCount() ,
                             ':i_follower_count' => $userinfo->getFollowerCount() ,
                             ':i_following_count' => $userinfo->getFollowingCount() ,
                             ':token'=> $token 
                             
                             
            ));
        
        
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header("Access-Control-Allow-Origin: *");
            header("Cache-Control: private, must-revalidate");
            header("Vary: Accept-Encoding,User-Agent");
            header("X-RateLimit-Limit: 60");
            header("X-RateLimit-Remaining: 59");
            header("expires: -1");
            header("pragma: no-cache");        
           echo '{
                    "user":{
                    "userpk":"'.$userinfo->getPk().'",
                    "i_username":"'.$userinfo->getUsername().'",
                    "i_full_name":"'.$userinfo->getFullName().'",
                    "i_biography":"'.$userinfo->getBiography().'",    
                    "i_media_count":"'.$userinfo->getMediaCount().'",    
                    "i_follower_count":"'.$userinfo->getFollowerCount().'", 
                    "i_following_count":"'.$userinfo->getFollowingCount().'", 
                    "token":"'. $token .'"
                    },
                    "success":"Y"
                  }';
//        $sql = "Delete from verification_codes where website_username=:website_username";
//        $stmt = $conn->prepare($sql);
//        $stmt->execute(array(':website_username' => $website_username));
    }



    // echo "New record created successfully";
} catch (PDOException $e) {
    echo '{
           "user":{},
           "success":"N",
           "message":"'.$e->getMessage().'"
          }
    ';
    //echo $sql . "<br>" . $e->getMessage();
}
