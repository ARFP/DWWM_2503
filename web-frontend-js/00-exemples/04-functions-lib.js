/**
 * Calcule la somme de 2 nombres entiers
 * @param {*} num1 Le 1er nombre
 * @param {*} num2 Le 2ème nombre
 * @returns {Number} le résultat du calcul
 */
export function calculateSum(num1, num2) {
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    let sum = num1 + num2;
    return sum;
}

/**
 * Contrôle si la valeur fournie en argument est un nombre entier positif
 * @param {*} num 
 * @returns 
 */
export function isValidPositiveNumber(num) {

    if(isNaN(num)) {
        return false;
    }

    if(num <= 0) { 
        return false;
    }

    return true;
}



