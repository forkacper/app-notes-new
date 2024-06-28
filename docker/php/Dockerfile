FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

## Install extensions
RUN docker-php-ext-install pdo pdo_mysql

## Add composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Zainstaluj potrzebne narzędzia i biblioteki
RUN apk --no-cache add \
    autoconf \
    build-base \
    linux-headers \
    libressl-dev \
    libffi-dev \
    git \
    curl

# Pobierz i zainstaluj Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Skonfiguruj Xdebug (przykładowa konfiguracja)
RUN echo "zend_extension=$(php-config --extension-dir)/xdebug.so" > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug,trace" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=docker" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Usuń zbędne pliki aby zmniejszyć rozmiar obrazu
RUN apk del autoconf build-base

# Komenda uruchamiająca php-fpm
CMD ["php-fpm"]