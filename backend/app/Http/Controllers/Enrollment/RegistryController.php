<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Actor\Registry;
// use App\Models\Actor\Student;
use Illuminate\Http\Request;
use MongoDB\BSON\UTCDateTime;
use App\Http\Controllers\Controller;
use Responce;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function look(Request $request)
        {
            $registry=Registry::whereStatus('pending')
                        ->whereUserId($request->user)
                        ->first();
            return response()->json($registry, 200);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $registry=Registry::whereStatus('pending')
                        ->whereSectionId((int)$request->section)
                        ->whereLevelId((int)$request->level)
                        ->get();
            return response()->json($registry, 200);
    }
    public function faculty(Request $request)
    {
        $registry=Registry::whereStatus('pending')
                        ->whereNotNull('department_id')
                        ->get();
            return response()->json($registry, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $registry=Registry::create($request->all());
            return response()->json($registry, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor\Registry  $registry
     * @return \Illuminate\Http\Response
     */
    public function show(Registry $registry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor\Registry  $registry
     * @return \Illuminate\Http\Response
     */
    public function find($student)
    {
        $registry=Registry::whereUser_idId($student)->get();
        return response()->json($registry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor\Registry  $registry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registry $registry)
    {
            $registry->update([
                'status'=>$request->status,
                'issue'=>$request->issue
            ]);
            
            return response()->json($registry, 200);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor\Registry  $registry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registry $registry)
    {
        //
    }
}
