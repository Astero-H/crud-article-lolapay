#!/bin/bash

if [ ! -f ".env"] ; then
    cp .env.example .env
fi

php artisan key:generate --no-interaction

php artisan migrate --no-interaction

php artisan db:seed --no-interaction