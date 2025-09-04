# Exercice Plages

[Lien vers l'exercice](https://arfp.github.io/tp/databases/analyse/01-plages)

## Travail à réaliser

Réalisez le dictionnaire des données correspondant à la description ci-dessous.

## Expression du besoin

Une région voyant son activité touristique grandir, souhaite mettre en place une structure permettant de suivre l’état de ses plages.

Dans un premier temps, elle souhaite connaître toutes ses plages :

- Chaque plage appartient à une **ville**
- Pour une **plage**, on connaîtra :
- **Sa longueur en km**
- La **nature du terrain** : sable fin, rochers, galets, … sachant qu’il peut y avoir des plages avec sable et rochers

Le suivi se fera par **département** (uniquement les départements de la région) :

Un responsable région sera nommé : on en connaitra son **nom** et son **prénom**.

Une ville est identifiée par son **code postal** et le **nombre de touristes annuel** qu’elle reçoit doit être connu.

## Dictionnaire des données

| Mnémonique | Signification | Type | Longueur | Contraintes 
| --- | --- | --- | --- | --- |
| code_departement | code postal du département | AN | 3 | identifiant |
| nom_departement | nom du département | A | 60 | Obligatoire, unique |
| id_responsable | identifiant du responsable | N | 11 | identifiant |
| nom_responsable | nom du responsable | A | 60 | Obligatoire |
| prenom_responsable | prénom du responsable | A | 60 | Obligatoire  |
| code_commune | Code INSEE de la commune | AN | 5 | identifiant |
| nom_commune | Nom de la commune | A | 50 | Obligatoire |
| code_postal | Code postal de la commune | AN | 5 | Obligatoire |
| nb_touristes_annuel | Nombre de touristes annuels | N | 11 | Obligatoire, strictement positif |
| nom_plage | Nom de la plage | AN | 60 | Obligatoire, unique  |
| longueur_plage | Longueur de la plage en Kms | N | 4,3 | Obligatoire |
| nature_terrain | Nature du terrain | A | 30 | Obligatoire, unique |
|  |  |  |  |  |