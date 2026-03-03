const menuToggle = document.getElementById('menuToggle');
const menu = document.querySelector('#menu-toto');


document.querySelector('main').addEventListener('click', function() {
    menu.classList.remove('active');
});

menuToggle.addEventListener('click', function() {
    menu.classList.toggle('active');
});