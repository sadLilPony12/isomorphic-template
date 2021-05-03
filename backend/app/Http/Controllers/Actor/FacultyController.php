<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            //
        }
    public function list(Request $request)
        {
            $facultyies=Faculty::whereNull('deleted_at')
                        // ->whereSchoolId($request->school)
                        ->whereRoleId('6028f7713e320000f40026c1')
                        ->get();
            
            return response()->json($facultyies);  
        }
        
    public function department(Request $request)
        {
            $facultyies=Faculty::whereNull('deleted_at')
                        // ->whereSchoolId($request->school)
                        ->whereRoleId('6028f7713e320000f40026c1')
                        ->whereDepartmentId($request->department)
                        ->get();
            return response()->json($facultyies);  
        }
    public function look(Request $request)
        {
            $facultyies=Faculty::whereNull('deleted_at')
                        ->whereSchoolId($request->school)
                        ->whereIn('role_id',['6028f7713e320000f40026c1', '6028f7713e320000f40026c2'])
                        ->get();
            
            return response()->json($facultyies);  
        }
    public function position(Request $request)
    {
      $faculty=Faculty::find($request->pk);
      return $faculty->handel;
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
     * @param  \App\Models\Actor\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
