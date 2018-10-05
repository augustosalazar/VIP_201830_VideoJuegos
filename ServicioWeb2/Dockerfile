FROM php:7.2.2-apache
COPY php/ /var/www/html
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN chown -R www-data:www-data /var/www/html/uploads
