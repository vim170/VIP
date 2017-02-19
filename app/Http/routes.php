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

Route::get('/', function () {
    return view('welcome');
});



// Route::controller('/index','home\IndexController');

// Route::controller('/home/custser','home\CustserController');

Route::controller('/home/fback','home\FbackController');

Route::controller('/home/afters','home\AftersController');