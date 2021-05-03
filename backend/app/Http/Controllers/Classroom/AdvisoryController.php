<?php

namespace App\Http\Controllers\Classroom;

use App\Models\Classroom\Advisory;
use App\Models\Actor\Level;
use App\Models\Actor\Student;
use App\Models\Actor\Guardian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response, Carbon\Carbon;

class AdvisoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            // it cant provide all the data
            $advisory=Advisory::first();
            return response()->json($advisory);
        }
    public function list(Request $request)
        {
            $advisories=Advisory::whereClassroomId($request->classroom)->get();
            return response()->json($advisories);
        }
    public function history(Request $request)
        {
            // it cant provide all the data
            $advisory=Advisory::first();
            return response()->json($advisory);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $advisory = Advisory::create($request->all());
        return Response::json($advisory);
    }


    
    public function find(Request $request)
        {
            $advisory=Advisory::whereStudentId($request->id)
                            ->whereHas('classroom', function ($cr) use($request){
                                $cr->whereBatchId($request->batch);
                            })
                            ->first();
            return response()->json($advisory);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advisory  $advisory
     * @return \Illuminate\Http\Response
     */
    public function show($id )
        {
            $level=Level::find($id);
            $advisory=Advisory::whereLevelId($id)
                                ->get();
            // return $advisory;
            return view('actors.levels.advisory', compact('advisory', 'level')); 
        }

    public function health($id )
        {
            $level=Level::find($id);
            $advisory=Advisory::whereLevelId($id)
                                ->get();
            //  return $advisory;
            return view('actors.levels.health', compact('advisory','level')); 
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advisory  $advisory
     * @return \Illuminate\Http\Response
     */
    public function edit(Advisory $advisory)
    {
        return $advisory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advisory  $advisory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advisory $advisory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advisory  $advisory
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request)
    {
        $current = Carbon::now()->format('Y-m-d');
        $advisory=Advisory::whereStudentId($request->student)
            ->whereHas('classroom', function($class)use($current){
                $class->whereHas('batch', function($batch)use($current){
                    $batch->where('e_start', '<=', $current)
                        ->where('e_end', '>=', $current);
                });
            })
            ->first();
        return response()->json($advisory, 200);
    }
}
