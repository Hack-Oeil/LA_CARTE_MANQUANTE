# Utiliser une image de base avec Apache et PHP pré-installés
FROM php:8.2-apache

# Installer Python et Node.js
RUN apt-get update && apt-get install -y python3 nodejs npm

# Installer vm2
RUN npm i vm2

# Copier les fichiers de l'application dans le conteneur
COPY ./www/ /var/www/html/

RUN chmod -R 777 /var/www/html/tests

# Exposer le port 80 pour les requêtes HTTP
EXPOSE 80
