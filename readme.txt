composer require ninja/manager
php artisan storage:link

composer update
composer dump-autoload

php artisan vendor:publish --provider="Ninja\Manager\ManagerServiceProvider"
