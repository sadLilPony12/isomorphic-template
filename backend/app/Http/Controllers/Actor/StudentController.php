<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Student;
use App\Models\Actor\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(Request $request)
        {
            $students = Student::whereNull('deleted_at')
                                ->whereSchoolId($request->school)
                                ->whereNull('role_id')
                                ->where(function ($q) use ($request){
                                    if($request->key){
                                        $q->Where('fname', 'like', "%{$request->key}%");
                                    }
                                })
                                ->whereHas('lastname', function ($lname) use ($request){
                                    if($request->lname){
                                        $lname->Where('name', 'like', "%{$request->lname}%");
                                    }
                                })
                                ->get();
            return response()->json($students);
        }
 
    public function find( $student)
        {
            $student=Student::with('advisories')->find( $student);
            return response()->json($student);
        }
    public function update(Request $request, Student $student)
        {

            $section=Section::where('_id', 'like', $request->section )->first();
            $arr=$section->studentsArr;
            array_push($arr,$request->student);
             $section->update(['studentsArr'   => $arr]);
            $student->update($request->all());
            return response()->json($student, 201);
        }
}
