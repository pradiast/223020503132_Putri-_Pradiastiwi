<?php

use App\Http\Controllers\modul2controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cooler_city',[controller::class, 'index.php'])->name('cooler_city');
