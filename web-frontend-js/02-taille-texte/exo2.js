
const btnIncrease = document.getElementById('btnIncrease');
const txtSize = document.querySelector('#txtSize'); 
const txt = document.getElementById('txt');


function increaseTextSize(event) {
    console.log(this);
    console.log(event);

    let fontSize = parseInt(txtSize.textContent);

    /*if(isNaN(fontSize)) {
        console.error('nombre invalide');
        return;
    }*/

    /*console.log(typeof(fontSize));

    if(!(fontSize instanceof Number)) {
        console.error('nombre invalide');
        return;
    }

    console.log(fontSize);*/

}

btnIncrease.addEventListener('click', increaseTextSize);



/*btnIncrease.addEventListener('click', function(event) {
    console.log(this);
    console.log(event);
});*/


/*
btnIncrease.addEventListener('click', () => {
    console.log(4, this);
});*/