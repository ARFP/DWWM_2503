

const username = 'AAATBBTCC';

const regexNom = /[A-Z]*/; // * = 0 ou plusieurs occurences
const regexNom2 = /[A-Z]+/;  // + = 1 ou plusieurs occurences
const regexNom3 = /[A-C]{3,10}/; // 3 occurences minimum, 10 occurences maximum
const regexNom4 = /[A-Z]{3,}/; // 3 occurences minimum, pas de  maximum
const regexNom5 = /[A-Z]{,10}/; // 10 occurences maximum

if(regexNom3.test(username)) {
    console.log('Le nom est OK');
} else {
    console.error('Le nom est incorrect');
}
