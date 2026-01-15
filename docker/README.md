# Dockerfile & Docker Compose

## Créer une image avec un Dockerfile

1. Création d'un script Dockerfile
2. Génération de l'image docker à partir du fichier dockerfile
3. Création de conteneurs à partir de notre image nouvellement créée.

### Créer et alimenter le Dockerfile

1. Créer un répertoire
2. Dans ce répertoire, créer un fichier `Dockerfile` (respecter la casse)
3. Ajouter les instructions nécessaires au Dockerfile (FROM, ENV, RUN etc...)

### Générer l'image à partir du Dockerfile

1. Ouvrir un terminal
2. Naviguer jusqu'au répertoire où se situe le Dockerfile
3. Saisir la commande :
    - `docker build . -t nom-de-l-image`
    - le point `.` signifie "répertoire courant"
    - l'option `-t` permet de nommer votre image 
4. Docker va générer l'image à partir du Dockerfile du répertoire courant

### En cas de modification des instructions dans le Dockerfile

1. Appliquez vos modifications dans le fichier
2. Générer à nouveau l'image avec `docker build`


### Créer des conteneurs à partir de l'image créée

Appliquer le même principe que pour la création de conteneurs à partir d'images du Docker Hub.