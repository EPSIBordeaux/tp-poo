FROM php:7.2-apache

RUN apt-get update && apt-get install -y \
        libpng-dev \
        git subversion mercurial bash patch \
        libzip-dev \
        zip 

RUN docker-php-ext-configure zip --with-libzip \
        && docker-php-ext-install zip \
        && docker-php-ext-enable zip

RUN docker-php-ext-install pcntl &&  docker-php-ext-enable pcntl
RUN docker-php-ext-install gd &&  docker-php-ext-enable gd

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ENV COMPOSER_VERSION 1.8.4

RUN curl --silent --fail --location --retry 3 --output /tmp/installer.php --url https://raw.githubusercontent.com/composer/getcomposer.org/cb19f2aa3aeaa2006c0cd69a7ef011eb31463067/web/installer \
 && php -r " \
    \$signature = '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5'; \
    \$hash = hash('sha384', file_get_contents('/tmp/installer.php')); \
    if (!hash_equals(\$signature, \$hash)) { \
        unlink('/tmp/installer.php'); \
        echo 'Integrity check failed, installer is either corrupt or worse.' . PHP_EOL; \
        exit(1); \
    }" \
 && php /tmp/installer.php --no-ansi --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION} \
 && composer --ansi --version --no-interaction \
&& rm -f /tmp/installer.php

WORKDIR /var/www/
COPY ./app /var/www
RUN composer install --no-ansi --no-dev --no-interaction --no-scripts --optimize-autoloader

