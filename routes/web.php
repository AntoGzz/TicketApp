<?php

use Illuminate\Support\Facades\Route;
use Modules\Sales\App\Http\Controllers\SalesController;

Route::get('/', [SalesController::class, 'index'], 'index');
