FROM php:7.4-fpm

## Install system packages for PHP extensions recommended for Yii 2.0 Framework
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libcurl4-openssl-dev \
        libssl-dev \
        zlib1g-dev \
        curl \
        git \
        unzip \
        netcat \
        libxml2-dev \
        libpq-dev \
        libzip-dev \
        libpng-dev \
        libonig-dev \
    && docker-php-ext-install \
        soap \
        zip \
        bcmath \
        exif \
        gd \
        iconv \
        intl \
        sockets \
        mbstring \
        opcache \
        pdo_mysql

# Environment settings
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    PHP_USER_ID=33 \
    PATH=/app:/app/vendor/bin:/root/.composer/vendor/bin:$PATH \
    TERM=linux

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
CMD composer install ; php-fpm

EXPOSE 9000