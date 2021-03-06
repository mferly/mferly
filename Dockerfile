FROM php:7.4.1-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        apt-transport-https \
        libmcrypt-dev \
        zlib1g-dev \
        libicu-dev \
        libonig-dev \
        libzip-dev \
        gnupg2 \
    && docker-php-ext-install \
        intl \
        opcache \
        pcntl \
        iconv \
        zip \
        bcmath \
        posix \
    && docker-php-ext-enable \
        intl \
        opcache \
        pcntl \
        iconv \
        zip \
        bcmath \
        posix \
    && apt-get autoremove -y \
    && usermod -u 1000 www-data

RUN curl -sL https://deb.nodesource.com/setup_11.x | bash - \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y --no-install-recommends nodejs yarn \
    && apt-get autoremove -y

COPY . /var/www/app
RUN sh /var/www/app/bin/build.sh