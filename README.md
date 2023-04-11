# Laravel - CRUD

This project for learning purpose. We have created moduls for this project, you can access it for free on the link below:
https://bariskoding.com/modul/laravel-beautiful-magical-framework

## Installation

Clone this repo

```php
git clone https://github.com/junaidiar19/bk-laravel-crud.git
```

Update Composer

```php
composer update
```

Copy .env

```php
cp .env.example .env
```

Setup Database

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_laravel_crud
DB_USERNAME=root
DB_PASSWORD=
```

Generating App Key

```php
php artisan key:generate
```

Symbolic Link of Storage

```php
php artisan storage:link
```

Create folder books

```php
cd public\storage\

mkdir books
```

Run the server

```php
php artisan serve
```

Happy Coding!
