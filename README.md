<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About project

This project for read dinamic excel and import it into database, and than display it to frontend.

## Using
1. git clone https://github.com/galeant/dinamic_excel_reader.git
2. composer install
3. update .env to your DB
4. run command php artisan migrate

## Testing

1. Use file excel in >/public/excel for testing
2. Using route /bebek for upload excel
3. Update web.php for and update data id for testing (id of document in document table)
   
**NOTES**
1. If you use other excel, update exceldoc.php in /config and addjust as your excel
   

