<?php

set_time_limit(20);
date_default_timezone_set('UTC');
require __DIR__.'/../../mgp/vendor/autoload.php';
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
/////// CONFIG ///////
$GETmediaurl = $_GET['url'];
$username = '7saminta';
$password = '7saminta@1236541';
$debug = false;
$truncatedDebug = false;
//////////////////////
/////// MEDIA ////////

$captionText = 'Test api';
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
     $userId = $ig->people->getUserIdForName('7saminta');
     $mediaInfo = $ig->timeline->getInfo('3482384834_43294')->getItems()[0];
     var_dump($mediaInfo);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
