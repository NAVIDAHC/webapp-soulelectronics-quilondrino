<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/users', [UserController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('users');
Route::get('/edit/{user}', [UserController::class, 'edit'])
        ->middleware(['auth', 'verified'])
        ->name('users.edit');
Route::delete('/{user}', [UserController::class, 'destroy'])
        ->middleware(['auth', 'verified'])
        ->name('users.destroy');
Route::put('{user}', [UserController::class, 'update'])
        ->middleware(['auth', 'verified'])
        ->name('users.update');
Route::get('/users/add', [UserController::class, 'add'])
        ->middleware(['auth', 'verified'])
        ->name('users.add');
Route::post('users/add', [UserController::class, 'store'])
        ->middleware(['auth', 'verified'])
        ->name('users.store');
Route::get('/announcement', [AnnouncementController::class, 'index'])
        ->middleware(['auth','verified'])
        ->name('announcement');
Route::get('/announcement/add', [AnnouncementController::class, 'add'])
        ->middleware(['auth','verified'])
        ->name('announcement.add');
Route::post('/announcement/add', [AnnouncementController::class, 'store'])
        ->middleware(['auth','verified'])
        ->name('announcement.store');
Route::get('/announcements', 'AnnouncementController@index')
        ->name('announcements.index');
Route::get('/announcement/edit/{announcement}', [AnnouncementController::class, 'edit'])
        ->middleware(['auth','verified'])
        ->name('announcement.edit');
Route::delete('/announcement/destroy/{announcement}', [AnnouncementController::class, 'destroy'])
        ->middleware(['auth','verified'])
        ->name('announcement.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';