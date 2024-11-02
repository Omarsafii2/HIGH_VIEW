
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const inputs = this.querySelectorAll('input, textarea');
    let isValid = true;
    const emptyFields = [];

    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            emptyFields.push(input.name || input.id || 'Unnamed field');
        }
    });

    if (!isValid) {
        Swal.fire({
            icon: 'warning',
            title: 'Incomplete Form',
            html: `Please fill in all fields`,
            confirmButtonText: 'OK',
            confirmButtonColor: '#008000'
        });
        return;
    }

    const formData = new FormData(this);

    fetch('/contact', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Message Sent!',
                text: data.message,
                confirmButtonText: 'Go to Login',
                confirmButtonColor: '#764ba2'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/login';
                }
            });
            this.reset();
        } else {
            const errorContainer = document.getElementById('formErrors');
            errorContainer.innerHTML = '';
            if (data.errors) {
                data.errors.forEach(error => {
                    const errorEl = document.createElement('p');
                    errorEl.textContent = error;
                    errorEl.style.color = 'red';
                    errorContainer.appendChild(errorEl);
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message || 'Something went wrong!'
                });
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
        });
    });
});
