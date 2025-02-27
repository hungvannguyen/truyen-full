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

Route::get('/chapter', function () {
    return view('chapter');
});

Route::get('/follow', function () {
    return view('follow');
});

Route::get('/author', function () {
    return view('author');
});