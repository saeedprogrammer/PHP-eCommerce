FROM php:8.1.4-cli
WORKDIR /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql 
RUN apt-get update && apt-get upgrade -y 
ENTRYPOINT [ "php" , "-S" , "0.0.0.0:80" ]



EXPOSE 80

