FROM php:7.4-apache
RUN docker-php-ext-install mysqli
RUN pecl install xdebug-2.9.0
RUN docker-php-ext-enable xdebug
RUN a2enmod rewrite
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini