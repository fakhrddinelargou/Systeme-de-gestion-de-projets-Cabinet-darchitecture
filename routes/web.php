<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role->name;
        $direction = $role . '.dashboard';
        return view('layout.app', compact('direction'));
    }

    return redirect()->route('login');
});



Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('admin')->group(function () {
        Route::get('admin/users', [UsersController::class, 'index'])->name('users');
        Route::get('pagination', [UsersController::class, 'pagination'])->name('pagination');
        Route::delete('admin/users/{id}', [UsersController::class, 'destroy'])->name('delete.user');
        Route::post('admin/add/users', [UsersController::class, 'store'])->name('store.user');
        Route::get('admin/search/{name}', [UsersController::class, 'search'])->name('search.user');
        Route::get('admin/search/{role}/role', [UsersController::class, 'searchByrole'])->name('search.user.role');
    });

    Route::get('projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile/info', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::put('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image');
    


});