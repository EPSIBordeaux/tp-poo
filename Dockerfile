FROM php:7.2-apache

RUN apt-get update && apt-get install -y \
        libpng-dev \
        git subversion mercurial bash patch \
        libzip-dev zip

RUN docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-install pcntl gd zip && \
	docker-php-ext-enable pcntl gd zip

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./app /var/www
WORKDIR /var/www/