#!/bin/bash

echo "Waiting for database..."
while ! mysqladmin ping -h"$DB_HOST" --silent; do
    echo "Waiting for database at the adress : $DB_HOST..."
    sleep 1
done


# Exec migrations and seeding
php artisan migrate --no-interaction
php artisan db:seed --no-interaction

# Starting Apache
exec apache2-foreground