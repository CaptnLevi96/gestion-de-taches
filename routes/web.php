<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

// Rediriger vers les tâches si connecté, sinon vers login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('tasks.index');
    }
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', function() {
    return redirect()->route('tasks.index');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});