# Exercice Bibliotheque

[Lien vers l'exercice](https://arfp.github.io/tp/databases/analyse/02-bibliotheque)

## Travail à réaliser

Réalisez le dictionnaire des données correspondant à la description ci-dessous.

## Expression du besoin

La Bibliothèque d’un syndicat intercommunal consiste en plusieurs **points de prêt**. Ces centres disposent d’ordinateurs personnels interconnectés qui doivent permettre de gérer les emprunts.

L’interview des bibliothécaires permet de déterminer les faits suivants :

- Un client qui s’inscrit à la bibliothèque verse une **caution**.
- Suivant le montant de cette caution il aura le droit d’effectuer en même temps de 1 à 10 **emprunts**.
- Les emprunts durent au maximum 8 jours.
- Un livre est caractérisé par **son numéro dans la bibliothèque** (identifiant), son **éditeur** et son (ses) **auteur**(s).
- On veut pouvoir obtenir, pour chaque client les emprunts qu’il a effectués (**nombre**, numéro et **titre du livre**, **date de l’emprunt**) au cours des trois derniers mois.
- Toutes les semaines, on édite la liste des emprunteurs en retard : **nom** et **adresse du client**, date de l’emprunt, numéro(s) et titre du (des) livre(s) concerné(s).
- On veut enfin pouvoir connaître pour chaque livre sa **date d’achat** et son **état**.

## Dictionnaire des données

| Mnémonique | Signification | Type | Longueur | Contraintes 
| --- | --- | --- | --- | --- |
| client_id | Identifiant du client | N | 11 | identifiant |
| client_nom | Nom du client | A | 60 | obligatoire |
| client_prenom | Prénom du client | A | 60 | obligatoire |
| client_caution | Caution versée par le client | N | 3 | obligatoire, maximum: 100€ |
| livre_id | Numéro du livre | N | 11 | identifiant |
| livre_titre | Titre du livre | AN | 255 | obligatoire |
| livre_etat | Etat du livre | ENUM |  | Obligatoire "neuf" "bon" "moyen" "mauvais" |
| livre_date_achat | Date d'achat | Date |  | Obligatoire, format 2025-09-03 |
| editeur_id | Identifiant de l'éditeur | N | 11 | identifiant |
| editeur_nom | Nom de l'éditeur | AN | 64 | Obligatoire |
| auteur_id | Identifiant de l'auteur | N | 11 | identifiant |
| auteur_nom | Nom de l'auteur | A | 60 | Obligatoire |
| auteur_prenom | Prénom de l'auteur | A | 60 |  |
| adresse_id | Identifiant de l'adresse | N | 11 | identifiant |
| adresse_numero | Numéro de voie de l'adresse | N | 5 |  |
| adresse_voie | Nom de la voie | AN | 64 | Obligatoire |
| adresse_code_postal | Code postal de la commune | AN | 5 | Obligatoire |
| adresse_commune | Nom de la commune | A | 50 | Obligatoire |
| adresse_pays | Pays de la commune | A | 50 | Obligatoire |
| emprunt_date | Date de l'emprunt | DateTime |  | Obligatoire, format 2025-09-03 11:50:33 |
| emprunt_date_retour | Date de retour de l'emprunt | DateTime |  | facultatif |
|  |  |  |  |  |


## Dépendances fonctionnelles simples

**client_id** --> client_nom, client_prenom, client_caution, #adresse_id

**livre_id** --> livre_titre, livre_etat, livre_date_achat

**editeur_id** --> editeur_nom

**auteur_id** --> auteur_nom, auteur_prenom

**adresse_id** --> adresse_numero, adresse_voie, adresse_code_postal, adresse_commune, adresse_pays


## Dépendances fonctionnelles composées

**client_id, livre_id** --> emprunt_date, emprunt_date_retour


## Règles de gestion 

1 client est logé à 1 seule adresse 

1 adresse loge 1 ou plusieurs clients

--- 

1 client emprunte 0 ou plusieurs livres 

1 livre est emprunté par 0 ou 1 client 

--- 

1 livre est édité par 1 seul éditeur 

1 éditeur édite 1 ou plusieurs livres 

--- 

1 livre est écrit par 1 ou plusieurs auteurs

1 auteur écrit 0 ou plusieurs livres 

