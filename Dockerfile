FROM php:8.1-apache

# Install system dependencies and PHP
RUN apt-get update && apt-get install -y libzip-dev zip libpng-dev libonig-dev default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Copy project files into the container
COPY . /var/www/html

# Install PHP dependencies with Composer
RUN composer install --no-interaction --working-dir=/var/www/html

# Define the work directory
WORKDIR /var/www/html

# Copy and exec init script and modify permissions 
COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache configuration to use the public folder
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Modify permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html/storage

EXPOSE 80

# Exec the init script when the container starts
CMD ["/usr/local/bin/init.sh"]