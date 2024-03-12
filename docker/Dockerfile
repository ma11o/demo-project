FROM php:8.0-apache

RUN apt update && apt install -y zlib1g-dev g++ libicu-dev zip libzip-dev zip libpq-dev \
    && docker-php-ext-install intl opcache pdo pgsql pdo_pgsql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && apt-get install -y git \
    && a2enmod rewrite

# Add apache user
ENV APACHE_RUN_USER apache
ENV APACHE_RUN_GROUP apache

RUN groupadd -g 1000 ${APACHE_RUN_USER}
RUN useradd -u 1000 -ms /bin/bash -g ${APACHE_RUN_USER} ${APACHE_RUN_GROUP}

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
