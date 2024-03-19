<?php

use Illuminate\Support\Facades\Route;
use Modules\Events\App\Http\Controllers\EventsController;

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

// Gestión de Eventos

Route::name('events.')->prefix('events')->group(function () {
    Route::get('/', ['uses' => 'EventsController@index', 'as' => 'index']);
    Route::get('getEvent', ['uses' => 'EventsController@event', 'as' => 'getEvent']);
    Route::get('getDatatableIndex', ['uses' => 'EventsController@datatableIndex', 'as' => 'getDatatableIndex']);

    Route::post('newEvent', ['uses' => 'EventsController@create', 'as' => 'newEvent']);
    Route::post('updateEvent', ['uses' => 'EventsController@update', 'as' => 'updateEvent']);

    Route::put('trashEvent', ['uses' => 'EventsController@destroy', 'as' => 'trashEvent']);
});
