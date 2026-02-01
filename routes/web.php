<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['activePage' => 'home']);
})->name('home');

Route::get('/user', function () {
    return view('user', ['activePage' => 'user']);
})->name('user');

Route::get('/power-rate', function () {
    return view('Power-rate', ['activePage' => 'power-rate']);
})->name('power-rate');

Route::get('/place', function () {
    return view('Place', ['activePage' => 'place']);
})->name('place');

Route::get('/place/add', function () {
    return view('add-Place', ['activePage' => 'place']);
})->name('place.add');

Route::get('/justice-center', function () {
    return view('justice-center', ['activePage' => 'justice-center']);
})->name('justice-center');

Route::get('/justice-center/add', function () {
    return view('add-justice-center', ['activePage' => 'justice-center']);
})->name('justice-center.add');

Route::get('/training', function () {
    return view('training', ['activePage' => 'training']);
})->name('training');

Route::get('/training/add', function () {
    return view('add-training', ['activePage' => 'training']);
})->name('training.add');

Route::get('/contact', function () {
    return view('contact-channels', ['activePage' => 'contact']);
})->name('contact');

Route::get('/vehicle', function () {
    return view('vehicle', ['activePage' => 'vehicle']);
})->name('vehicle');

Route::get('/affiliated-agencies', function () {
    return view('affiliated-agencies', ['activePage' => 'affiliated-agencies']);
})->name('affiliated-agencies');


