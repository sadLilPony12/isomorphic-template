<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Enrollment\Scheduler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scheduler= Scheduler::whereNull('deleted_at')
                            ->whereHas('batch', function($batch) use($request){
                                $batch->whereSchoolId($request->school);
                            })
                            ->whereLevelId((int)$request->level)
                            ->whereSectionId((int)$request->section)
                            ->first();

           return response()->json($scheduler);              
    }
    public function list(Request $request, $school)
        {
            $scheduler= Scheduler::whereNull('deleted_at')
                                ->whereSchoolId($request->school)
                                ->whereLevelId((int)$request->level)
                                ->whereSectionId((int)$request->section)
                                ->first();

            return response()->json($scheduler);              
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function show(Scheduler $scheduler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrollment\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(Scheduler $scheduler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrollment\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scheduler $scheduler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheduler $scheduler)
    {
        //
    }
}
