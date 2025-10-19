<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingCoursesRequest;
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
            $courses=course::select('id','name')->where('active',1)->get();

                return view("Training_courses.create",['courses'=>$courses]);

    }

     public function store(TrainingCoursesRequest $request){



        $Training_courses=new Training_courses();
        $Training_courses->courseID=$request->courseID;
        $Training_courses->price=$request->price;
        $Training_courses->start_date=$request->start_date;
        $Training_courses->end_date=$request->end_date;
        $Training_courses->notes=$request->notes;

        $Training_courses->save();
        return redirect()->route('training_courses.index')->with('success','تم اضافة الكورس بنجاح');
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
