<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubjectController extends Controller
{
    public function index()
        {
           $subjects=Subject::Where('name', '!=', 'superadmin')
                        ->whereNull('deleted_at')
                        ->orderBy('name')
                        ->get();
            return response()->json($subjects);
        }

    public function list(Request $request, $school)
        {
            $subjects= Subject::whereNull('deleted_at')
                                ->whereSchoolId($school)
                                ->where(function ($q) use ($request){
                                if($request->level<=13){
                                    $q->whereIsMajor(false);
                                }else {
                                     $q->whereIsMajor(true);
                                }
                                })
                                ->whereLevelId((int)$request->level)
                                ->get();
            return response()->json($subjects);              
        }
    public function look(Request $request)
        {
           $subjects=Subject::whereNull('deleted_at')
                        ->whereLevelId((int)$request->level)
                        ->get();
            return response()->json($subjects);
        }

    public function save(Request $request)
        {
            $subject=Subject::create ($request->all());
            return response()->json($subject, 200);
        }
    public function find( $subject)
        {
            $subject=Subject::where('_id', '=',(int)$subject)->first();
            return response()->json($subject, 201);
        }
    public function update(Request $request, Subject $subject)
        {
            $subject->update($request->all());
            return response()->json($subject, 201);
        }
    public function destroy(Subject $subject)
        {
            $subject->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $subject->update();
            return response()->json(array('success'=>true));
        }
}
