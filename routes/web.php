<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureIsTeacherOrAdmin;
use App\Models\Inscription;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Admin routes
 */
Route::middleware(['auth', \App\Http\Middleware\EnsureIsTeacherOrAdmin::class])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('private.course.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('private.course.store');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('private.course.edit');
    Route::put('/courses/{id}/update', [CourseController::class, 'update'])->name('private.course.update');
    Route::delete('/courses/{id}/delete', [CourseController::class, 'destroy'])->name('private.course.destroy');
    Route::get('/inscriptions', [InscriptionController::class, 'index'])->name('private.inscription.index');
    Route::put('/inscriptions/{id}/approve', [InscriptionController::class, 'approve'])->name('private.inscription.approve');
    Route::put('/inscriptions/{id}/reject', [InscriptionController::class, 'reject'])->name('private.inscription.reject');
    Route::get('/inscriptions/search', [InscriptionController::class, 'search'])->name('private.inscription.search');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('private.evaluation.store');
    Route::get('/materials/{id}', [CourseMaterialController::class, 'create'])->name('private.material.create');
    Route::post('/materials', [CourseMaterialController::class, 'store'])->name('private.material.store');
    Route::get('/materials/{id}/edit', [CourseMaterialController::class, 'edit'])->name('private.material.edit');
    Route::put('/materials/{id}/update', [CourseMaterialController::class, 'update'])->name('private.material.update');
    Route::delete('/materials/{id}/delete', [CourseMaterialController::class, 'destroy'])->name('private.material.destroy');
    Route::get('/users/teacher', [UserController::class, 'createTeacher'])->name('private.user.create.teacher');
    Route::get('/users/student', [UserController::class, 'createStudent'])->name('private.user.create.student');
    Route::post('/users', [UserController::class, 'store'])->name('private.user.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('private.user.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('private.user.update')->middleware('can:update,App\Models\User');
    Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('private.user.destroy')->middleware('can:delete,App\Models\User');
});

/**
 * Shared routes (Admin and Student)
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('main');
    Route::get('/courses', [CourseController::class, 'index'])->name('public.course.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('public.course.show');
    Route::post('/courses/{course_id}/student/{student_id}', [InscriptionController::class, 'enroll'])->name('public.course.enroll');
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('public.evaluation.index');
    Route::get('/evaluations/{id}', [EvaluationController::class, 'show'])->name('public.evaluation.show');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('public.user.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
