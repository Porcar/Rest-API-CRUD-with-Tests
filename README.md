## Laravel Rest API CRUD with tests.

## Made with....PHP: 7.4 and Laravel 8.4

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
    - composer install 
    - php artisan key:generate
    - cp .env.example .env
- Edit .env file according to your database: DB_DATABASE=XXXX
- create a Database with the same name used in the previous step.
- create another Database named: "testing_DB"
- php artisan migrate
- If you want to create 100 dummy data do the following:
    - php artisan db:seed 
- All the REST API calls are to: \apartment and \category
- Have fun.

## Important changes:

- Changed the DB names for dates to fit with laravel timestamps.
- Changed de DB time from datetime to timestamp, because if we are serving customers in different countries with different application instances, by using TIMESTAMP, you’ll be able to serve the same date and time data in different timezones, directly from the database.


## Docker:

We will be using Laravel's Sail 

- Make sure you are running docker with WLS2
- First launch Terminal. Then clone a repository:
 - $git clone https://github.com/Porcar/Rest-API-CRUD-with-Tests.git
- Then run the following Docker command:

    docker run --rm \
        -v $(pwd):/opt \
        -w /opt \
        laravelsail/php80-composer:latest \
        composer install
    
- This command uses a small Docker container containing PHP and Composer to install the application’s dependencies. After that you can run the following command to copy the .env file, generate an application key, run the database migrations and all the others explained at the begining of the file.

> cp .example.env .env

> ./vendor/bin/sail php artisan key:generate

> ./vendor/bin/sail php artisan migrate

If you need further instructions:
Docker part credit goes to: https://www.larapeak.com/blog/create-a-project-in-laravel-8x-with-laravel-sail-docker

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
