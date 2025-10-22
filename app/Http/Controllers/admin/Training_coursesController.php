<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoAddStudentToCourseRequest;
use App\Http\Requests\TrainingCoursesRequest;
use App\Models\course;
use App\Models\Student;
use App\Models\Training_courses;
use App\Models\training_courses_enrolments;
use Illuminate\Http\Request;

class Training_coursesController extends Controller
{
    public function index()
    {
        $data = Training_courses::all();
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->couser_name = course::where('id', '=', $info->courseID)->value('name');
            }
        }
        return view("Training_courses.index", ['data' => $data]);
    }

    public function create()
    {
        $courses = course::select('id', 'name')->where('active', 1)->get();

        return view("Training_courses.create", ['courses' => $courses]);
    }

    public function store(TrainingCoursesRequest $request)
    {



        $Training_courses = new Training_courses();
        $Training_courses->courseID = $request->courseID;
        $Training_courses->price = $request->price;
        $Training_courses->start_date = $request->start_date;
        $Training_courses->end_date = $request->end_date;
        $Training_courses->notes = $request->notes;

        $Training_courses->save();
        return redirect()->route('training_courses.index')->with('success', 'تم اضافة الكورس بنجاح');
    }

    public function edit($id)
    {
        $data = Training_courses::findOrFail($id);
        if (empty($data)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }
        $courses = course::select('id', 'name')->where('active', 1)->get();

        return view('Training_courses.edit', ['data' => $data, 'courses' => $courses]);
    }

    public function update(TrainingCoursesRequest $request, $id)
    {
        $Training_courses = Training_courses::findOrFail($id);
        if (empty($Training_courses)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }

        $Training_courses->courseID = $request->courseID;
        $Training_courses->start_date = $request->start_date;
        $Training_courses->end_date = $request->end_date;
        $Training_courses->price = $request->price;
        $Training_courses->notes = $request->notes;


        $Training_courses->save();
        return redirect()->route('training_courses.index')->with('success', 'تم تعديل بيانات الدورة بنجاح');
    }

    public function destroy($id)
    {
        $data = Training_courses::findOrFail($id);
        if (empty($data)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }
        $data->delete();

        return redirect()->route('training_courses.index')->with('success', 'تم حذف الدورة بنجاح');
    }

    public function detalis($id)
    {
        $data = Training_courses::findOrFail($id);
        if (empty($data)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }
        $data['couser_name'] = course::where('id', '=', $data['courseID'])->value('name');
        $data['studentCounter'] = training_courses_enrolments::where('training_coursesID', '=', $id)->count();
        $training_courses_enrolments=training_courses_enrolments::select('*')->where('training_coursesID', '=', $id)->get();

        if(!empty($training_courses_enrolments)){
            foreach($training_courses_enrolments as $info){
                $info->student_name = student::where('id', '=', $info->studentID)->value('name');

            }
        }
        return view('training_courses.detalis', ['data' => $data,'training_courses_enrolments'=>$training_courses_enrolments]);
    }

    public function AddStudentToTrainingCourses($id)
    {
        $data = Training_courses::findOrFail($id);
        if (empty($data)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }

        $student=Student::select('id','name')->where('active',1)->get();
        return view('Training_courses.AddStudentToTrainingCourses', ['student' => $student,'data'=>$data]);

    }


      public function DoAddStudentToTrainingCourses(DoAddStudentToCourseRequest $request,$id)
    {
        $data = Training_courses::findOrFail($id);
        if (empty($data)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }

                $studentCounter = training_courses_enrolments::where('training_coursesID', '=', $id)->where('studentID','=',$request->studentID)->count();
        if($studentCounter>0){
                        return redirect()->route('training_courses.detalis',$id)->with('error', 'هذا الطالب مسجل سابقا');

        }

        $dataToInsert['training_coursesID']=$id;
        $dataToInsert['studentID']=$request->studentID;
        $dataToInsert['enrolments_date']=$request->enrolments_date;
        training_courses_enrolments::create($dataToInsert);
       return redirect()->route('training_courses.detalis',$id)->with('success', 'تم تسجيل الطالب');


    }

     public function deleteStudentFromTrainingCourses($id)
    {
        $data_enrolments = training_courses_enrolments::findOrFail($id);
        if (empty($data_enrolments)) {
            return redirect()->route('training_courses.index')->with('error', 'غير قادر للوصول الى البيانات');
        }

        $data_enrolments->delete();
        return redirect()->route('training_courses.detalis',$data_enrolments['training_coursesID'])->with('error', 'تم حذف الطالب');

    }

}
