<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\User;
use App\Notifications\createStudent;
use App\Traits\GaneralTaits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    use GaneralTaits;
       public function index(){
        //$this->ahmed();
        $data=Student::paginate(10);
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
        //ارسال اشعار لكل المستخدمين
        $users=User::select('id')->get();
        $content='تم اضافة طالب جديد بأسم '. $request->name;
        Notification::send($users,new createStudent($request->name,$content));
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

     public function ajax_search_student(Request $request){

        if($request->ajax()){
            $name=$request->name;
            $data=Student::where('name','like',"%{$name}%")->paginate(1);

        }

        return view('student.ajax_search_student',['data'=>$data]);

    }

}
