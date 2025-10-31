<?php

use App\Http\Controllers\OJT\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/greeting',function(){
    return 'zelo';
});

Route::get('/contact',function (){
    return view('students.contact');
})->name('contact');

Route::get('/about', function(){
    return view('students.about');
})->name('about');


Route::get('/students',[StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::get('/students/{id}/edit', [StudentController::class,'edit'])->name('students.edit');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::put('/students/{id}',[StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');