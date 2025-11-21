<?php

use App\Http\Controllers\OJT\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityTownshipController;
use App\Http\Controllers\EmployerEmployeeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Mail;

// Root route → go to login
// Route::get('/', function () {
//     return redirect()->route('login.form');
// });

// Static pages
Route::view('/home', 'home');
Route::view('/contact', 'students.contact')->name('contact');
Route::view('/about', 'students.about')->name('about');

// Student CRUD
Route::get('/students/list', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

//family CRUD
Route::get('/family/list',[FamilyController::class,'index'])->name('family.index');
Route::get('/family/create',[FamilyController::class,'create'])->name('family.create');
Route::post('/family/store',[FamilyController::class,'store'])->name('family.store');
Route::get('/family/edit/{id}',[FamilyController::class,'edit'])->name('family.edit');
Route::put('/family/update/{id}',[FamilyController::class,'update'])->name('family.update');
Route::delete('/family/delete/{id}',[FamilyController::class,'destroy'])->name('family.destroy');


Route::get('/age', function(){
    return view('user');
});

Route::get('/no-access', function(){
    return view('no-access');
})->name('no.access');

// Age check
Route::get('/welcome', function () {
    return view('welcome-age');
})->name('welcome')->middleware('check.age');

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
});

// User Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');
});

// Testing
Route::get('/form', [TestController::class, 'show']);
Route::post('/form', [TestController::class, 'submit'])->name('form.submit');

// Query builder employer
Route::get('/employers', [EmployerEmployeeController::class, 'index']);

// City
Route::get('/cities', [CityTownshipController::class, 'index'])->name('cities.index');

// Product
Route::get('/products' , [ProductController::class, 'index'])->name('products.index');

// Public user form (simple age input view)
Route::get('/user', function () {
    return view('user');
})->name('user');

// Excel Import/Export
Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
Route::get('/students/template', [StudentController::class, 'template'])->name('students.template');

Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Laravel using Gmail SMTP.', function ($message) {
            $message->to('hlaingphyothu97@gmail.com')
                    ->subject('Laravel Gmail SMTP Test');
    });
})->name('send.test.email');