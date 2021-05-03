<?php

namespace App\Http\Controllers\Classroom;

use App\Models\Classroom\Classroom;
use App\Models\Actor\Faculty;
use App\Models\Actor\Subject;
use App\Models\Enrollment\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClassroomController extends Controller
{
    public function index(Request $request) 
        {
            $classroom=Classroom::whereNull('deleted_at')
                                ->get();
            return response()->json($classroom);
        }
    
    public function look(Request $request) 
        {
            $designation=Classroom::whereNull('deleted_at')
                                ->whereLevelId((int)$request->level)
                                ->whereSectionId((int)$request->section)
                                ->whereBatchId($request->batch)
                                ->first();
            return response()->json($designation);
        }
    public function list(Request $request)
        {
            $classroom=Classroom::whereNull('deleted_at')
                               ->whereSectionId((int)$request->section)
                                ->get();
            return response()->json($classroom);
        }
     public function updateOrCreate (Request $request)
        {
            $subjects=Subject::whereLevelId((int)$request->level_id)->get();
            $schedules=[];
            foreach ($subjects as $key ) {
                $val['id']=$key->_id;
                $val['name']=$key->name;
                $val['code']=$key->code;
                array_push( $schedules,$val);
            }
            $classroom=Classroom::updateOrCreate( 
                [
                    'batch_id'   => $request->batch_id,
                    'level_id'   => $request->level_id,
                    'section_id' => $request->section_id,
                    'position'   => $request->position,
                ],
                [
                    'faculty_id' => $request->faculty_id,
                    'user_id'    => $request->user_id,
                    'room'       => $request->room,
                    'schedules'  => $schedules
                ]
        );
        // $user=Faculty::update(['classroom_id' =>$request->faculty_id]);
        $state = $classroom->wasRecentlyCreated?201:200;
        return response()->json($classroom, $state);
        }
    public function save(Request $request) 
        {
            $classroom=Classroom::create($request->all());
            return response()->json($classroom);
        }
    public function update (Request $request, Classroom $classroom)
        {
            $classroom->update($request->all());
            return response()->json($classroom);    
        }
    public function destroy(Classroom $classroom)
        {
            $classroom->update([
                'faculty_id' => null,
                'position'     => null,
                'room'         => null
            ]);
            return response()->json(array('success'=>true));
        }

    public function find(Classroom $classroom)
        {
            return response()->json($classroom, 200);
        } 
    public function active(Request $request)
        {
            $current = Carbon::now()->format('Y-m-d');
            $registration=Classroom::whereNull('deleted_at')
                        ->whereFacultyId ($request->faculty)
                        ->whereHas('batch', function($batch)use($current){
                            $batch->where('e_start', '<=', $current)
                            ->where('e_end', '>=', $current);
                        })
                        ->first();
            return response()->json($registration, 200);
        }   
}
