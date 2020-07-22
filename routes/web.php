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

Route::get('/', 'HomeController@index');

Route::get('/login', 'LoginController@index');

Route::get('/registration', 'RegistrationController@index');

Route::get('/equipment', 'EquipmentController@index');

Route::get('/expeditions', 'ExpeditionsController@index');

Route::get('/trips', 'TripsController@index');

Route::get('/missions', 'MissionsController@index');

Route::get('/mines', 'MinesController@index');

Route::get('/guilds', 'GuildsController@index')->name('guilds');

Route::get('/statistics', 'StatisticsController@index');

Route::get('/authors', 'AuthorsController@index');

Route::get('/account', 'AccountController@index');

Route::get('/tutorial', 'TutorialController@index');

Route::get('/market', 'MarketController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/startExpedition','ExpeditionsController@create');

Route::post('/checkExpedition','ExpeditionsController@show');

Route::post('/startTrip','TripsController@create');

Route::post('/checkTrip','TripsController@show');

Route::post('/addMine','MinesController@add');

Route::post('/completeMission','MissionsController@complete');

Route::get('/guilds/{guildid}/show','GuildsController@show');

Route::get('/guilds/list','GuildsController@list');

Route::get('/guilds/create','GuildsController@create');

Route::post('/guilds/create','GuildsController@create');

Route::get('/admin','Admin\\AdminController@index');

Route::get('/admin/users','Admin\\AdminController@users');

Route::get('/admin/settings','Admin\\AdminController@settings');

Route::post('/adminSettingSave','Admin\\AdminController@store');

Route::post('/adminBanUser','Admin\\AdminController@ban');

Route::post('/adminUnbanUser','Admin\\AdminController@unban');

Route::post('/sellMineral','EquipmentController@sell');

Route::get('/market/offers/all','MarketController@list');

Route::get('/market/offers/yours', 'MarketController@list');

Route::post('/market/offer/add','MarketController@add');

Route::get('/market/offer/{offerid}/delete','MarketController@delete');

Route::post('/getOfferInfo','MarketController@show');

Route::post('/market/offer/{offerid}/transaction','MarketController@addTransaction');

Route::get('/account/edit/{action}', 'AccountController@edit');

Route::post('/account/update/{action}', 'AccountController@update');

Route::post('/account/confirmPassword', 'AccountController@checkPassword');

Route::post('/account/delete', 'AccountController@delete');

Route::post('/search/user', 'StatisticsController@search');

Route::get('/statistics/users/{id}/show', 'StatisticsController@show');

Route::get('/debts', 'DebtsController@index');

Route::post('/debts/attempt', 'DebtsController@attempt');

Route::get('/debt/{action}', 'DebtsController@edit');