<?php
set_time_limit(20);
date_default_timezone_set('UTC');
require __DIR__.'/../../mgp/vendor/autoload.php';
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
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
    echo 'Something went wrong: '.$e->getMessage()."\n";
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
    //$user = $ig->people->getInfoByName('mohs3nmolaei');
     $userId    = $ig->people->getUserIdForName('crateandbarrel');     
     $user_info = $ig->people->getInfoById($userId);
     
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header("Access-Control-Allow-Origin: *");
            header("Cache-Control: private, must-revalidate");
            header("Vary: Accept-Encoding,User-Agent");
            header("X-RateLimit-Limit: 60");
            header("X-RateLimit-Remaining: 59");
            header("expires: -1");
            header("pragma: no-cache");
            
     
     echo $user_info;
     
//     $user_info = json_decode($user_info->asJson(),TRUE);
//     
//     $user = $user_info["user"];
//     
//     $user['username'];
//     $user['full_name'];
//     $user['profile_pic_url'];
//     $user['is_verified'];
//     $user['media_count'];
//     $user['follower_count'];
//     $user['following_count'];
//     $user['biography'];
//     $user['external_url'];
     
     
     
     } catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}