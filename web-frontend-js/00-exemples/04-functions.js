import { calculateSum } from './04-functions-lib.js';

const userInput = document.getElementById('userInput');
const validate = document.getElementById('validate');
const result = document.getElementById('result');

validate.addEventListener('click', eventBtnValidate);

/**
 * Affiche le résultat du calcul dans la page web
 */
function eventBtnValidate() {
    let finalValue =  calculateSum(userInput.value, result.textContent);
    result.textContent = finalValue;
}
