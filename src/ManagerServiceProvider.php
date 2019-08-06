<?php

namespace Ninja\Manager;

use Illuminate\Support\ServiceProvider;
use Ninja\Manager\Admin\ProductController;
use Ninja\Manager\Admin\LocationController;
use Ninja\Manager\Admin\UserController;
use Ninja\Manager\Admin\PageController;
use Ninja\Manager\Admin\LogController;
use Ninja\Manager\Admin\ArticleController;
use Ninja\Manager\Admin\CategoryController;
use Ninja\Manager\Admin\SliderController;
use Ninja\Manager\Admin\LinkController;
use Ninja\Manager\Admin\AdminController;
use Ninja\Manager\Admin\AttachmentController;
use Ninja\Manager\Middleware\IsAdmin;
use Ninja\Manager\Auth\LoginController;
use Ninja\Manager\Auth\RegisterController;
use Ninja\Manager\Auth\VerificationController;
use Ninja\Manager\Auth\ResetPasswordController;
use Ninja\Manager\Auth\ForgotPasswordController;


class ManagerServiceProvider extends ServiceProvider
{
  /**
  * Register services.
  *
  * @return void
  */
  public function register()
  {
    $this->app->make('Ninja\Manager\Admin\ProductController');
    $this->app->make('Ninja\Manager\Admin\LocationController');
    $this->app->make('Ninja\Manager\Admin\UserController');
    $this->app->make('Ninja\Manager\Admin\PageController');
    $this->app->make('Ninja\Manager\Admin\LogController');
    $this->app->make('Ninja\Manager\Admin\ArticleController');
    $this->app->make('Ninja\Manager\Admin\CategoryController');
    $this->app->make('Ninja\Manager\Admin\SliderController');
    $this->app->make('Ninja\Manager\Admin\LinkController');
    $this->app->make('Ninja\Manager\Admin\AdminController');
    $this->app->make('Ninja\Manager\Admin\AttachmentController');
    $this->app->make('Ninja\Manager\Middleware\IsAdmin');
    $this->app->make('Ninja\Manager\Auth\LoginController');
    $this->app->make('Ninja\Manager\Auth\RegisterController');
    $this->app->make('Ninja\Manager\Auth\VerificationController');
    $this->app->make('Ninja\Manager\Auth\ResetPasswordController');
    $this->app->make('Ninja\Manager\Auth\ForgotPasswordController');
  }

  /**
  * Bootstrap services.
  *
  * @return void
  */
  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__.'/migrations');
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    $this->loadViewsFrom(__DIR__.'/views', 'manager');

    $this->publishes([__DIR__.'/css' => public_path('css')], 'styles');
    $this->publishes([__DIR__.'/img' => public_path('img')], 'images');
  }
}
