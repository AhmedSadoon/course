<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class coursesController extends Controller
{
      public function index(){
        $data=course::all();
        return view("courses.index",['data'=>$data]);
    }
}
