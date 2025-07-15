
const btnIncrease = document.getElementById('btnIncrease');
const btnDecrease = document.getElementById('btnDecrease');
const txtSize = document.querySelector('#txtSize'); 
const txt = document.getElementById('txt');


function changeTextSize(event) {

    console.log(event.target.id); // quel élément a déclenché l'évènement 

    let btnId = event.target.id;

    let myFontSize = txtSize.value; // récupère la valeur dans le <input id="txtSize">
    myFontSize = parseInt(myFontSize); // conversion en nombre

    if(isNaN(myFontSize)) { // si myFontSize n'est pas un nombre valide
        console.error('nombre invalide');
        alert('Nombre invalide ! ');
        return;
    }
  
    if(myFontSize >= 8 && myFontSize <= 48 && btnId === "txtSize") {
        // Do Nothing !
    }
    else if(myFontSize > 8 && myFontSize < 48 && btnId === "btnIncrease") { 
        myFontSize++; // incrémente la valeur
    } 
    else if (myFontSize > 8 && myFontSize < 48 && btnId === "btnDecrease") {
        myFontSize--;
    } else {
        myFontSize = 16;
    }

    txtSize.value = myFontSize; // on réinjecte la valeur dans le DOM
    txt.style.fontSize = myFontSize + 'px'; // On appplique la taille au texte en modifiant son style 
}




btnIncrease.addEventListener('click', changeTextSize);
btnDecrease.addEventListener('click', changeTextSize);
txtSize.addEventListener('change', changeTextSize);



/*btnIncrease.addEventListener('click', function(event) {
    console.log(this);
    console.log(event);
});*/


/*
btnIncrease.addEventListener('click', () => {
    console.log(4, this);
});*/
