FROM php:7.3-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
RUN apt-get install -y zip libzip-dev && docker-php-ext-configure zip --with-libzip && docker-php-ext-install zip
RUN apt-get install -y git zlib1g-dev && docker-php-ext-install pdo pdo_mysql zip
RUN service apache2 restart
EXPOSE 88
