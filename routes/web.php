<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::post('/', [AuthController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('/', [AuthController::class, 'register'])->name('register');
Route::post('/loginForm', [AuthController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/loginForm', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [UserController::class, 'getUsers'])->name('users');
    Route::get('/updateUser', [UserController::class, 'update'])->name('update')->middleware('auth');;
    Route::post('/updateUser', [UserController::class, 'updateSubmit'])->name('updateSubmit');

});

require __DIR__.'/auth.php';
