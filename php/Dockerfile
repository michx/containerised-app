FROM php:8.2-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
COPY php.ini $PHP_INI_DIR/php.ini-production
EXPOSE 80
