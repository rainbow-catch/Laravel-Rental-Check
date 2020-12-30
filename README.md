# RentalCheck-laravel
The laravel project for rentalCheck

## Installation

1. copy .env.example to .env
2. update database name, username, password for database in .env
3. create database with the databasename in .env
4. run following commands:
- composer install
- php artisan key:gen
- php artisan migrate --seed
- php artisan storage:link
- php artisan config:cache
- php artisan serve


## Update Guide
- update the repository ( if you are using git, just git pull )
- composer update
- php artisan migrate:refresh --seed
- php artisan storage:link
- php artisan config:cache
- php artisan serve
