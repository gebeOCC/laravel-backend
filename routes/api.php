<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\InformationsController;

// Retrieve all records
Route::get('/informations', [InformationsController::class, 'index']);

// Retrieve a single record by ID
Route::get('/informations/{id}', [InformationsController::class, 'show']);

// Create a new record
Route::post('/informations', [InformationsController::class, 'create']);

// Update a record by ID
Route::put('/informations/{id}', [InformationsController::class, 'update']);

// Delete a record by ID
Route::delete('/informations/{id}', [InformationsController::class, 'destroy']);
