FROM php:7.4.1-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
        zlib1g-dev \
        libxml2-dev \
    && docker-php-ext-install \
        zip
    && apt-get autoremove -y \
    && usermod -u 1000 www-data

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer