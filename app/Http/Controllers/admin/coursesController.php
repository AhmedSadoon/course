<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class coursesController extends Controller
{
      public function index(){
        return view("courses.index");
    }
}
