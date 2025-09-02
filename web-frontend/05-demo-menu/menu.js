var menuToggle = document.getElementById('menuToggle');
console.log('menuToggle = ', menuToggle);

var menu = document.getElementById('menu');
console.log('menu = ', menu);

menuToggle.addEventListener('click', function(event) {

    if(menu.style.display == 'none') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }

});