## About

System purpose : test app in Lavel.

Tables to use :
COMPANIES [name]
POSITIONS [reference,title,description,email]

Task : 
build small app, use relations between given tables

## Autor

Jakub Wojna / kubasco@vp.pl

## Installation

1. This app not use Docker, You need to have Apache + MySQL (and create new database for project)
2. copy .env.example to .env - and set MySQL's data connection
3. composer install
4. php artisan migrate:fresh --seed

now You can login with defaults:
- login: **admin@example.com**
- password: **password**

## Development

- IDE Helper (how to use)

php artisan ide-helper:models App\Model


