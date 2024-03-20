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
/* Route::group([], function () {
    Route::resource('events', EventsController::class)->names('events');
}); */

Route::name('events.')->prefix('events')->group(function () {
    Route::get('/', ['uses' => 'EventsController@index', 'as' => 'index']);
    Route::get('getEvent', ['uses' => 'EventsController@event', 'as' => 'getEvent']);
    Route::get('select', ['uses' => 'EventsController@events', 'as' => 'select']);
    Route::get('selectAvailable', ['uses' => 'EventsController@quantityAvailable', 'as' => 'selectAvailable']);
    Route::get('getDatatableIndex', ['uses' => 'EventsController@datatableIndex', 'as' => 'getDatatableIndex']);

    Route::post('newEvent', ['uses' => 'EventsController@create', 'as' => 'newEvent']);
    Route::post('updateEvent', ['uses' => 'EventsController@update', 'as' => 'updateEvent']);

    Route::put('trashEvent', ['uses' => 'EventsController@destroy', 'as' => 'trashEvent']);
});
