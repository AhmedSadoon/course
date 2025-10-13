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




//------------------end courses----------------
