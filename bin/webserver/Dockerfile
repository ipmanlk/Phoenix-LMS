FROM php:7.3-apache

COPY ./cert/server.crt /etc/apache2/ssl/server.crt
COPY ./cert/server.key /etc/apache2/ssl/server.key

RUN apt-get update && apt-get upgrade -y && docker-php-ext-install mysqli && a2enmod rewrite && apt-get install -y zip libzip-dev && docker-php-ext-configure zip --with-libzip && docker-php-ext-install zip && apt-get install -y git zlib1g-dev && docker-php-ext-install pdo pdo_mysql zip && a2enmod ssl && service apache2 restart