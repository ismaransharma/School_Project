<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\StudentInfo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getHome(){


        return view('site.index');
    }

    public function getStudentInfo(){

        $data = [
            'schoolClasses' => SchoolClass::where('deleted_at', null)->orderby('class', 'asc')->orderByRaw("CASE WHEN section = 'sun' THEN 1 WHEN section = 'moon' THEN 2 WHEN section = 'star' THEN 3 END")->get()
        ];

        return view('site.studentInfo', $data);
    }

    public function getClass(){

        $data = [
            'studentInfo' => studentInfo::where('deleted_at', null)->orderby('class', 'asc')->orderByRaw("CASE WHEN section = 'sun' THEN 1 WHEN section = 'moon' THEN 2 WHEN section = 'star' THEN 3 END")->get()
        ];

        return view('site.class', $data);
    }

    public function getClassManage(){
        
        $data = [
            'schoolClasses' => SchoolClass::where('deleted_at', null)->orderby('class', 'asc')->orderByRaw("CASE WHEN section = 'sun' THEN 1 WHEN section = 'moon' THEN 2 WHEN section = 'star' THEN 3 END")->get()
        ];

        return view('admin.class.manage', $data);
    }

    public function geteditClass(Request $request, $slug){

        $data = [
            'schoolClasses' => SchoolClass::where('slug', $slug)->where('deleted_at', null)->limit(1)->first()
        ];

        return view('admin.class.edit', $data);
    }

    public function getStudentManage(){
        $data = [
            'schoolClasses' => SchoolClass::where('deleted_at', null)->orderBy('class', 'asc')->pluck('class')->unique()->toArray(),
            'StudentInfos' => StudentInfo::where('deleted_at', null)->get()

        ];
    
        return view('admin.student.manage', $data);
    }
}