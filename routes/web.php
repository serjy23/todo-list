<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [ DashboardController::class, 'index' ]);

Route::get('/new', [ ItemController::class, 'new' ]);
Route::get('/delete', [ ItemController::class, 'delete' ]);
