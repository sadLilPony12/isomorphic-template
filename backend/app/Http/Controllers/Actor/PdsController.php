<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Pds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use MongoDB\BSON\UTCDateTime;

class PdsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find($pds)
    {
        $pds=Pds::whereUserId($pds)->first();
        return  $pds;
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
     * @param  \App\Models\Pds  $pds
     * @return \Illuminate\Http\Response
     */
    public function show(Pds $pds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pds  $pds
     * @return \Illuminate\Http\Response
     */
    public function edit(Pds $pds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pds  $pds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pds $pds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pds  $pds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pds $pds)
    {
        //
    }
}
