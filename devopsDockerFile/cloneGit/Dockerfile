# Utilisez l'image Ubuntu en tant qu'image de base
FROM ubuntu

# Mise à jour et installation de Nginx
RUN apt-get update && apt-get install -y git nginx

# Supprimer le contenu du répertoire par défaut de Nginx
RUN rm -rf /var/www/html/*

# Cloner le référentiel depuis GitHub dans le répertoire temporaire
RUN git clone https://github.com/daviddias/static-webpage-example.git /tmp/website

# Copier le contenu du dossier src/ dans le répertoire par défaut de Nginx
RUN cp -r /tmp/website/src/* /var/www/html/

# Supprimer le répertoire temporaire
RUN rm -rf /tmp/website

# Exposer le port 80 (HTTP)
EXPOSE 80

# Commande pour démarrer Nginx en mode détaché
CMD ["nginx", "-g", "daemon off;"]
