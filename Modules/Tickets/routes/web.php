<?php

use Illuminate\Support\Facades\Route;
use Modules\Tickets\App\Http\Controllers\TicketsController;

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

// Gestión de Tickets
/* Route::group([], function () {
    Route::resource('tickets', TicketsController::class)->names('tickets');
}); */

Route::name('tickets.')->prefix('tickets')->group(function () {
    Route::get('/', ['uses' => 'TicketsController@index', 'as' => 'index']);
    Route::get('getTicket', ['uses' => 'TicketsController@ticket', 'as' => 'getTicket']);
    Route::get('getDatatableIndex', ['uses' => 'TicketsController@datatableIndex', 'as' => 'getDatatableIndex']);

    Route::post('newTicket', ['uses' => 'TicketsController@create', 'as' => 'newTicket']);
    Route::post('updateTicket', ['uses' => 'TicketsController@update', 'as' => 'updateTicket']);

    Route::put('trashTicket', ['uses' => 'TicketsController@destroy', 'as' => 'trashTicket']);
});
