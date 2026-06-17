<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/1', function () {
    return 'Hello Test 123
    ';
});

Route::get('/2', function () {
    return ['name' => 'Apisit'
          ,'job' => 'programmer'
    ];
});

Route::get('/user', [UserController::class, 'index']);