<?php

use App\Http\Controllers\StudentController;
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

Route::get('/students',[StudentController::class,'index']);

// // Retrieve all students
// Route::get('/students', [StudentController::class, 'index']);

// // Retrieve a single student by ID
// Route::get('/students/{id}', [StudentController::class, 'show']);

// // Create a new student
// Route::post('/students', [StudentController::class, 'store']);

// // Update a student by ID
// Route::put('/students/{id}', [StudentController::class, 'update']);

// // Delete a student by ID
// Route::delete('/students/{id}', [StudentController::class, 'destroy']);
