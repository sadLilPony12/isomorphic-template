<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Guardian;
use App\Models\Actor\Student;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // whereHas('advisories', function($advisories) use($request){
        //                             $advisories->whereBatchId($request->school);
        //                     })
        //                     ->
        $guardians= Guardian::limit(20)
                            ->get();
        return Response::json($guardians);
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
        $guardian=Guardian::Create([
            'id' => $request->gid,
            'lname' => $request->glname,
            'fname' => $request->gfname,
            'suffix' => $request->gename,
            'mname' => $request->gmname
        ],
        [
            'lname'    => $request->glname,
            'fname'    => $request->gfname,
            'mname'    => $request->gmname,
            'suffix'    => $request->gename,
            'phone'    => $request->gphone,
            'brgy'     => $request->gbrgy,
            'muni'     => $request->gmuni,
            'province' => $request->gprovince,
        ]);
                // $state = $guardian->wasRecentlyCreated?201:200;
                return response()->json($guardian);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function show(Guardian $guardian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return $guardian=Guardian::find($id);
       $student=Student::find($id);
        if($student->guardian->id !=null){
            return Guardian::find($student->guardian->id);
        }else{
            return null;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guardian $guardian)
    {
        $guardian->update(
        [
            'lname'    => $request->lname,
            'fname'    => $request->fname,
            'mname'    => $request->mname,
            'suffix'   => $request->ename,
            'phone'    => $request->phone,
            'brgy'     => $request->brgy,
            'muni'     => $request->muni,
            'province' => $request->province,
        ]);
                return response()->json($guardian);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guardian $guardian)
    {
        //
    }
}
