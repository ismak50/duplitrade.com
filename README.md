<p align="center"><a href="https://www.duplitrade.com/" target="_blank"><img src="https://www.duplitrade.com/img/logo.png" width="400"></a></p>



## About this Assignement

Based on Laravel v8.0

## Requirements


- php 7.3 or higher.
- Mysql 5.7 or higher.

## Installation
Copy the zip in directory of your choice
run those command in the shell:
```
cd <yourdirectory>
mysql -uroot -p<your msql pwd>
create database <nameofyourchoice>;
exit
cp .env.example .env
```
set the credentials in the .env file.

run those commands in the shell
```
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
