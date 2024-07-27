let timer;

document.addEventListener('DOMContentLoaded', function () {
    const nav = document.querySelector('nav');
    const navLinks = document.querySelector('.nav-links');

    nav.addEventListener('mouseenter', function () {
        clearTimeout(timer);
        navLinks.style.display = 'flex';
    });

    nav.addEventListener('mouseleave', function () {
        timer = setTimeout(function () {
            navLinks.style.display = 'none';
        }, 1000);
    });
});