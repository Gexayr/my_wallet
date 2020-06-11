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
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('auth/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{service}/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('wallet', 'WalletController')->only([
        'index', 'store'
    ]);
    Route::post('record', 'RecordController@store')->name('record');
});

