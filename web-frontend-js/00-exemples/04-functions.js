const userInput = document.getElementById('userInput');
const validate = document.getElementById('validate');
const result = document.getElementById('result');

validate.addEventListener('click', addValue);



/**
 * Affiche le résultat du calcul dans la page web
 * Invoque la fonction calculate()
 * Invoque la fonction saveToBrowser
 */
function addValue() {
    let n = calculate(); 
    saveToBrowser(n);
    result.textContent = n;
}

/**
 * Additionne les valeurs du champs userInput et du paragraphe result
 * @returns {Number} Le résultat du calcul
 */
function calculate() {
    let currentValue = parseInt(result.textContent);
    let valueToAdd = parseInt(userInput.value);
    let finalValue = currentValue + valueToAdd;
    return finalValue;
}

/**
 * Sauvegarde une valeur dans le stockage local du navigateur
 * @param {Number} valueToSave La valeur à sauvegarder
 */
function saveToBrowser(valueToSave) {
    localStorage.setItem('monNombre', valueToSave);
}
