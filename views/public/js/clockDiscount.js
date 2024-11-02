function startCountdown(clockDiv, expiryDate) {
    const countdownElement = document.getElementById(clockDiv);
    if (!expiryDate) return;

    const endDate = new Date(expiryDate).getTime();

    function updateClock() {
        const now = new Date().getTime();
        const distance = endDate - now;

        if (distance < 0) {
            clearInterval(interval);
            countdownElement.querySelector('.days').textContent = 0;
            countdownElement.querySelector('.hours').textContent = 0;
            countdownElement.querySelector('.minutes').textContent = 0;
            countdownElement.querySelector('.seconds').textContent = 0;
            return;
        }

        countdownElement.querySelector('.days').textContent = Math.floor(distance / (1000 * 60 * 60 * 24));
        countdownElement.querySelector('.hours').textContent = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        countdownElement.querySelector('.minutes').textContent = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        countdownElement.querySelector('.seconds').textContent = Math.floor((distance % (1000 * 60)) / 1000);
    }

    const interval = setInterval(updateClock, 1000);
    updateClock();
}

const expiryDates = document.querySelectorAll('[data-expiry-date]');
expiryDates.forEach(expiryElement => {
    const expiryDate = expiryElement.getAttribute('data-expiry-date');
    const clockDiv = expiryElement.id; // This assumes each clockdiv has a unique ID
    startCountdown(clockDiv, expiryDate);
});