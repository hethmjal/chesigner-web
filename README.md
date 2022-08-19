How to install project and run.

1-run this command "git clone https://github.com/hethmjal/chesigner-web.git"

2- on terminal (cmd) go to project folder and run "composer update".

3- then rename (.env.example) to (.env).

4- then run this command "php artisan key:generate".

5- create database on phpMyAdmin and add information to .env file to this key (DB_DATABASE=nameOfDataBase , DB_USERNAME=root , DB_PASSWORD= ).

6- run this command to create database tables "php artisan migrate" .

7- to run project run this command " php artisan serve" . and on your browser go to "localhost:8000".
