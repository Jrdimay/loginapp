<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Models\Appointment;

// Redirect root URL to login
Route::get('/', function () {
    return redirect('login');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Module 1 route
Route::get('/module1', function () {
    return view('module1');
})->middleware(['auth', 'verified'])->name('module1');

// Module 4 route
Route::get('/module4', function () {
    return view('module4');
})->middleware(['auth', 'verified'])->name('module4');

// Schedule route
Route::get('Appointment/Schedule', function () {
    return view('schedule');
})->middleware(['auth', 'verified'])->name('schedule');

Route::get('Appointment/Create', function () {
    return view('create');
})->middleware(['auth', 'verified'])->name('create');
// Publish route (AuthorController@index)
Route::get('/publishment', [AuthorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('pub');

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Author-related routes
Route::prefix('author')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/edit', [AuthorController::class, 'edit'])->name('author.edit');
    Route::get('/views', [AuthorController::class, 'views'])->name('author.views');
    Route::get('/{id}', [AuthorController::class, 'show'])->name('author.show');
});
// appointment
Route::resource('appointments', AppointmentController::class)->middleware(['auth', 'verified']);
Route::get('/schedule', function () {$appointments = Appointment::all();return view('schedule', compact('appointments'));
})->middleware(['auth', 'verified'])->name('schedule');
Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');


// Auth routes
require __DIR__.'/auth.php';
