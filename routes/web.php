<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RecordsController::class, 'index']);
Route::get('/count', [RecordsController::class, 'getPageCount']);
Route::get('/all', [RecordsController::class, 'getAll']);
Route::get('/down/{id}', [RecordsController::class, 'upPosition']);
Route::get('/up/{id}', [RecordsController::class, 'downPosition']);
Route::post('/insert', [RecordsController::class, 'setRecords']);
Route::get('/single/{id}', [RecordsController::class, 'getSingle']);
Route::get('/delete/{id}', [RecordsController::class, 'deleteRecord']);