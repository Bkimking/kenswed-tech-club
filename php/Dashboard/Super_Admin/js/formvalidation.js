// Form validation
document.querySelector('.contact-form form').addEventListener('submit', function (e) {
    const name = document.querySelector('input[name="name"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const message = document.querySelector('textarea[name="message"]').value;

    if (name === '' || email === '' || message === '') {
        e.preventDefault();
        alert('All fields are required!');
    } else if (!validateEmail(email)) {
        e.preventDefault();
        alert('Please enter a valid email address!');
    }
});

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}
