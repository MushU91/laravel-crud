<?php

use App\Http\Controllers\OJT\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// Redirect root to students index
Route::get('/', function () {
    return redirect()->route('students.index');
});

// Static pages
Route::get('/home', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('students.contact');
})->name('contact');
Route::get('/about', function () {
    return view('students.about');
})->name('about');

// Student CRUD
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

// No access page
Route::get('/no-access', function () {
    return view('no-access');
})->name('no-access');

// Age check middleware
Route::get('/welcome', function () {
    return view('welcome-age');
})->name('welcome')->middleware('check.age');

// User view
Route::get('/user', function () {
    return view('user');
})->name('user');

// -------------------
// Auth Routes
// -------------------

// Show register form
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');

// Handle register form POST
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// Show login form
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');

// Handle login POST
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin dashboard (only for admin users)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
});

// User dashboard (only for logged-in users)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');
});

//testing
Route::get('/form', [TestController::class,'show']);

Route::post('/form',[TestController::class,'submit'])->name('form.submit');