## Installation
run the command
```bash
git clone https://github.com/vadykoo/test-football.git
composer install
```
create .env file and database 
fill in correctly APP_URL in .env file, it is important for displaying images
and run the commands

```bash
php artisan key:generate
php artisan migrate -seed
php artisan storage:link
php artisan serve
```

Open the site and login with

```bash
Login: super@admin.com
Password: secret
```
or
```bash
Login: club@admin.com
Password: secret
```