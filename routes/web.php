<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/details', function () {
    return view('details');
});