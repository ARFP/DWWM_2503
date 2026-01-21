# Créer un projet Symfony et l'exécuter dans DOCKER

## Préparation

1. Sur votre machine, créer un répertoire vide
2. Dans ce répertoire, copier les fichiers suivants :
    - [docker-compose.yml](./docker-compose.yml)
    - [Dockerfile](./Dockerfile)
    - [conf/000-default.conf](./conf/000-default.conf)
    - Vous devriez avoir la structure suivante : 
        - VotreRepertoire/
            - conf/
                - 000-default.conf
            - docker-compose.yml
            - Dockerfile
3. Se positionner dans votre répertoire
4. Exécuter la commande "docker compose up"

## Le container est créé et lancé : 

1. Accéder au terminal du container
2. Se positionner sur le chemin '/var/www/html'
3. Lancer l'installation de Symfony
    - `composer create-project symfony/skeleton:"8.0.*" .`
    - (Pensez à bien mettre le . à la fin de la commande (. = répertoire courant))

## L'installation de Symfony est terminée : 

- Accéder à l'url http://127.0.0.1:8000
- Vous devriez voir la page par défaut de Symfony.

