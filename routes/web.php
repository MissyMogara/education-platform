<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\EvaluationController;
use App\Models\Inscription;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Admin routes
 */
Route::middleware(['auth', 'checkAdminOrTeacher'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('private.course.create');
});

/**
 * Shared routes (Admin and Student)
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('public.course.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('public.course.show');
    Route::post('/courses/{course_id}/student/{student_id}', [InscriptionController::class, 'enroll'])->name('public.course.enroll');
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('public.evaluation.index');
    Route::get('/evaluations/{id}', [EvaluationController::class, 'show'])->name('public.evaluation.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
