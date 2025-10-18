<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Models\course;
use Illuminate\Http\Request;

class coursesController extends Controller
{
      public function index(){
        $data=course::all();
        return view("courses.index",['data'=>$data]);
    }

    public function create(){
                return view("courses.create");

    }

    public function store(CreateCourseRequest $request){
        $couter=course::where("name",$request->name)->count();
        if( $couter > 0){
                    return redirect()->back()->with("error","عفوا اسم الكورس مسجل سابقا")->withInput();

        }

        $course=new Course();
        $course->name=$request->name;
        $course->active=$request->active;

        $course->save();
        return redirect()->route('courses.index')->with('success','تم اضافة الكورس بنجاح');
    }

    public function edit($id){
        $data=course::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('courses.index')->with('error','غير قادر للوصول الى البيانات');

        }
        return view('courses.edit',['data'=>$data]);
    }

    public function update(CreateCourseRequest $request, $id){
        $data=course::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('courses.index')->with('error','غير قادر للوصول الى البيانات');

        }


        $data->name=$request->name;
        $data->active=$request->active;

        $data->save();
        return redirect()->route('courses.index')->with('success','تم تعديل بيانات الكورس بنجاح');

    }

}
