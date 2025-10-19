<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\Training_courses;
use Illuminate\Http\Request;

class Training_coursesController extends Controller
{
    public function index(){
        $data=Training_courses::all();
        if(!empty($data)){
            foreach($data as $info){
                 $info->couser_name=course::where('id','=',$info->courseID)->value('name');
            }
        }
        return view("Training_courses.index",['data'=>$data]);
    }

       public function create(){
                return view("Training_courses.create");

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

        //upload image
        if($request->has("image")){
            $image=$request->image;
            $extension=strtolower($image->extension());
            $fileName=time().rand(1,1000).".".$extension;

            $image->move('uploads',$fileName);
        }
        $Student->image=$fileName;


        $Student->nationalID=$request->nationalID;
        $Student->notes=$request->notes;
        $Student->active=$request->active;

        $Student->save();
        return redirect()->route('student.index')->with('success','تم اضافة الطالب بنجاح');
    }

    public function edit($id){
        $data=Student::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('student.index')->with('error','غير قادر للوصول الى البيانات');

        }
        return view('student.edit',['data'=>$data]);
    }

    public function update(StudentRequest $request, $id){
        $Student=Student::findOrFail( $id );
        if(empty($Student)){
                    return redirect()->route('student.index')->with('error','غير قادر للوصول الى البيانات');

        }

        $Student->name=$request->name;
        $Student->phone=$request->phone;
        $Student->address=$request->address;

        //upload image
        if($request->has("image")){
            $image=$request->image;
            $extension=strtolower($image->extension());
            $fileName=time().rand(1,1000).".".$extension;

            $image->move('uploads',$fileName);
            $Student->image=$fileName;
        }



        $Student->nationalID=$request->nationalID;
        $Student->notes=$request->notes;
        $Student->active=$request->active;

        $Student->save();
        return redirect()->route('student.index')->with('success','تم تعديل بيانات الطالب بنجاح');

    }

    public function destroy($id){
         $data=Student::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('student.index')->with('error','غير قادر للوصول الى البيانات');

        }
        $data->delete();

                return redirect()->route('student.index')->with('success','تم حذف الطالب بنجاح');


    }
}
