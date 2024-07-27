// Toggle Menu
function toggleMenu() {
    const navLinks = document.getElementById('navLinks');
    if (navLinks.style.display === 'block') {
        navLinks.style.display = 'none';
    } else {
        navLinks.style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.fa-bars');
    menuIcon.addEventListener('click', toggleMenu);
});


