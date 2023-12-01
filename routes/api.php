<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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
Route::get('/students/{studentID}',[StudentController::class,'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{studentID}', [StudentController::class, 'update']);
Route::delete('/students/{studentID}', [StudentController::class, 'destroy']);

Route::get('/lecturers',[LecturerController::class,'index']);
Route::get('/lecturers/{lecturerID}',[LecturerController::class,'show']);
Route::post('/lecturers',[LecturerController::class, 'store']);
Route::put('/lecturers/{lecturerID}',[LecturerController::class, 'update']);
Route::delete('/lecturers/{lecturerID}',[LecturerController::class, 'destroy']);

Route::get('/courses',[CourseController::class,'index']);
Route::get('/courses/{courseID}',[CourseController::class,'show']);
Route::post('/courses',[CourseController::class, 'store']);
Route::put('/courses/{courseID}',[CourseController::class,'update']);
Route::delete('/courses/{courseID}',[CourseController::class,'destroy']);

Route::get('/subjects',[SubjectController::class,'index']);
Route::get('/subjects/{subjectID}',[SubjectController::class,'show']);
Route::post('/subjects',[SubjectController::class, 'store']);
Route::put('/subjects/{subjectID}',[SubjectController::class,'update']);
Route::delete('/subjects/{subjectID}',[SubjectController::class,'destroy']);

Route::get('/results',[ResultController::class,'index']);
Route::get('/results/{resultID}',[ResultController::class,'show']);
Route::post('/results',[ResultController::class,'store']);
Route::put('/results/{resultID}',[ResultController::class,'update']);
Route::delete('/results/{resultID}',[ResultController::class,'destroy']);


