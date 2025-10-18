<?php

use App\Http\Controllers\admin\coursesController;
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
