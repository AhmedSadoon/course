<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingCoursesRequest;
use App\Models\course;
use App\Models\Training_courses;
use App\Models\training_courses_enrolments;
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
        $data=Training_courses::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('training_courses.index')->with('error','غير قادر للوصول الى البيانات');

        }
         $courses=course::select('id','name')->where('active',1)->get();

        return view('Training_courses.edit',['data'=>$data,'courses'=>$courses]);
    }

    public function update(TrainingCoursesRequest $request, $id){
        $Training_courses=Training_courses::findOrFail( $id );
        if(empty($Training_courses)){
                    return redirect()->route('training_courses.index')->with('error','غير قادر للوصول الى البيانات');

        }

        $Training_courses->courseID=$request->courseID;
        $Training_courses->start_date=$request->start_date;
        $Training_courses->end_date=$request->end_date;
        $Training_courses->price=$request->price;
        $Training_courses->notes=$request->notes;


        $Training_courses->save();
        return redirect()->route('training_courses.index')->with('success','تم تعديل بيانات الدورة بنجاح');

    }

    public function destroy($id){
         $data=Training_courses::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('training_courses.index')->with('error','غير قادر للوصول الى البيانات');

        }
        $data->delete();

                return redirect()->route('training_courses.index')->with('success','تم حذف الدورة بنجاح');


    }

      public function detalis($id){
         $data=Training_courses::findOrFail( $id );
        if(empty($data)){
                    return redirect()->route('training_courses.index')->with('error','غير قادر للوصول الى البيانات');

        }
                 $data['couser_name']=course::where('id','=',$data['courseID'])->value('name');
                $data['studentCounter']=training_courses_enrolments::where('training_coursesID','=',$id)->count();
                return view('training_courses.detalis',['data'=>$data]);


    }
}
