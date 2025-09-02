const art_date = document.getElementById('art_date');

/* Définit la date minimale possible pour la livraison */
const today = new Date(); // Date du jour
today.setDate(today.getDate() + 8); // On ajoute 8 jours
art_date.min = today.toJSON().slice(0, 10); // on définit cette date dans l'attribut "min" du champ correpsondant

