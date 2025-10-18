<?php

use App\Http\Controllers\admin\coursesController;
use App\Http\Controllers\admin\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


//------------------start courses----------------
Route::get('courses', [coursesController::class,'index'])->name('courses.index');
Route::get('create_courses', [coursesController::class,'create'])->name('courses.create');
Route::post('store_courses', [coursesController::class,'store'])->name('courses.store');
Route::get('edit_courses/{id}', [coursesController::class,'edit'])->name('courses.edit');
Route::post('update_courses/{id}', [coursesController::class,'update'])->name('courses.update');
Route::get('destroy_courses/{id}', [coursesController::class,'destroy'])->name('courses.destroy');

//------------------end courses----------------

//------------------start courses----------------
Route::get('student', [StudentController::class,'index'])->name('student.index');
Route::get('create_student', [StudentController::class,'create'])->name('student.create');
Route::post('store_student', [StudentController::class,'store'])->name('student.store');
Route::get('edit_student/{id}', [StudentController::class,'edit'])->name('student.edit');
Route::post('update_student/{id}', [StudentController::class,'update'])->name('student.update');
Route::get('destroy_student/{id}', [StudentController::class,'destroy'])->name('student.destroy');

//------------------end courses----------------
