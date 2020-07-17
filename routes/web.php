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


Route::get('/', 'FrontendController@index')->name('home');
Route::get('frontend/contact', 'FrontendController@contact');
Route::get('checkout', 'FrontendController@checkout')->name('checkout');
Route::get('productsdetails', 'FrontendController@productsdetails')->name('productsdetails');
Route::get('cart', 'ProductController@cartdetails')->name('cart');

Route::get('user', 'UserController@index')->name('user');
Route::get('saveConsultation', 'UserController@saveConsultation')->name('saveConsultation');
Route::get('user/{id?}', 'UserController@show')->where('id', '[0-9]+');
Route::get('user/{name}', 'UserController@display');

//Backend
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('loginform', 'UserController@loginform')->name('loginform');
Route::Post('checklogin', 'UserController@checklogin')->name('checklogin');

Route::get('registration', 'UserController@registration')->name('registration');
Route::Post('registrationsave', 'UserController@registrationsave')->name('registrationsave');
Route::get('logout', 'UserController@logout')->name('logout');

//role
Route::get('roleform', 'UserController@roleform')->name('roleform');
Route::get('showrole', 'UserController@showrole')->name('showrole');

//Cat Area
Route::get('catform', 'CatController@catform')->name('catform');
Route::get('showallcat', 'CatController@showallcat')->name('showallcat');
Route::post('catsave', 'CatController@catsave')->name('catsave');
Route::get('cateedit/{id}','CatController@cateedit')->name('cateedit');
//Route::post('edit/{id}','CatController@edit');
Route::get('catdelete/{id}','CatController@catdelete')->name('catdelete');

Route::post('catupdate/{id}','CatController@catupdate')->name('catupdate');
//Product Area
Route::get('proform', 'ProductController@proform')->name('proform');
Route::get('showallpro', 'ProductController@showallpro')->name('showallpro');
Route::post('productsave','ProductController@save')->name('productsave');
Route::get('prodelete/{id}','ProductController@prodelete')->name('prodelete');
Route::get('productsdetails/{id}', 'ProductController@productsdetails')->name('productsdetails');
//

Route::get('add-to-cart/{id}', 'ProductController@addToCart');
Route::patch('update-cart', 'ProductController@update');
Route::delete('remove-from-cart', 'ProductController@remove');
