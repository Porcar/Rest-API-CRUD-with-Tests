#Laravel Rest API CRUD with tests.

## Made with....

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>



## Instructions:

- Clone the repository.
- Go to the repository directory and do the following console commands:
- $composer install
- $php artisan key:generate
- $cp .env.example .env
- Edit .env file according to your database: DB_DATABASE=XXXX
- create a DB named: "XXXX"
- create another DB named: "testing_DB"
- php artisan migrate
- //If you want to create 100 dummy data do the following:
- php artisan db:seed 
- All the REST API calls are to: \apartment and \category
- Have fun.

## Important changes:

- Changed the DB names for dates to fit with laravel timestamps.
- Changed de DB time from datetime to timestamp, because if we are serving customers in different countries with different application instances, by using TIMESTAMP, you’ll be able to serve the same date and time data in different timezones, directly from the database.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
