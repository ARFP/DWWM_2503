const newItem = document.getElementById('newItem');
const addItem = document.getElementById('addItem');
const clearItems = document.getElementById('clearItems');
const myList = document.querySelector('#myList');

let toto = document.getElementById('toto');
console.log(toto.dataset);

const myIdeas = ['Element REF-1', 'Element REF', 'Element REF+1'];
/*
myIdeas.push('Element Push'); // push = ajoute un élément à la fin du tableau
myIdeas.unshift('Element Unshift'); // unshift = ajoute un élément au début du tableau
myIdeas.shift();// supprimer le premier du tableau
myIdeas.pop(); // Supprimer le dernier élément du tableau
console.log(myIdeas);
*/

/**
* Ajoute la valeur saisie dans le champ texte à la section myList
* */
function addIdea() {
   // console.log('OK');
   // récupérer la valeur du champ newItem
   let newItemValue = newItem.value;
   console.log(newItemValue);

   // ajoute la valeur au tableau MyIdeas
   myIdeas.push(newItemValue);
   console.log(myIdeas);
   refreshUi();
}

function deleteIdea(event) {

   
   let btn = event.target; // récupérer le bouton qui a déclenché l'évènement
   let position = btn.dataset.position;
   console.log(btn, position);

   myIdeas.splice(position, 1);

   // supprime un élément spécifique d'un tableau !
   //myIdeas.filter(); // filtrer le tableau en supprimant l'élément à supprimer
   //myIdeas.splice(); // supprime un élément du tableau à un index spécifique

   console.log(myIdeas);

   refreshUi();

}

function refreshUi() {

   myList.innerHTML = '';

   for(let i = 0; i < myIdeas.length; i++) {

      let p = document.createElement('p'); // créer une balise <p>
      p.textContent = myIdeas[i]; // ajoute la valeur courante du tableau dans la balise <p>
      myList.append(p); // insère la balise <p> dans la <section id="myList">

      let btn = document.createElement('button'); // <button></button>
      btn.textContent = "Supprimer";  // <button>Supprimer</button>
      btn.type = "button"; //  // <button type="button">Supprimer</button>
      btn.dataset.position = i;
      btn.addEventListener('click', deleteIdea);
      p.append(btn);

   }

}

// addItem.addEventListener('click', addIdea);

