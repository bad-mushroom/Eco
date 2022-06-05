FROM php:8.0-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libfreetype6-dev \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

EXPOSE 9000
