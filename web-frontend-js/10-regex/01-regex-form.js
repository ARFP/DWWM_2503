const myForm = document.getElementById('myForm');
const myName = document.getElementById('myName');
const myBirthDate = document.getElementById('myBirthDate');
const myPhone = document.getElementById('myPhone');
const myPassword1 = document.getElementById('myPassword1');
const myPassword2 = document.getElementById('myPassword2');

myForm.addEventListener('submit', function (event) {
    event.preventDefault();

    // controles de saisies

    const isNameValid = validateName(myName.value);

    if(true) {
        alert('Formulaire valide !');
    } else {
        alert('Erreur: Vérifier votre saisie');
    }
});


/**
 * 
 * 3 caractères minimum, uniquement des lettres _name 
 * @param {string}
 * @returns 
 */
function validateName(_name) {

    return true;
}

function validateBirtDate(_birthDate) {

    return true;
}

function validatePhoneNumber(_phoneNumber) {

    return true;
}

function validatePassword(_password1, _password2) {

    return true;
}