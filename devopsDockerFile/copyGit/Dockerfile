# utilisation de l'image nginx
FROM nginx 


# Copiez les fichiers dans nginx
COPY ./static-website-example /usr/share/nginx/html

# Exposition du port 80 (HTTP)
EXPOSE 80

# Commande pour démarrer NGINX
CMD ["nginx", "-g", "daemon off;"]

