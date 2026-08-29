document.addEventListener('DOMContentLoaded', () => {
    const otpCodeInput = document.getElementById('otp-code');
    const form = document.getElementById('otp-verification-form');
    const loadingOverlay = document.getElementById('loading-overlay');
    const timerElement = document.getElementById('timer');
    const resendOtpButton = document.getElementById('resend-otp');

    // Timer countdown function
    function startTimer(duration, display) {
        let timer = duration, minutes, seconds;
        const interval = setInterval(() => {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(interval);
                display.style.display = 'none';
                resendOtpButton.style.display = 'block';
            }
        }, 1000);
    }

    function resetTimer() {
        timerElement.style.display = 'block';
        resendOtpButton.style.display = 'none';
        startTimer(90, timerElement); // Reset to 1:30
    }

    // Start the timer
    window.onload = () => {
        startTimer(90, timerElement);
    };

    resendOtpButton.addEventListener('click', () => {
        resetTimer();
        // Simulate resending OTP here
        console.log('Resend OTP clicked');
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        loadingOverlay.classList.add('active');
        // Simulate server loading with a timeout
        setTimeout(() => {
            form.submit();
        }, 2000); // Adjust the timeout as needed
    });
});
