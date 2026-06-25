FROM wordpress:php8.2-apache

# Installa Xdebug per il debug da VS Code
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
