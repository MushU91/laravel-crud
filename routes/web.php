<?php

use App\Http\Controllers\OJT\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/greeting',function(){
    return 'zelo';
});

Route::get('/students',[StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::get('/students/{id}/edit', [StudentController::class,'edit'])->name('students.edit');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');