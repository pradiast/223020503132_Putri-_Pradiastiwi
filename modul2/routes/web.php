<?php

use App\Http\Controllers\modul2controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/TugasModul2',[modul2controller::class, 'index'])->name('Modul2');
