<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/item', [ ItemController::class, 'insert' ]);
Route::delete('/item', [ ItemController::class, 'delete' ]);