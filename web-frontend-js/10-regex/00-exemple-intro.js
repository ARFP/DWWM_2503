/*const pattern = /^toto$/; // const pattern = new RegExp(/toto/);
 
const dataToTest = 'toto is back ! toto'; // FALSE
const dataToTest2 = 'toto'; // TRUE


let result = pattern.test(dataToTest);
let result2 = pattern.test(dataToTest2.trim());

console.log(result, result2);*/

const testChaine = /^[^A-Z]+$/; // + = 1 ou plusieurs occurences

/*
const testChaine2 = /[A-Z]/; // * = 0 ou plusieurs occurences
const testChaine3 = /[A-Z]{2,6}/; // {2,6} = 2 minium et 6 maximum
const testChaine4 = /[A-Z]{2,}/; // {2,} = 2 minimum pas de maximumn
const testChaine5 = /[A-Z]{,6}/; // {,6} = pas de minimum 6 maximumn
const testChaine6 = /[A-Z]{2}/; // {2} = strictement 2 occurences */

/*
let maChaine = 'DAMIEN';


if(testChaine.test(maChaine)) {
    console.log('OK');
} else {
    console.error('erreur');
}
*/

const patternEmail = /^[\w\.-]+@[\w]+\.[a-z]+$/;

const emailOK = 'MDevoldere@example.fr';
const emailErreur = 'toto_example';

const resultOK = patternEmail.test(emailOK);
const resultErreur = patternEmail.test(emailErreur);

console.log(resultOK, resultErreur);