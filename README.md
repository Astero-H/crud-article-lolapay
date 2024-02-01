# Crud CMS for articles - Test Lolapay

Ultra simple CRUD to handle articles

## Prerequisites

* Git
* Composer
* Docker (for Docker installation)
* PHP >= 7.3 (for non-Docker installation)

## Installation

1. Clone the repository

```bash
git clone https://github.com/Astero-H/crud-article-test.git
cd crud-article-test
```

2. Install Dependencies

```bash
composer install
```

## Database Configuration


### With Docker:

* Modify the .env.example file to match your database configuration.

* Start Docker containers

```bash
docker-compose up --build
```


### Without Docker:

* Create a database for the project.

* Open the .env file and modify the DB_ options to match your database configuration.

* Generate the application key:

```bash
php artisan key:generate
```

* Run migrations:

```bash
php artisan migrate
```

* Fill the database with fake data (optional):

```bash
php artisan db:seed
```

* Start the server:
```bash
php artisan serve
```

## Project Access:

* The project should now be accessible at http://localhost:8000 for a non-Docker installation, or at the configured address in your docker-compose.yml for a Docker installation.

