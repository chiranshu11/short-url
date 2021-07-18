<?php

// use Illuminate\Support\Facades\Route;

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
ApiRoute::get('/', function () {
    return view('welcome');
});

ApiRoute::middleware('auth')->prefix('user')->group(function(){
    ApiRoute::get('dashboard', 'ShortenUrlController@index')->name('dashboard');
    ApiRoute::post('store_url', 'ShortenUrlController@store')->name('store_url');
    ApiRoute::post('delete_url', 'ShortenUrlController@delete')->name('delete_url');
    ApiRoute::post('update_url_status', 'ShortenUrlController@updateStatus')->name('update_url');
    ApiRoute::post('edit_url', 'ShortenUrlController@editUrl')->name('edit_url');
    ApiRoute::post('upgrade_plan', 'ShortenUrlController@upgradePlan')->name('upgrade_url');
});

ApiRoute::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    ApiRoute::post('register', 'AuthController@registration')->name('register');
    // ->middleware("throttle:15,60,registration")->name('register');
    ApiRoute::get('register', 'AuthController@registration');
    // Register a new user

    ApiRoute::get('login',  'AuthController@index');
    ApiRoute::post('login', 'AuthController@login')->name('login'); // Login a user
    ApiRoute::get('dashboard', 'AuthController@dashboard'); 

    ApiRoute::post('logout', 'AuthController@logout')->name('logout');
});

// ApiRoute::middleware('auth')->prefix('user')->group(function(){
//     ApiRoute::get('/dashboard', [ DashboardController::class, 'index' ])->name('home');
// });
