# DOCKER IMAGE MySQL 5.7


## Générer l'image 

1. Ouvrir un terminal et se positionner dans le répertoire du Dockerfile
2. Saisir la commande : 
    - `docker build . mdevoldere/mysql:5.7`

## Créer un conteneur

1. Dans un terinal, saisir la commande :
 - `docker run -d -p 4057:3306 --name mdevoldere-mysql57 -v mysql57-data:/var/lib/mysql mdevoldere/mysql:5.7`

 ## Tester la connexion

Se connecter au serveur avec les identifiants renseignés dans le Dockerfile

Vous pouvez utiliser l'un des outils suivants : 

- MySQL Workbench
- HeidiSQL
- Un terminal ^^

## Sauvegarder l'image sur le HUB Docker

> Vous devez posséder un compte sur [hub.docker.com](https://hub.docker.com) 
