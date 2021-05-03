<?php

namespace App\Http\Controllers\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
        {
            $sections=Section::whereNull('deleted_at')
                                // ->whereSchoolId($request->school)
                                ->get(); 
            return response()->json($sections);
        }

   public function list(Request $request)
        {
            $sections=Section::whereNull('deleted_at')
                                ->whereLevelId((int)$request->level)
                                ->get();
            return response()->json($sections);  
        }
    public function sections(Request $request)
        {
            $sections=Section::whereNull('deleted_at')
                                ->where('_id', 'like', $section)
                                ->get();
            return response()->json($sections);  
        }

    public function save(Request $request)
        {
            $id = Section::max('_id');
            $section=Section::create([
                '_id'       => $id+1,
                'level_id'  => $request->level_id,
                'school_id' => $request->school_id,
                'specialization' => $request->specialization_id,
                'major'  => $request->major,
                'accumulate' => $request->accumulate,
                'activity'  => $request->activity,
                'category'  => $request->category,
                'name'  => $request->name?$request->name:null,
                'status'     => $request->status
                ]);
            return response()->json($section, 200);
        }

    public function update(Request $request, $section)
        {
            $section=Section::where('_id','like',(int)$section)->first();
            $section->update($request->all());
            return response()->json($section, 201);
        }
    public function destroy($section)
        {
            $section=Section::where('_id','like',(int)$section)->first();
            $section->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $section->update();
            return response()->json(array('success'=>true));
        }
}
