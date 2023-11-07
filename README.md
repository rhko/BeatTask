<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## GETTING STARTED

<p dir="auto">
    First install composer and nodejs and npm and git

    Note: prefered versions php >= 8.1 & Laravel >= 10.10
</p>
<p dir="auto">
    You can then install the application using the following command:
</p>

- Clone the project
    <code>
        git clone https://github.com/rhko/BeatTask.git
    </code>

- Go into project directory
    <code>
        cd BeatTask
    </code>

- Install all dependencies using composer
    <code>
        composer install
    </code>

- Copy the example env file and change variables
    <code>
    cp .env.example .env
    </code>
    change variables for database connection in .env file

- Run migrations
    <code>
        php artisan migrate
    </code>

- Generate a new application key
    <code>
        php artisan key:generate
    </code>

- Create Link for storage in public folder
    <code>
        php artisan storage:link
    </code>

- Install packages and run npm
    <code>
        npm install && npm run dev
    </code>

- Run the local development server
    <code>
        php artisan serve
    </code>

- Register new user as seller and you will be able to add products
