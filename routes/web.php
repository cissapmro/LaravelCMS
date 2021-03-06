<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Site\HomeController@index');

Route::prefix('painel')->group(function(){
        Route::get('/', 'Admin\HomeController@index')->name('admin');
        Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
        Route::post('login', 'Admin\Auth\LoginController@authenticate');
        Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

        Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
        Route::post('register', 'Admin\Auth\RegisterController@register');

        Route::resource('users', 'Admin\UserController');

        Route::get('profile', 'Admin\ProfileController@index')->name('profile');
        Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');

        Route::get('setting', 'Admin\SettingController@index')->name('setting');
        Route::put('settingsave', 'Admin\SettingController@save')->name('setting.save');

        Route::resource('pages', 'Admin\PageController');

    //  Route::get('users', 'Admin\UserController@index')->name('users');
    //GRID
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback('Site\PageController@index');
