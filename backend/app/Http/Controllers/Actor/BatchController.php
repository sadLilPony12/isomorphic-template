<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Level;
use App\Models\Actor\User;
use App\Models\Headquarter\Batch;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Http\Controllers\Controller;
class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $batch=Batch::orderBy('_id', 'desc')
                       ->get();
        return Response::json($batch);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $batch=Batch::Create([
            'school_id' => $request->school_id,
            'SY'        => $request->SY,
            'semester'  => (int)$request->semester,
            'status'    => 'pending',
            'stages'    => $request->stages,
            'e_start'   => $request->e_start,
            'e_end'     => $request->e_end,
            'c_start'   => $request->c_start,
            'c_end'     => $request->c_end
        ]);
        return response()->json($batch);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        return response()->json($batch);
    }

    public function enrollment()
    {
        $levels=Level::with('user')
                    ->get();
          return response()->json($levels);
    }
    public function enroll(Batch $batch)
    {
        $levels=Level::all();
        return view('batch.enroll', compact('batch', 'levels'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $batch->update([
            'school_id' => $request->school_id,
            'SY'        => $request->SY,
            'semester'  => (int)$request->semester,
            'stages'    => $request->stages,
            'e_start'   => $request->e_start,
            'e_end'     => $request->e_end,
            'c_start'   => $request->c_start,
            'c_end'     => $request->c_end
        ]);
        return response()->json($batch);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
