// Toggle menu principal
document.querySelector('.menu-toggle').addEventListener('click', () => {
    document.querySelector('.main-navigation').classList.toggle('toggled');
});

// Toggle sous-menus sur mobile au clic sur le parent
document.querySelectorAll('.menu-item-has-children > a').forEach(item => {
    item.addEventListener('click', (e) => {
        if (window.innerWidth < 768) {
            e.preventDefault();
            item.parentElement.classList.toggle('open');
        }
    });
});