const newItem = document.getElementById('newItem');
const addItem = document.getElementById('addItem');
const clearItems = document.getElementById('clearItems');
const myList = document.querySelector('#myList');

/**
* Ajoute la valeur saisie dans le champ texte à la section myList
* */
function addIdea() {
   // console.log('OK');
   // récupérer la valeur du champ newItem
   let newItemValue = newItem.value;
   console.log(newItemValue);

   let p = document.createElement('p');
   p.classList.add('toto');
   p.textContent = newItemValue;
   myList.append(p);

   let btn = document.createElement('button');
   btn.textContent = "Supprimer";
   btn.type = "button";
   p.append(btn);

}

// addItem.addEventListener('click', addIdea);

