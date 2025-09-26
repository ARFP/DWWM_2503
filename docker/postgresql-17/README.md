# DOCKER IMAGE PostgreSQL 17

> Dans les instructions de ce document, remplacer `mdevoldere` par votre nom d'utilisateur de votre compte Docker HUB.

## Générer l'image 

1. Ouvrir un terminal et se positionner dans le répertoire du Dockerfile
2. Saisir la commande : 
    - `docker build . mdevoldere/postgresql:17`

## Créer un conteneur

1. Dans un terminal, saisir la commande :
 - `docker run -d -p 4017:5432 --name mdevoldere-postgresql17 -v postgresql-data:/var/lib/postgresql/data mdevoldere/postgresql:17`

 Remplacez le port 4017 par celui de votre choix.

 ## Tester la connexion

Se connecter au serveur avec les identifiants renseignés dans le Dockerfile

Vous pouvez utiliser l'un des outils suivants : 

- MySQL Workbench
- HeidiSQL
- Un terminal ^^

## Sauvegarder l'image sur le HUB Docker

> Vous devez posséder un compte sur [hub.docker.com](https://hub.docker.com) 

- [Pousser une image sur Docker HUB](https://docs.docker.com/get-started/introduction/build-and-push-first-image/)
