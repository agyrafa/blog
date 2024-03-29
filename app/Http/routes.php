<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', [
    'uses' => 'PostController@getDashboard',
    'as' => 'home',
]);

Route::get('/access_denied', function () {
    return view('errors/403');
})->name('403');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);
Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);


Route::get('/sign_up', function() {
   return view('signup');
})->name('sign.up');

Route::get('/sign_in', function() {
    return view('signin');
})->name('sign.in');

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/account', [
   'uses' => 'UserController@getAccount',
    'as' => 'account',
    'middleware' => 'auth'
]);

Route::get('account_photo/{filename}', [
   'uses' => 'UserController@getUserPhoto',
    'as' => 'account.photo'
]);


Route::post('/create_post', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);


Route::get('/delete_post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::get('attachment/{filename}', [
    'uses' => 'PostController@getAttachPhoto',
    'as' => 'upload.photo'
]);