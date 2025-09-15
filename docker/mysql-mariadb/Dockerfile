# On utilise l'image de mariadb comme base
FROM mariadb:11

# variables d'environnement
ENV MYSQL_ROOT_PASSWORD=azer 
ENV MYSQL_DATABASE=mydatabase 
ENV MYSQL_USER=mike
ENV MYSQL_PASSWORD=1234

# variables d'environnement
# ENV MARIADB_ROOT_PASSWORD=azer 
# ENV MARIADB_DATABASE=mydatabase 
# ENV MARIADB_USER=mike
# ENV MARIADB_PASSWORD=1234

# CMD apt-get install -y --fix-missing openssh-client openssh-server
# Met à jour la liste des paquets disponibles
RUN apt-get update
# Installe les paquets openssh-client et openssh-server
RUN apt-get install -y --fix-missing openssh-client openssh-server

