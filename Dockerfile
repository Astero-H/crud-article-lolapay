FROM php:8.1-apache

# PHP dependencies
RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

# Copy files to container
COPY . /var/www/html

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache conf to use the public folder
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

RUN mkdir -p /var/www/html && mkdir -p /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html/storage

EXPOSE 80