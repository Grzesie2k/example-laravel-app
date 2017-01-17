# Example Laravel (and Vue) app
Example quiz application written in Laravel and Vue.

## Installation
1. Install dependencies with ``comoposer install`` and ``npm install``
2. Create ``.env`` file from ``.env.example``
3. Generate security key: ``php artisan key:generate``
4. Migrate database: ``php artisan migrate``
5. Migrate data: ``php artisan db:seed``
6. Prepare front-end: ``gulp --production``

## Demo
1. Servers: ``php -S localhost:8081 -t public`` and ``npm run demo``
2. Enter [localhost:8081](http://localhost:8080) and [localhost:8080](http://localhost:8080) in your browser

## Requirements
 - PHP >=5.6.4
 - Node ~6.9.4
 