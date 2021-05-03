<?php

namespace App\Http\Controllers\Headquarter\Academic;

use App\Models\Headquarter\Academic\Specialization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecializationController extends Controller
{
   public function index(Request $request)
        {
            $stage=explode(',',$request->jhs);
            $specializations=Specialization::whereNull('deleted_at')
                            ->whereIn('acronym', $stage)
                        ->get();
            return response()->json($specializations);
        }

   public function list(Request $request)
        {
            $stage=explode(',',$request->jhs); 
            $specializations=Specialization::whereNull('deleted_at')
                                        ->whereNotIn('acronym', $stage) 
                                        ->get();
            return response()->json($specializations);  
        }
    public function find(Request $request,$specialization)
        {
            $Specialization=Specialization::whereNull('deleted_at')->whereSchoolId($specialization);
            return response()->json($Specialization, 200);
        }

    public function save(Request $request)
        {
            $Specialization=Specialization::create ($request->all());
            return response()->json($Specialization, 200);
        }

    public function update(Request $request, Specialization $Specialization)
        {
            $Specialization->update($request->all());
            return response()->json($Specialization, 201);
        }
    public function destroy(Specialization $Specialization)
        {
            $Specialization->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $Specialization->update();
            return response()->json(array('success'=>true));
        }
}
