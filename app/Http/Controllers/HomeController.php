<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SchoolClass;
use App\Models\StudentInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function postaddClass(Request $request){

        // dd($request->all());
        
        $request->validate([
            'class' => 'required|integer',
            'section' => 'required|in:sun,moon,star'
        ]);

        $class = $request->input('class');
        $section = $request->input('section');
        $slug = Str::slug($class. '' . $section);

        $schoolClass  = new SchoolClass;
        $schoolClass->class=$class;
        $schoolClass->section=$section;
        $schoolClass->slug=$slug;

        $schoolClass ->save();

        return redirect()->back()->with('success', 'Class added successfully');


    }

    public function posteditClass(Request $request, $slug){
        
        $schoolClass = SchoolClass::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if(is_null($schoolClass)){
            return redirect()->back()->with('error', 'Class not found');
        }

        
        $request->validate([
            'class' => 'required|integer',
            'section' => 'in:sun,moon,star'
        ]);

        $class = $request->input('class');
        $section = $request->input('section');
        $slug = Str::slug($class. '' . $section);

        $schoolClass->class=$class;
        $schoolClass->section=$section;
        $schoolClass->slug=$slug;

        $schoolClass ->save();
        return redirect()->route('getClassManage')->with('success', 'Class Edited successfully');

    }

    public function getdeleteClass($slug){
        
        $schoolClass = SchoolClass::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if(is_null($schoolClass)){
            return redirect()->back()->with('error', 'Class not found');
        }

        $schoolClass->forceDelete();

        return redirect()->back()->with('success', 'Class deleted successfully');


    }


    // Student add, edit, delelte all logic are written below:

    public function postaddStudent(Request $request){
        // dd($request->all());

        $request->validate([
            'student_name' => 'required|string',
            'class' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'section' => 'required|in:sun,moon,star',
            'father_name' => 'required|string',
            'father_occupation' => 'required|string',
            'father_contact' => 'required|integer',
            'mother_name' => 'required|string',
            'mother_occupation' => 'required|string',
            'mother_contact' => 'required|integer',
            'permanent_district' => 'required|string',
            'permanent_municipality' => 'required|string',
            'permanent_ward_no' => 'required|integer',
            'permanent_tole' => 'required|string',
            'current_district' => 'required|string',
            'current_municipality' => 'required|string',
            'current_ward_no' => 'required|integer',
            'current_tole' => 'required|string',
        ]);

        $student_name = $request->input('student_name');
        $class = $request->input('class');
        $section = $request->input('section');
        $father_name = $request->input('father_name');
        $father_occupation = $request->input('father_occupation');
        $father_contact = $request->input('father_contact');
        $mother_name = $request->input('mother_name');
        $mother_occupation = $request->input('mother_occupation');
        $mother_contact = $request->input('mother_contact');
        $permanent_district = $request->input('permanent_district');
        $permanent_municipality = $request->input('permanent_municipality');
        $permanent_ward_no = $request->input('permanent_ward_no');
        $permanent_tole = $request->input('permanent_tole');
        $current_district = $request->input('current_district');
        $current_municipality = $request->input('current_municipality');
        $current_ward_no = $request->input('current_ward_no');
        $current_tole = $request->input('current_tole');
        $slug = Str::slug($student_name . '' . $class . $section);

        // dd($slug);

        $studentInfo = new StudentInfo;

        $studentInfo->student_name=$student_name;
        $studentInfo->class=$class;
        $studentInfo->section=$section;
        $studentInfo->father_name=$father_name;
        $studentInfo->father_occupation=$father_occupation;
        $studentInfo->father_contact=$father_contact;
        $studentInfo->mother_name=$mother_name;
        $studentInfo->mother_occupation=$mother_occupation;
        $studentInfo->mother_contact=$mother_contact;
        $studentInfo->permanent_district=$permanent_district;
        $studentInfo->permanent_municipality=$permanent_municipality;
        $studentInfo->permanent_ward_no=$permanent_ward_no;
        $studentInfo->permanent_tole=$permanent_tole;
        $studentInfo->current_district=$current_district;
        $studentInfo->current_municipality=$current_municipality;
        $studentInfo->current_ward_no=$current_ward_no;
        $studentInfo->current_tole=$current_tole;
        $studentInfo->slug=$slug;

        // dd($studentInfo);

        $studentInfo->save();
        return redirect()->back()->with('success', 'Student Info Added Successfully!!');
    }

    public function geteditStudent($slug){

        $data = [
            'schoolClasses' => SchoolClass::where('deleted_at', null)->orderBy('class', 'asc')->pluck('class')->unique()->toArray(),
            'StudentInfo' => StudentInfo::where('deleted_at', null)->limit(1)->first()
        ];

        return view('admin.student.edit', $data);
    }

    public function posteditStudent(Request $request, $slug){
        // dd($request->all());

        $studentInfo = StudentInfo::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if(is_null($studentInfo)){
            return redirect()->back()->with('error', 'Student Information does not found');
        }

        
        $request->validate([
            'student_name' => 'string',
            'class' => 'in:1,2,3,4,5,6,7,8,9,10',
            'section' => 'in:sun,moon,star',
            'father_name' => 'string',
            'father_occupation' => 'string',
            'father_contact' => 'integer',
            'mother_name' => 'string',
            'mother_occupation' => 'string',
            'mother_contact' => 'integer',
            'permanent_district' => 'string',
            'permanent_municipality' => 'string',
            'permanent_ward_no' => 'integer',
            'permanent_tole' => 'string',
            'current_district' => 'string',
            'current_municipality' => 'string',
            'current_ward_no' => 'integer',
            'current_tole' => 'string',
        ]);

        $student_name = $request->input('student_name');
        $class = $request->input('class');
        $section = $request->input('section');
        $father_name = $request->input('father_name');
        $father_occupation = $request->input('father_occupation');
        $father_contact = $request->input('father_contact');
        $mother_name = $request->input('mother_name');
        $mother_occupation = $request->input('mother_occupation');
        $mother_contact = $request->input('mother_contact');
        $permanent_district = $request->input('permanent_district');
        $permanent_municipality = $request->input('permanent_municipality');
        $permanent_ward_no = $request->input('permanent_ward_no');
        $permanent_tole = $request->input('permanent_tole');
        $current_district = $request->input('current_district');
        $current_municipality = $request->input('current_municipality');
        $current_ward_no = $request->input('current_ward_no');
        $current_tole = $request->input('current_tole');
        $slug = Str::slug($student_name . '' . $class . $section);

        // dd($StudentInfo->student_name);

        $studentInfo->student_name=$student_name;
        $studentInfo->class=$class;
        $studentInfo->section=$section;
        $studentInfo->father_name=$father_name;
        $studentInfo->father_occupation=$father_occupation;
        $studentInfo->father_contact=$father_contact;
        $studentInfo->mother_name=$mother_name;
        $studentInfo->mother_occupation=$mother_occupation;
        $studentInfo->mother_contact=$mother_contact;
        $studentInfo->permanent_district=$permanent_district;
        $studentInfo->permanent_municipality=$permanent_municipality;
        $studentInfo->permanent_ward_no=$permanent_ward_no;
        $studentInfo->permanent_tole=$permanent_tole;
        $studentInfo->current_district=$current_district;
        $studentInfo->current_municipality=$current_municipality;
        $studentInfo->current_ward_no=$current_ward_no;
        $studentInfo->current_tole=$current_tole;
        $studentInfo->slug=$slug;

        $studentInfo->save();
        return redirect()->route('getStudentManage')->with('success', 'Student Information Edited Successfully!!');
    }

    public function getdeleteStudent($slug){
        
        $studentInfo = StudentInfo::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if(is_null($studentInfo)){
            return redirect()->back()->with('error', 'Student Information does not found');
        }

        $studentInfo->forceDelete();

        return redirect()->back()->with('success', 'Class deleted successfully');


    }
}