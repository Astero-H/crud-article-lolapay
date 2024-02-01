# Crud CMS for articles - Test Lolapay

Ultra simple CRUD to handle articles

## Prerequisites

* Git
* Composer
* Docker (for Docker installation)
* PHP >= 7.3 (for non-Docker installation)

## Installation

* Clone the repository

```bash
git clone https://github.com/Astero-H/crud-article-test.git
cd crud-article-test
```

## Database Configuration

### With Docker:

* Modify the .env.example file to match your database configuration.

* Start Docker containers

```bash
docker-compose up --build
```


### Without Docker:

1. Install Dependencies

```bash
composer install
```

2. Create a database for the project


3. Create .env file and modify it

```bash
 cp .env.example .env
```

4. Generate the application key

```bash
php artisan key:generate
```


5. Run migrations:

```bash
php artisan migrate
```

6. Fill the database with fake data (optional):

```bash
php artisan db:seed
```

7. Start the server:
```bash
php artisan serve
```

## Project Access:

* The project should now be accessible at http://localhost:8000 for a non-Docker installation, or at the configured address in your docker-compose.yml for a Docker installation.

