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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/saveSCUT', 'SmartContractsController@index');
    Route::get('/scanSCUT', 'SmartContractsController@scan');
    Route::post('/storeSCUT', 'SmartContractsController@store');
    Route ::get('/report','SmartContractsController@report');
});


