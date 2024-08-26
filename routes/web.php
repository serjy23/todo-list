<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard', '200');

Route::get('/dashboard', function () {
    return view('dashboard');
});

// TODO: item controller