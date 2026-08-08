<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Middleware\UserIsLogged;
use App\Http\Middleware\UserIsNotLogged;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Auth - Routes
Route::middleware([UserIsNotLogged::class])->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

// app route
Route::middleware([UserIsLogged::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/newTask', [TaskController::class, 'create'])->name('newTask');
    Route::post('/newTaskSubmit', [TaskController::class, 'store'])->name('newTaskSubmit');

    Route::get('/editTasks/{id}', [TaskController::class, 'edit'])->name('editTasks');
    Route::post('/editTasksSubmit/{id}', [TaskController::class, 'update'])->name('editTasksSubmit');

    Route::get('/deleteConfirm/{id}', [TaskController::class, 'confirmDelete'])->name('deleteConfirm');
    Route::delete('/deleteTask/{id}', [TaskController::class, 'destroy'])->name('deleteTask');
});
