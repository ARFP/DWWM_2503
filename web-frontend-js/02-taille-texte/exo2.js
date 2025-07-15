
const btnIncrease = document.getElementById('btnIncrease');
const btnDecrease = document.getElementById('btnDecrease');
const txtSize = document.querySelector('#txtSize'); 
const txt = document.getElementById('txt');


function applyTextStyle(myFontSize) {
    txtSize.textContent = myFontSize; // on réinjecte la valeur dans le DOM
    txt.style.fontSize = myFontSize + 'px'; // On appplique la taille au texte en modifiant son style 
}

function checkFontSize() {
    let myFontSize = txtSize.textContent; // récupère la valeur dans le <span id="txtSize">
    myFontSize = parseInt(myFontSize); // conversion en nombre

    if(isNaN(myFontSize)) { // si myFontSize n'est pas un nombre valide
        console.error('nombre invalide');
        alert('Nombre invalide ! ');
        return 16;
    }

    return myFontSize;
}

function increaseTextSize() {

    // appel de la fonction checkFontSize
    let myFontSize = checkFontSize();
  
    if(myFontSize < 48) { 
        myFontSize++; // incrémente la valeur
    } else {
        myFontSize = 16;
    }

    applyTextStyle(myFontSize);
}

function decreaseTextSize() {
    // appel de la fonction checkFontSize
    let myFontSize = checkFontSize();

  
    if(myFontSize > 8) { 
        myFontSize--; // incrémente la valeur
    } else {
        myFontSize = 16;
    }

    applyTextStyle(myFontSize);
}




btnIncrease.addEventListener('click', increaseTextSize);
btnDecrease.addEventListener('click', decreaseTextSize);



/*btnIncrease.addEventListener('click', function(event) {
    console.log(this);
    console.log(event);
});*/


/*
btnIncrease.addEventListener('click', () => {
    console.log(4, this);
});*/