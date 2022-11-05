
# Laravel Thai Address
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/) [![Latest Stable Version](http://poser.pugx.org/topkstt/laravel-thai-address/v)](https://packagist.org/packages/topkstt/laravel-thai-address) [![PHP Version Require](http://poser.pugx.org/topkstt/laravel-thai-address/require/php)](https://packagist.org/packages/topkstt/laravel-thai-address) [![Monthly Downloads](http://poser.pugx.org/topkstt/laravel-thai-address/d/monthly)](https://packagist.org/packages/topkstt/laravel-thai-address)

Provide Thailand geographic database like provinces, districts, sub-districts and generate api route for you application.

## Features

- Thailand provinces, district, sub district and postal codes database.
- REST API Routes.
- Support UUID.

## Roadmap

- Add English Name
- Add Latitude & Longitude Information
- Add Address Extractor


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
php artisan vendor:publish --provider="TopKSTT\ThaiAddress\ThaiAddressServiceProvider" --tag="seeders"
php artisan db:seed --class=ThaiAddressTablesSeeder
```

## API Reference

- Please enabled API config in thai_address.php config file before call API endpoint.
- Please set prefix API route in thai_address.php config file before call API endpoint.
- Postman Collection -> [Click here](https://documenter.getpostman.com/view/5193220/2s8YYFsj5M)

### Province

#### Get all province

```http
  GET /api/{YOUR_PREFIX_IF_SET}/province/all
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_all` | `boolean` | **Optional**. Include postal_code, sub_district, district to result. |

#### Get province by ID

```http
  GET /api/{YOUR_PREFIX_IF_SET}/province/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_all` | `boolean` | **Optional**. Include postal_code, sub_district, district to result. |


#### Search province by name

```http
  GET /api/{YOUR_PREFIX_IF_SET}/province/search/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_all` | `boolean` | **Optional**. Include postal_code, sub_district, district to result. |

### District

#### Get all district

```http
  GET /api/{YOUR_PREFIX_IF_SET}/district/all
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_province` | `boolean` | **Optional**. Include province to result. |
| `with_sub_district` | `boolean` | **Optional**. Include sub district to result. |

#### Get district by ID

```http
  GET /api/{YOUR_PREFIX_IF_SET}/district/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_province` | `boolean` | **Optional**. Include province to result. |
| `with_sub_district` | `boolean` | **Optional**. Include sub district to result. |


#### Search district by name

```http
  GET /api/{YOUR_PREFIX_IF_SET}/district/search/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_province` | `boolean` | **Optional**. Include province to result. |
| `with_sub_district` | `boolean` | **Optional**. Include sub district to result. |


### Sub District

#### Get all sub district

```http
  GET /api/{YOUR_PREFIX_IF_SET}/sub-district/all
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_district` | `boolean` | **Optional**. Include district to result. |
| `with_postal_code` | `boolean` | **Optional**. Include postal code to result. |

#### Get sub district by ID

```http
  GET /api/{YOUR_PREFIX_IF_SET}/sub-district/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_district` | `boolean` | **Optional**. Include district to result. |
| `with_postal_code` | `boolean` | **Optional**. Include postal code to result. |


#### Search sub district by name

```http
  GET /api/{YOUR_PREFIX_IF_SET}/sub-district/search/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_district` | `boolean` | **Optional**. Include district to result. |
| `with_postal_code` | `boolean` | **Optional**. Include postal code to result. |


### Postal Code

#### Get all postal code

```http
  GET /api/{YOUR_PREFIX_IF_SET}/postal-code/all
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_district` | `boolean` | **Optional**. Include district to result. |
| `with_sub_district` | `boolean` | **Optional**. Include sub district to result. |
| `with_province` | `boolean` | **Optional**. Include province to result. |

#### Get postal code by ID

```http
  GET /api/{YOUR_PREFIX_IF_SET}/postal-code/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_district` | `boolean` | **Optional**. Include district to result. |
| `with_sub_district` | `boolean` | **Optional**. Include sub district to result. |
| `with_province` | `boolean` | **Optional**. Include province to result. |


#### Search postal code by name

```http
  GET /api/{YOUR_PREFIX_IF_SET}/postal-code/search/${id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `with_district` | `boolean` | **Optional**. Include district to result. |
| `with_sub_district` | `boolean` | **Optional**. Include sub district to result. |
| `with_province` | `boolean` | **Optional**. Include province to result. |