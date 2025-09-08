# Gestion d'utilisateurs

## La base de données

Un utilisateur est caractérisé par un *nom*, *prénom*, une *adresse email*.

Pour s'identifier, l'utilisateur doit connaître son mot de passe.

Un utilisateur enregistré est associé à un rôle parmi la liste suivante : **Usager**, **Encadrant**, **Administrateur**.

Un utilisateur non identifié est considéré comme un **invité**.


## Travail à réaliser 

- Créer le dictionnaire des données
- Établir le Modèle Conceptuel des Données
- Établir le Modèle Logique des Données 
- Implémenter le script SQL de création de la base de données


|Mnémonique | Signification | Type | Longueur | Contraintes |
| --- | --- | --- | --- | --- |
| **utilisateur_id** | Identifiant | N | 11 | Identifiant, A.I |
| **utilisateur_nom** | Nom  de l'utilisateur | A | 60 | Obligatoire |
| **utilisateur_prenom** | Prénom de l'utilisateur | A | 60 | Obligatoire |
| **utilisateur_email** | Adresse électronique de l'utilisateur | AN | 320 | Obligatoire |
| **utilisateur_pass** | Mot de passe de l'utilisateur | * | 64 | Obligatoire, chiffré avec ARGON_2ID |
| **role_id** | Identifiant du rôle | N | 11 | Identifiant, A.I |
| **role_nom** | Nom du rôle | A | 20 | Obligatoire |

