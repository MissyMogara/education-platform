<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\APIController;
use Illuminate\Auth\AuthenticationException;


Route::get('/', function () {
    return 'API';
});

Route::post('/login', [APIController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/cursos', [APIController::class, 'getCourses']);
    Route::get('/cursos/{id}', [APIController::class, 'getCoursesById']);
    Route::get('/alumnos/{dni}/inscripciones', [APIController::class, 'getInscriptionsByStudent']);
    Route::post('/inscripciones', [APIController::class, 'enrollStudent']);
    Route::delete('/inscripciones/{id}', [APIController::class, 'unenrollStudent']);
    Route::post('/cursos', [APIController::class, 'createCourse'])->middleware('can:create,App\Models\Course');
    Route::delete('/cursos/{id}', [APIController::class, 'deleteCourse'])->middleware('can:delete,App\Models\Course');
});
