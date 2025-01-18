<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers;

use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',TaskController::class . '@Index');

Route::post('/save_task', TaskController::class . '@Save');

Route::post('/update_task_to_1/{id}', TaskController::class . '@update_task_to_1');

Route::post('/update_task_to_0/{id}', TaskController::class . '@update_task_to_0');

Route::post('/delete_task/{id}', TaskController::class . '@Delete');


