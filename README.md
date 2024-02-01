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
git clone https://github.com/Astero-H/crud-article-lolapay.git
cd crud-article-lolapay
```

* Create .env file and adapt it

```bash
 cp .env.example .env
```

* Install Dependencies

```bash
composer install
```

* Generate key application

```bash
php artisan key:generate
```

## Database Configuration

### With Docker:

* Start Docker containers

```bash
docker-compose up --build
```


### Without Docker:

1. Create a database for the project

2. Run migrations:

```bash
php artisan migrate
```

3. Fill the database with fake data (optional):

```bash
php artisan db:seed
```

4. Start the server:
```bash
php artisan serve
```

## Project Access:

* The project should now be accessible at http://localhost:8000 for a non-Docker installation, or at the configured address in your docker-compose.yml for a Docker installation.

