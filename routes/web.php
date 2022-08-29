<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Models\Incident;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Routes for Users
// Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}/activities', [UserController::class, 'getActivities']);
Route::get('/user/{id}/incidents', [UserController::class, 'getIncidents']);

//Routes for Projects
Route::get('/project/{id}/users', [ProjectController::class, 'getUsers']);
Route::post('/project/store', [ProjectController::class, 'store']);

//Routes for Activities
Route::post('/activity/store', [ActivityController::class, 'store']);

//Routes for Incidents
Route::post('/incident/store', [IncidentController::class, 'store']);
