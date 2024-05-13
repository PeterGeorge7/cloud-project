FROM php:8.0.2-fpm

# Install required dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www