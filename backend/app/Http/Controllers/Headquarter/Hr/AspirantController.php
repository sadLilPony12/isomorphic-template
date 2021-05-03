<?php

namespace App\Http\Controllers\Headquarter\Hr;

use App\Models\Headquarter\Hr\Aspirant; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AspirantController extends Controller
{
    public function index(Request $request)
        {
            $aspirants=Aspirant::whereNull('deleted_at') 
                                ->whereStatus('ongoing')
                                ->whereSchoolId($request->school)
                                ->get();
            return response()->json($aspirants);
        }

   public function list(Request $request)
        {
            $aspirants=Aspirant::whereNull('deleted_at')->get();
            return response()->json($aspirants);  
        }

    public function save(Request $request)
        {
            $aspirant=Aspirant::create ($request->all());
            return response()->json($aspirant, 200);
        }

    public function update(Request $request, Aspirant $aspirant)
        {
            $aspirant->update($request->all());
            return response()->json($aspirant, 201);
        }
    public function destroy(Aspirant $aspirant)
        {
            $aspirant->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $aspirant->update();
            return response()->json(array('success'=>true));
        }
}
