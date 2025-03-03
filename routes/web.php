<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
	return view('test');
})->middleware(['auth'])->name('test');

Route::get('/test-1', function () {
	return view('test 1');
})->name('test 1');