## Installation

Clone this repo

```javascript
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

Run the server

```php
php artisan serve
```

Happy Coding!
