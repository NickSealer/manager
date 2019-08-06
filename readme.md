## Admin
Add a system admin with login

## Installation
```bash
composer require ninja/manager
php artisan storage:link
```
**Add this code in app/Http/Kernel.php**

```bash
use Ninja\Manager\Middleware\IsAdmin;
```
in $routeMiddleware array add:

```bash
'admin' => \Ninja\Manager\Middleware\IsAdmin::class,
```
**Delete laravel user migration by default**

run this commands:

```bash
php artisan migrate
php artisan vendor:publish --provider="Ninja\Manager\ManagerServiceProvider"
```
**Finally**

```bash
composer update
composer dump-autoload
```
