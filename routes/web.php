<?php

use App\Mail\ResetPassword;
use App\Trait\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

Route::get('/send', function () {
	Mail::to('thaison2352.gm@gmail.com')->send(new ResetPassword());
	return 'Mail sent';
});


Route::post('/upload', function (Request $request) {

	$request->validate([
			'image' => 'required|image',
	]);

	$image = $request->file('image');

	$uploader = new class {
		use Image;
	};

	$imageName = $uploader->uploadImage($image, 'test/');



	return "Uploaded image name: " . $imageName;
})->name('upload');