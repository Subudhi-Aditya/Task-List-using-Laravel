<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/name', function(){
    return 'name';
});

// we can give names to the Route object in the following way
Route::get('/page', function(){
    return 'page route';
})->name('pageRoute');

Route::get('/fake', function () {
    return redirect()->route('pageRoute');
});
Route::fallback(function () {
    return "404 Page Not Found";
});