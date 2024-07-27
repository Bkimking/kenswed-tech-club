document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('signInForm').addEventListener('submit', function(e) {
        const email = document.getElementById('emailSignIn').value;
        const password = document.getElementById('passwordSignIn').value;

        if (!validateEmail(email)) {
            e.preventDefault();
            alert('Please enter a valid email address!');
        } else if (!validatePassword(password)) {
            e.preventDefault();
            alert('Password must be at least 8 characters long, contain at least one number, one special character, one uppercase letter, and one lowercase letter.');
        }
    });
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePassword(password) {
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    return re.test(password);
}
