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


/*
Route::get('/runna', function () {
   // return view('welcome');
   return '<h1>hello world<h1>';
   
   Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user ' .$name. ' with an id of ' .$id ;
});

});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/events', 'PagesController@events');

Route::resource('posts', 'PostsController');
Route::post('posts/rating/store', 'PostsController@storeRating')->name('store-rating');
Route::get('posts/cart', 'PostsController@cart')->name('posts-cart');
Route::get('posts/add-to-cart/{id}', 'PostsController@addToCart')->name('add-to-cart');
Route::patch('update-cart', 'PostsController@updateCart');
Route::delete('remove-from-cart', 'PostsController@removeCart');

Route::resource('categories', 'CategoriesController');

Route::resource('registrations', 'RegistrationsController');
Route::get('post/registrations/{post_id}', 'RegistrationsController@show')->name('show-registrations');
Route::get('registrations/create/{post_id}', 'RegistrationsController@create')->name('register-event');

Route::resource('profiles', 'ProfilesController');
Route::get('profiles/show/{id}', 'ProfilesController@show')->name('show-profile');
Route::get('profiles/edit/{id}', 'ProfilesController@edit')->name('edit-profile');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::post('post/rating/store', 'PostsController@storeRating')->name('store-rating');

