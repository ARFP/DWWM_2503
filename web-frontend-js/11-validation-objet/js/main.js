

const formulaire = document.getElementById('formulaire');
const nom = document.getElementById('nom');
const prix = document.getElementById('prix');
const tva = document.getElementById('tva');
const articles = document.getElementById('articles'); // conteneur des articles ajoutés

/**
 * Lorsque le formulaire est soumis : 
 * 1. Récupère les données du formulaire
 * 2. Crée une instance d'une classe repésentant 1 article
 * 3. Valide les données de l'objet
 * 4. Appelle la fonction qui ajoute l'article validé dans la page HTML
 * 5.(Bonus) Sauvegarde les articles dans le stockage local du navigateur
 */
formulaire.addEventListener('submit', () => {

});

/**
 * Ajoute un article validé dan la page HTML sous le formulaire
 * @param {*} article l'article à ajouter
 */
function ajouterArticle(article) {
    let li = document .createElement('li');

    // Le traitement se fera ici

    articles.appendChild(p);
}