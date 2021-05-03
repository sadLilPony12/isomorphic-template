<?php

namespace App\Http\Controllers\Headquarter\Academic;

use App\Models\Headquarter\Academic\Strand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StrandController extends Controller
{
     public function index(Request $request)
        {
            $stage=explode(',',$request->shs);
            $strands=Strand::whereNull('deleted_at')
                            ->whereIn('acronym', $stage)
                        ->get();
            return response()->json($strands);
        }

   public function list(Request $request)
        {
            $stage=explode(',',$request->shs);
            $strands=Strand::whereNull('deleted_at')
                                        ->whereNotIn('acronym', $stage)
                                        ->get();
            return response()->json($strands);  
        }

    public function save(Request $request)
        {
            $strand=Strand::create ($request->all());
            return response()->json($strand, 200);
        }

    public function update(Request $request, Strand $strand)
        {
            $strand->update($request->all());
            return response()->json($strand, 201);
        }
    public function destroy(Strand $strand)
        {
            $strand->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $strand->update();
            return response()->json(array('success'=>true));
        }
}
