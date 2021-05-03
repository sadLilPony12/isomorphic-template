<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Classroom\Advisory;
use App\Models\Actor\Level;
use App\Models\Actor\Student;
use App\Models\Actor\Guardian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $advisory=Advisory::whereNull('deleted_at')
                            ->whereHas('designation', function($batch) use($request){
                                $batch->whereBatchId($request->batch)
                                ->whereLevelId((int)$request->level)
                                ->whereSectionId((int)$request->section);
                            })
                            ->get();
        return response()->json($advisory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
        {
            $student = Student::with('advisories')->find($id);
            $guardians = Guardian::all();
            return view('enrollment.form.index', compact('student','guardians'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
    public function destroy(Advisory $advisory)
    {
        //
    }

    public function history(Request $request, $student)
    {
            $history = Advisory::whereStudentId ($student)
                        ->with('designation')
                        ->get();
            return $history;
    }   
}
