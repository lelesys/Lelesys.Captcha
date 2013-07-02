<?php

include('../CaptchaBuilderInterface.php');
include('../PhraseBuilderInterface.php');
include('../CaptchaBuilder.php');
include('../PhraseBuilder.php');

use Gregwar\Captcha\CaptchaBuilder;

$captcha = new CaptchaBuilder;
$captcha
    ->build()
    ->save('out.jpg')
    ;
header('Content-type: image/jpeg');
$captcha->output();


$value = $captcha->getPhrase();;

// send a simple cookie
setcookie("TestCookie",$value);