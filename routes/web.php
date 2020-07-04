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


Route::get('/', 'FrontendController@index');
Route::get('frontend/contact','FrontendController@contact');
Route::get('checkout','FrontendController@checkout')->name('checkout');
Route::get('productsdetails','FrontendController@productsdetails')->name('productsdetails');

Route::get('user','UserController@index')->name('user');
Route::get('saveConsultation','UserController@saveConsultation')->name('saveConsultation');
Route::get('user/{id?}','UserController@show')->where('id','[0-9]+');
Route::get('user/{name}','UserController@display');
