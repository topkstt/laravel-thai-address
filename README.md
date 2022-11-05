
# Laravel Thai Address

Provide Thailand geographic database like provinces, districts, sub-districts and generate api route for you application.


## Features

- Thailand provinces, district, sub district and postal codes database.
- REST API Routes.
- Support UUID.



## Requirement

- PHP 7.1 - 8.1
- Laravel 7.0 - 9.0
## Installation

Install Laravel Thai Address with Composer

```bash
  composer require topkstt/laravel-thai-address
```

Publishing package config file

```bash
  php artisan vendor:publish --provider="Baraear\ThaiAddress\ThaiAddressServiceProvider" --tag="config"
```

Publishing package migration file & migrate database

```bash
   php artisan vendor:publish --provider="TopKSTT\ThaiAddress\ThaiAddressServiceProvider" --tag="migrations"
   php artisan migrate
```

Publishing package migration seeder & seed database
```bash
   php artisan vendor:publish --provider="TopKSTT\ThaiAddress\ThaiAddressServiceProvider" --tag="seeds"
   php artisan db:seed --class=ThaiAddressTablesSeeder
```
