let today;
const myDate = document.getElementById('myDate');
const calculate = document.getElementById('calculate');
const result = document.getElementById('result');

/**
 * Calcule l'age à partir de la date fournie dans le champ "myDate"
 * 1. Récupérer la valeur dans le champ "myDate"
 * 2. Vérifier la validité de la date (format, date dans le passé)
 *      2.1 : Si la date est incorrecte : afficher le message d'erreur
 *      2.2 : Retour à l'étape 1
 * 3. Afficher la date au format français (DD/MM/YYYY) et l'heure au format (HH:II:SS).
 * 4. Calculer et afficher l'âge à partir de la date fournie.
 * 
 */
function calculateAge() {
    result.textContent = ""; 
    let userDate = myDate.value; // Récupère la valeur du champ sous forme de chaine de caractères
    userDate = Date.parse(userDate); // Convertit la chaine et nombre de millisecondes depuis EPOCH
    userDate = new Date(userDate); // Crée une instance de Date 
    today = new Date(); // date d'aujourd'hui

    if(userDate > today) {
        result.textContent = "ERREUR : Sélectionnez une date dans le passé.";
        return;
    }

    let dateFr = userDate.toLocaleDateString('fr-FR'); // Récupération de la date au format Français (DD/MM/YYYY)
    let timeFr = userDate.toLocaleTimeString(); // Récupération de l'heure au format HH:II:SS

    result.innerHTML = "Vous êtes né(e) le <span>" + dateFr + "</span> à <span>" + timeFr + "</span>";

    let dateDiff = today - userDate;
    dateDiff = dateDiff / 1000 / 60 / 60 / 24 / 365.25; // convertit millescondes en années
    dateDiff = Math.floor(dateDiff); // on conserve la partie entière du nombre, on aurait pu utiliser "parseInt(dateDiff)"

    result.innerHTML += "<br><br>Il s'est écoulé " + dateDiff + " année(s) depuis votre naissance";
}

calculate.addEventListener('click', calculateAge);
