# RentalCheck-laravel
The laravel project for rentalCheck

## Installation

1. copy ".env.example" to ".env"
2. update database name, username, password for database in .env
3. create database with the database name in ".env"
4. run following commands:
- `composer install`
- `php artisan key:gen`
- `php artisan migrate:refresh --seed`
- `php artisan storage:link`
- `php artisan serve`


## Update Guide (2021-1-6)
- update the repository ( if you are using git, just run `git pull` )
- update ".env" file with ".env.example"
- `composer update`
- `composer dump-autoload`
- `php artisan migrate:refresh --seed`
- `php artisan config:cache`
- `php artisan serve`
