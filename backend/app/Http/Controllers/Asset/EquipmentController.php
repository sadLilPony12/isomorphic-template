<?php

namespace App\Http\Controllers\Asset;

use App\Models\Asset\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments=Equipment::all();
        return view('Assets.equipment.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Assets.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = Auth::user();
        $input = $request->all();
      
        $po = $user->equipments()->save(
            new Equipment([
                'name' => $request->name,
                'brand' => $request->brand,
                'model'=>$request->model,
                'depreciation'=>$request->depreciation,
                'serialNum'=>$request->serialNum,
                'mortgage'=>$request->mortgage
           ])
       );
 // $user->equipments()->fill($input)->save();
        return redirect('/equipments')
        ->with('success', 'You Have Updated the Equipments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
      return view('Assets.equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $input = $request->all();
        $equipment->fill($input)->save();
        return redirect('\equipments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
