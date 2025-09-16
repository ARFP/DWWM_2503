# Image de base
FROM mariadb:11 

# Mot de passe ROOT du serveur de base de données
ENV MARIADB_ROOT_PASSWORD=azer
# Nom de la base de données qui sera créée au 1er démarrage du conteneur
ENV MARIADB_DATABASE=mydatabase
# Nom d'utilisateur pour se connecter à la base de données
ENV MARIADB_USER=mike
# Mot de passe pour se connecter à la base de données
ENV MARIADB_PASSWORD=1234

# Mets à jour la liste des logiciels du conteneur
RUN apt-get update  

# Installer la couche SSH (pour sécuriser les connexions et permettre de se connecter au terminal à distance)
RUN apt-get install -y --fix-missing openssh-server openssh-client


