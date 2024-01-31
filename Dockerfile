FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

COPY . /var/html/www

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Mettre à jour la configuration de Apache pour utiliser le dossier public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN mkdir -p /var/html/www && mkdir -p /var/html/www/storage
RUN chown -R www-data:www-data /var/html/www && chmod -R 755 /var/html/www/storage

EXPOSE 80