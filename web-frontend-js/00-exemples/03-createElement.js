const newItem = document.getElementById('newItem');
const addItem = document.getElementById('addItem');
const clearItems = document.getElementById('clearItems');
const myList = document.querySelector('#myList');


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
   let newItemValue = newItem.value;
   myIdeas.push(newItemValue);
   refreshUi();
}

/**
 * Supprime un élément du tableau de données
 * @param {PointerEvent} event 
 */
function deleteIdea(event) {
   let btn = event.target; // récupérer le bouton qui a déclenché l'évènement
   let position = btn.dataset.position;
   myIdeas.splice(position, 1); // supprimer un élément à partir de sa position. (voir aussi filter())
   refreshUi();
}

/**
 * Mets à jour l'interface utilisateur à partir du jeu de données
 */
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

