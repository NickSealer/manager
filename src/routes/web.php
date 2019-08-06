<?php
use App\Location;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function() {
  Route::get('/login', 'Ninja\Manager\Auth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'Ninja\Manager\Auth\LoginController@login');
  Route::post('/logout', 'Ninja\Manager\Auth\LoginController@logout')->name('logout');
  Route::post('/password/email', 'Ninja\Manager\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('/password/reset', 'Ninja\Manager\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('/password/reset', 'Ninja\Manager\Auth\ResetPasswordController@reset')->name('password.update');
  Route::get('/password/reset/{token}', 'Ninja\Manager\Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::get('/resgister', 'Ninja\Manager\Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/resgister', 'Ninja\Manager\Auth\RegisterController@register');

  Route::prefix('admin')->namespace('Ninja\Manager\Admin')->as('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'ProductController@index');
    Route::resource('locations', 'LocationController');
    Route::resource('users', 'UserController');
    Route::resource('pages', 'PageController');
    Route::resource('products', 'ProductController');
    Route::resource('logs', 'LogController');
    Route::resource('articles', 'ArticleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('slider', 'SliderController');
    Route::resource('links', 'LinkController');
    Route::get('docs', 'AdminController@docs')->name('admin.docs');
    Route::resource('attachments', 'AttachmentController');
  });

});
