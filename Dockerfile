FROM php:7.2-apache

RUN apt-get update && apt-get install -y \
        libpng-dev \
        git subversion mercurial bash patch \
        libzip-dev \
        zip 

RUN docker-php-ext-configure zip --with-libzip

RUN docker-php-ext-install pcntl gd zip \
	&& docker-php-ext-enable pcntl gd zip

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ENV COMPOSER_VERSION 1.7.3

COPY --from=composer:1.7.3 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/
COPY ./app /var/www

