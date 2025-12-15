<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

use App\Models\User;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;

use App\Http\Controllers\Api\PortfolioApiController; 
use App\Http\Controllers\Api\ScheduleApiController; 
use App\Http\Controllers\Api\WarningController; 

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes

// Rute untuk login
>>>>>>> Stashed changes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

=======
// Rute untuk logout

=======
// Rute untuk logout
>>>>>>> Stashed changes
=======
// Rute untuk logout
>>>>>>> Stashed changes
=======
// Rute untuk logout
>>>>>>> Stashed changes
=======
// Rute untuk logout
>>>>>>> Stashed changes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    // Dashboard User Biasa
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Schedule
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    Route::get('/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');

=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

    // Profile
    Route::get('/profile/{user?}', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Portfolio
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream

    Route::resource('api/schedules', ScheduleApiController::class)->except(['create', 'edit']); 
    Route::resource('api/portfolios', PortfolioApiController::class)->except(['create', 'edit']); 
    Route::resource('api/warnings', WarningController::class)->except(['create', 'edit']);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
});

// Rute khusus untuk Dashboard Admin
Route::middleware('role:admin')->prefix('admin')->group(function () { 
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); 
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes

    // Manajemen User
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

    // Manajemen Posts 
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts.index');
    Route::delete('/posts/{post}', [AdminController::class, 'destroyPost'])->name('posts.destroy');

<<<<<<< Updated upstream
    // Manajemen Portfolio
    // URI: /admin/portfolios, Nama: admin.portfolios.index
    Route::get('/portfolios', [AdminController::class, 'portfolios'])->name('portfolios.index');
    Route::delete('/portfolios/{portfolio}', [AdminController::class, 'destroyPortfolio'])->name('portfolios.destroy');
=======
    // manajemen portfolio
    Route::get('/portfolios', [AdminController::class, 'portfolios'])->name('admin.portfolios.index');
    Route::delete('/portfolios/{portfolio}', [AdminController::class, 'destroyPortfolio'])->name('admin.portfolios.destroy');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

    // Manajemen Peringatan
    Route::get('/warnings', [AdminController::class, 'warnings'])->name('warnings.index');
    Route::get('/warnings/create', [AdminController::class, 'createWarningForm'])->name('warnings.create');
    Route::post('/warnings/store', [AdminController::class, 'storeWarning'])->name('warnings.store');
    Route::get('/warnings/{warning}/edit', [AdminController::class, 'editWarning'])->name('warnings.edit');
    Route::put('/warnings/{warning}', [AdminController::class, 'updateWarning'])->name('warnings.update');
    Route::delete('/warnings/{warning}', [AdminController::class, 'destroyWarning'])->name('warnings.destroy');
});