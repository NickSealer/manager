composer require ninja/manager
php artisan storage:link
composer update
composer dump-autoload

delete user migration by default
run command:
php artisan migrate

php artisan vendor:publish --provider="Ninja\Manager\ManagerServiceProvider"
