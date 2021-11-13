# Subscription Platform

## Setting up

After cloning the project from github, run the following commands on your 
terminal in the order below. Please ensure you are in the project directory.

- `composer install`
- `cp .env.example .env`
- `php arisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`

## Postman collection

The link to the Postman collection for this project can be found below;

[https://documenter.getpostman.com/view/2811984/UVC8DRhS](https://documenter.getpostman.com/view/2811984/UVC8DRhS)

## To send mail using artisan command

```
php artisan emails:send
```