<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/welcome', 'HomeController@authProfile')->name('welcome');


Route::get('/', function (){

    return view('welcome');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/instagram', function () {
    $profile =  \Dymantic\InstagramFeed\Profile::where('username', 'adrianradores')->first();
    $auth = $profile->feed($limit = 60);

    return view('instagram',['instagrams' => $auth]);
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
});

Route::post('upload', 'UserController@uploadAvater');
