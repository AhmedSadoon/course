<?php

use App\Http\Controllers\admin\coursesController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\Training_coursesController;
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

//------------------start student----------------
Route::get('student', [StudentController::class,'index'])->name('student.index');
Route::get('create_student', [StudentController::class,'create'])->name('student.create');
Route::post('store_student', [StudentController::class,'store'])->name('student.store');
Route::get('edit_student/{id}', [StudentController::class,'edit'])->name('student.edit');
Route::post('update_student/{id}', [StudentController::class,'update'])->name('student.update');
Route::get('destroy_student/{id}', [StudentController::class,'destroy'])->name('student.destroy');

//------------------end student----------------

//------------------start training_courses----------------
Route::get('training_courses', [Training_coursesController::class,'index'])->name('training_courses.index');
Route::get('create_training_courses', [Training_coursesController::class,'create'])->name('training_courses.create');
Route::post('store_training_courses', [Training_coursesController::class,'store'])->name('training_courses.store');
Route::get('edit_training_courses/{id}', [Training_coursesController::class,'edit'])->name('training_courses.edit');
Route::post('update_training_courses/{id}', [Training_coursesController::class,'update'])->name('training_courses.update');
Route::get('destroy_training_courses/{id}', [Training_coursesController::class,'destroy'])->name('training_courses.destroy');
Route::get('detalis_training_courses/{id}', [Training_coursesController::class,'detalis'])->name('training_courses.detalis');

//------------------end training_courses----------------
