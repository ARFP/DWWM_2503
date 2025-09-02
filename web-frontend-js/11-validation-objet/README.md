# Pourquoi valider avec des objets ?

Le problème des méthodes "spaghetti" (une série de if/else pour chaque champ) :

- Le code devient rapidement illisible, difficile à maintenir et à réutiliser dès que le formulaire grandit.
- Le code devient difficilement maintenable lorsque plusieurs formulaires doivent valider les mêmes types de données.

**La solution orientée objet** : Nous pouvons regrouper la logique de validation et les données du formulaire dans des entités logiques : des objets et des classes. Cela rend le code plus propre, plus modulaire et plus facile à tester.

## Étape 1 : Le Modèle de Données (La Classe Modèle)

Avant de valider, il faut modéliser les données que le formulaire va collecter. C'est le rôle de la classe modèle.

Création de la classe : Créez une classe simple, par exemple User ou Contact, avec un constructeur qui prend les données du formulaire en paramètres.

```js
class Contact {
  constructor(nom, email, message) {
    this.nom = nom;
    this.email = email;
    this.message = message;
  }
}
```

### Explication : 

Cette classe n'a pas encore de méthode de validation. Son seul but est de stocker les données de manière structurée. Cela prépare le terrain pour le prochain objet.

## Étape 2 : L'Objet de Validation (Le Validateur)

C'est ici que la magie opère. Créez un objet littéral ou une classe utilitaire dédiée à la validation.

Création de l'objet de validation : Créez un objet qui contient des méthodes pour valider chaque champ du modèle.


```js
class ContactValidator 
{
  validateNom(nom) {
    if (!nom || nom.length < 3) {
      return "Le nom doit contenir au moins 3 caractères.";
    }
    return null; // Pas d'erreur
  }

  validateEmail(email) {
    // Une simple regex suffit pour l'exemple
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email)) {
      return "Veuillez entrer une adresse email valide.";
    }
    return null;
  }

  validateMessage(message) {
    if (!message || message.length < 10) {
      return "Le message doit contenir au moins 10 caractères.";
    }
    return null;
  }
}
```

### Explication : 

L'approche ici est la séparation des responsabilités. L'objet `Contact` gère les données, tandis que l'objet `ContactValidator` gère la logique de validation. Cela rend les deux entités indépendantes et réutilisables.

## Étape 3 : La Mise en Pratique (Le Code du Formulaire)

Maintenant, reliez le tout au formulaire HTML.

1. **Récupération des données** : Écrivez un gestionnaire d'événement submit pour le formulaire. À l'intérieur, récupérez les valeurs des champs.
2. **Création de l'objet** : Créez une instance de votre classe modèle.

```js
const nom = document.getElementById('nom');
const email = document.getElementById('email');
const message = document.getElementById('message');

const contact = new Contact(nom.value, email.value, message.value);
```

3. **Validation et gestion des erreurs** : Utilisez l'objet de validation pour vérifier les données de l'instance et stocker les erreurs.


```js
const errors = {};
errors.nom = ContactValidator.validateNom(contact.nom);
errors.email = ContactValidator.validateEmail(contact.email);
errors.message = ContactValidator.validateMessage(contact.message);

// Filtrer les erreurs pour ne garder que celles qui existent
const hasErrors = Object.values(errors).some(error => error !== null);

if (hasErrors) {
  // Afficher les erreurs à l'utilisateur
  console.log(errors);
} else {
  // Le formulaire est valide, on peut l'envoyer
  console.log("Formulaire valide !", contact);
}
```

### Explication : 


Le code est maintenant beaucoup plus clair. On instancie d'abord un objet de données, puis on le passe à notre "boîte à outils de validation". Le code n'est plus une longue suite de if, mais une séquence logique d'actions.


## Conclusion et Perspectives d'amélioration

Résumé des avantages : code propre, réutilisable, facile à maintenir et à tester.

Pour aller plus loin : 

- Intégrer le validateur dans la classe modèle : Pour les puristes, on pourrait créer une méthode validate() directement dans la classe Contact.

- Gestion dynamique des messages d'erreurs : Au lieu de simples console.log, comment pourrait-on afficher les messages d'erreur à côté des champs du formulaire ?

- Validation asynchrone : Que faire si la validation nécessite un appel API (par exemple, pour vérifier si un email existe déjà) ? (ce point sera abordé plus tard en collectif)
