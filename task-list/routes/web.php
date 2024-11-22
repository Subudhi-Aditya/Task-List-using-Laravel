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

// calling the routes with the names of the routes 
Route::get('/fake', function () {
    return redirect()->route('pageRoute');
});

// here returning the blade templtes by the name of the blade template instead of any string or value
Route::get('bladeTemplate', function () {
    return view('index');
});

// Calling another blade template by passing some variables from route to the blade template 
Route::get('bladeTemplateVar', function() {
    return view('index1',[
        'name' => 'Aditya' // Use the same variable name in the index1 blade template to call the variable
    ]);
});
Route::fallback(function () {
    return "404 Page Not Found";
});