<h3 align="center">The project of the information system «Riverstart»</h3>

<p align="center">
    <a href="https://laravel.com"><img alt="Laravel v8.x" src="https://img.shields.io/badge/Laravel-v8.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://php.net"><img alt="PHP 7.4" src="https://img.shields.io/badge/PHP-7.4-777BB4?style=for-the-badge&logo=php"></a>
</p>


## Инструкции

composer install

php artisan migrate

php artisan db:seed --class=CategorySeeder

php artisan db:seed --class=ProductsSeeder

php artisan serve

## Список адресов с методами

    List: метод:GET, /api/v1/categories
    Create: метод:POST,/api/v1/categories
    Show: метод:GET, /api/v1/categories/{id}
    Update: метод:PUT, /api/v1/categories/{id}
    Delete: метод:DELETE, /api/v1/categories/{id}

    List: метод:GET, /api/v1/products
    Create: метод:POST, /api/v1/products
    Show: метод:GET, /api/v1/products/{id}
    Update: метод:PUT, /api/v1/products/{id}
    Delete: метод:DELETE, /api/v1/products/{id}

    Search: метод:POST, /api/v1/search/

Так как в задачу не входила аутентификация она не была реализована и api доступно неавторизированому пользователю.

Так же валидацию вынести в отдельный Request.

