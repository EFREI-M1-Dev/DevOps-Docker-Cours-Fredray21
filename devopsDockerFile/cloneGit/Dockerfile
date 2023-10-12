# Utilisez l'image Ubuntu en tant qu'image de base
FROM ubuntu

# Mise à jour et installation de Nginx
RUN apt-get update && apt-get install -y git nginx

# Créez un répertoire temporaire pour le clonage
RUN mkdir -p /tmp/website

# Cloner le référentiel depuis GitHub dans le répertoire temporaire
RUN git clone https://github.com/daviddias/static-webpage-example.git /tmp/website

# Supprimer le contenu du répertoire par défaut de Nginx
RUN rm -rf /usr/share/nginx/html/*

# Copier les fichiers du répertoire temporaire dans le répertoire par défaut de Nginx
RUN cp -r /tmp/website/* /usr/share/nginx/html

# Créez le fichier de configuration Nginx personnalisé directement dans le Dockerfile
RUN echo 'server {' > /etc/nginx/sites-available/default
RUN echo '    listen 80 default_server;' >> /etc/nginx/sites-available/default
RUN echo '    server_name _;' >> /etc/nginx/sites-available/default
RUN echo '    root /usr/share/nginx/html;' >> /etc/nginx/sites-available/default
RUN echo '    location / {' >> /etc/nginx/sites-available/default
RUN echo '        try_files $uri $uri/ =404;' >> /etc/nginx/sites-available/default
RUN echo '    }' >> /etc/nginx/sites-available/default
RUN echo '}' >> /etc/nginx/sites-available/default

# Supprimer le répertoire temporaire
RUN rm -r /tmp/website

# Exposer le port 80 (HTTP)
EXPOSE 80

# Commande pour démarrer Nginx en mode détaché
CMD ["nginx", "-g", "daemon off;"]
