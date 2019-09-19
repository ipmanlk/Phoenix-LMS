FROM php:7.3-apache

RUN apt-get update && apt-get upgrade -y && docker-php-ext-install mysqli && a2enmod rewrite && apt-get install -y zip libzip-dev && docker-php-ext-configure zip --with-libzip && docker-php-ext-install zip && apt-get install -y git zlib1g-dev && docker-php-ext-install pdo pdo_mysql zip && service apache2 restart

EXPOSE 88
