<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Enrollment\Load;
use Illuminate\Http\Request;
use App\Models\Actor\Faculty;
use App\Http\Controllers\Controller;
use Response, Carbon\Carbon;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
        {
            $faculties=Faculty::whereNull('deleted_at')
                                ->whereSchoolId($request->school)
                                ->whereNotNull('role_id')
                                ->Wherehas('role', function($role){
                                    $role->where('name', '!=', 'dev');
                                })
                                ->get();
            return response()->json($faculties);
        }
    public function access(Request $request) 
            {
                $faculties=Faculty::whereNull('deleted_at')
                                    ->whereSchoolId($request->school)
                                    ->whereRoleId('6028f7713e320000f40026c1')
                                    // ->where(function ($q) use($request){
                                    //    $q->platforms->hasOne($request->stage);                                    
                                    // })
                                    ->with('accessloads')
                                    ->get();
                return response()->json($faculties);
            }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
       $accessloads=Load::all();
        return response()->json($accessloads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function save(Request $request)
        {
            $accessload=Load::create ($request->all());
            return response()->json($accessload, 200);
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Load  $load
     * @return \Illuminate\Http\Response
     */
    public function show(Load $load)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Load  $load
     * @return \Illuminate\Http\Response
     */
    public function edit(Load $load)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Load  $load
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Load $load)
        {
            // return$request->subjects;
            $load->update([
                'subjects' => $request->subjects,
                'Faculty_id'  => $request->Faculty_id,
            ]);
            return response()->json($load, 201);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Load  $load
     * @return \Illuminate\Http\Response
     */
    public function destroy(Load $load)
    {
        //
    }
    public function updateOrCreate(Request $request)
        {       
        $teachingLoad=Load::whereFacultyId($request->faculty_id)
                            ->whereBatchId($request->batch_id)
                            ->first();
                $value['classroom_id']=$request->classroom_id;
                $value['subject_id']=$request->subject_id;
                $value['name']=$request->name;
                $value['code']=$request->code;
            if ($teachingLoad) {
                $schedules=$teachingLoad->schedules;
                array_push($schedules,$value);
               $teachingLoad->update(['schedules' =>$schedules]);
            return response()->json($teachingLoad, 201);
            }else{
                $newSchedules=[];
                array_push($newSchedules,$value);
                 $teachingLoad=Load::create([
                    'batch_id'  => $request->batch_id,
                    'faculty_id'  => $request->faculty_id,
                    'schedules'  => $newSchedules,
                 ]);
            return response()->json($teachingLoad, 200);
            }
        }
    public function active(Request $request)
        {
            $current = Carbon::now()->format('Y-m-d');
            $load=Load::whereFacultyId($request->faculty)
                        ->whereHas('batch', function($batch) use($current){
                            $batch->where('e_start', '<=', $current)
                            ->where('e_end', '>=', $current);
                        })
                        ->first();
            return response()->json($load, 200);
        }
}
