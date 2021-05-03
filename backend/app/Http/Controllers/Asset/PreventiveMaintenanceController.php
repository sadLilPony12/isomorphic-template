<?php

namespace App\Http\Controllers\Asset;

use App\Models\Asset\Equipment;
use App\Models\Actor\User;
use App\Models\Asset\PreventiveMaintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreventiveMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preventivemaintenances=PreventiveMaintenance::all();
        return view('Assets.preventiveMaintenance.index', compact('preventivemaintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $machine=Machine::find($request->id);
        $users=User::all();
        return view('Assets.preventiveMaintenance.create', compact('machine', 'users'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preventivemaintenances=PreventiveMaintenance::create ($request->all());
        return redirect('/machines')
        ->with('success', 'You Have Updated the Machines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset\PreventiveMaintenance  $preventiveMaintenance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preventivemaintenances=PreventiveMaintenance::whereMachineId($id)->get();
        $machine=Machine::find($id);
        return view('Assets.preventiveMaintenance.index', compact('preventivemaintenances', 'machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset\PreventiveMaintenance  $preventiveMaintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $pm=PreventiveMaintenance::find($id);
        $machine=Machine::find($pm->machine_id);
        $users=User::all();
        return view('Assets.preventiveMaintenance.Edit', compact('pm', 'machine', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset\PreventiveMaintenance  $preventiveMaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $pm=PreventiveMaintenance::find($id);
        $input = $request->all();
        $pm->fill($input)->save();
      return redirect('\machines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset\PreventiveMaintenance  $preventiveMaintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreventiveMaintenance $preventiveMaintenance)
    {
        //
    }
}
