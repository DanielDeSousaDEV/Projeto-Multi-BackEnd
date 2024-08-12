<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste/{id}', function ($id) {
    return "daniel de sousa".$id;
});