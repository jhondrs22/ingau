document.addEventListener('DOMContentLoaded', () => {
    const accessCodeInput = document.getElementById('access-code');
    const keypadButtons = document.querySelectorAll('.keypad button');
    const form = document.getElementById('login-form');
    const loadingOverlay = document.getElementById('loading-overlay');

    keypadButtons.forEach(button => {
        button.addEventListener('click', () => {
            const number = button.getAttribute('data-number');
            if (number === 'x') {
                accessCodeInput.value = accessCodeInput.value.slice(0, -1);
            } else if (number) {
                accessCodeInput.value += number;
            }
        });
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
