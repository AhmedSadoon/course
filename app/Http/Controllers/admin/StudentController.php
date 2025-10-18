<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
       public function index(){
        $data=Student::all();
        return view("student.index",['data'=>$data]);
    }

       public function create(){
                return view("student.create");

    }

     public function store(StudentRequest $request){
        $couter=Student::where("name",$request->name)->count();
        if( $couter > 0){
                    return redirect()->back()->with("error","عفوا اسم الطالب مسجل سابقا")->withInput();

        }

        $Student=new Student();
        $Student->name=$request->name;
        $Student->phone=$request->phone;
        $Student->address=$request->address;
        $Student->image=$request->image;
        $Student->nationalID=$request->nationalID;
        $Student->notes=$request->notes;
        $Student->active=$request->active;

        $Student->save();
        return redirect()->route('student.index')->with('success','تم اضافة الطالب بنجاح');
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

    public function destroy($id){
         $data=course::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('courses.index')->with('error','غير قادر للوصول الى البيانات');

        }
        $data->delete();

                return redirect()->route('courses.index')->with('success','تم حذف الكورس بنجاح');


    }

}
