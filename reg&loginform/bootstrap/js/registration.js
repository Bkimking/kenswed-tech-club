document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const firstName = document.getElementById('signUpFirstName').value.trim();
        const surname = document.getElementById('signUpSurname').value.trim();
        const username = document.getElementById('signUpUsername').value.trim();
        const email = document.getElementById('signUpEmail').value.trim();
        const password = document.getElementById('signUpPassword').value;
        const confirmPassword = document.getElementById('inputPasswordConfirm').value;

        if (!validateFirstName(firstName)) {
            e.preventDefault();
            alert('Please enter a valid first name!');
        } else if (!validateSurname(surname)) {
            e.preventDefault();
            alert('Please enter a valid surname!');
        } else if (!validateUsername(username)) {
            e.preventDefault();
            alert('Please enter a valid username!');
        } else if (!validateEmail(email)) {
            e.preventDefault();
            alert('Please enter a valid email address!');
        } else if (!validatePassword(password)) {
            e.preventDefault();
            alert('Password must be at least 8 characters long, contain at least one number, one special character, one uppercase letter, and one lowercase letter.');
        } else if (password !== confirmPassword) {
            e.preventDefault();
            alert('Passwords do not match!');
        }
    });
});

function validateFirstName(firstName) {
    // Basic check for letters and spaces
    const re = /^[a-zA-Z\s]*$/;
    return re.test(firstName);
}

function validateSurname(surname) {
    // Basic check for letters and spaces
    const re = /^[a-zA-Z\s]*$/;
    return re.test(surname);
}

function validateUsername(username) {
    // Basic check for letters, numbers, and underscores
    const re = /^[a-zA-Z0-9_]*$/;
    return re.test(username);
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePassword(password) {
    // Password must be at least 8 characters long and include at least one number, one special character, one uppercase letter, and one lowercase letter
    const re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(password);
}
