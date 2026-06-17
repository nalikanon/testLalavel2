<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Models\Machine;
use App\Http\Controllers\MachineController;

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

Route::get('/machines', [MachineController::class, 'index']);
Route::get('/machines/create', [MachineController::class, 'create']);
Route::post('/machines', [MachineController::class, 'store']);

Route::get('/machines/{id}/edit', [MachineController::class, 'edit']);
Route::post('/machines/{id}', [MachineController::class, 'update']);

Route::post('/machines/{id}/delete', [MachineController::class, 'destroy']);
