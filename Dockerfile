FROM php:8.1-apache

# PHP dependencies
RUN apt-get update && apt-get install -y && libzip-dev && zip \
    && docker-php-ext-install zip pdo pdo_mysql \
    && a2enmod rewrite

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Copy files to container
COPY . /var/html/www

# Composer dependancies + laravel key generating
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN cp .env.example .env && php artisan key:generate --no-interaction

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache conf to use the public folder
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN mkdir -p /var/html/www && mkdir -p /var/html/www/storage
RUN chown -R www-data:www-data /var/html/www && chmod -R 755 /var/html/www/storage

EXPOSE 80