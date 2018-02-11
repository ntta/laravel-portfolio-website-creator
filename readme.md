## Create your own portfolio

### Table of Contents

1. [Requirements](#requirments)
2. [Installation](#installation)
3. [Running in local environment](#runningindevelopmentenvironment)

<a name="requirements"></a>
### Requirements (for local development)

- PHP 7.0.0 or Higher
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [phpmyadmin](https://www.phpmyadmin.net/)

<a name="installation"></a>
### Installation
- Clone the repo

        git clone https://github.com/ntta/laravel-portfolio-website-creator.git laravel-portfolio-website-creator

- Navigate to the project folder

        cd laravel-portfolio-website-creator

- Create .env file from the .env.example file

        cp .env.example .env
  
  On Windows:
  
        copy .env.example .env

- Run composer install to import the dependencies and enable auto-loading

        composer install

- Generate Laravel Application key

        php artisan key:generate

- Edit database source in .env file (default below):
		
		APP_URL=http://localhost
		
		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=project
		DB_USERNAME=root
		DB_PASSWORD=

- Run Laravel database migrations

        php artisan migrate

<a name="runningindevelopmentenvironment"></a>
### Running in local environment

- Navigate to [http://localhost/laravel-portfolio-website-creator/public](http://localhost/laravel-portfolio-website-creator/public)