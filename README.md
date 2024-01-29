# Crud CMS for articles - Test Lolapay

Ultra simple CRUD to handle articles

## Installation

Follow those steps :

```bash
git clone https://github.com/Astero-H/crud-article-test.git
cd crud-article-test
composer install
cp .env.example .env
php artisan key:generate

```

- Create a database for the project
- Open the '.env' et modify the 'DB_' options to fit with your database configuration.


Execute the migrations :
```bash
php artisan migrate

```

Fill database with test data :
```bash
php artisan db:seed
```

Run the server : 
```bash
php artisan serve

```

