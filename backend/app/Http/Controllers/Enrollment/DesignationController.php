<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Classroom\Classroom;
use App\Models\Actor\Faculty;
use App\Models\Enrollment\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
     public function index(Request $request)
        {
            $designations=Designation::whereNull('deleted_at')
                                        // ->whereSchoolId($request->school)
                                        ->get();
            return response()->json($designations);
        }

   public function list(Request $request)
        {
            $designations=Designation::whereNull('deleted_at')->get();
            return response()->json($designations);  
        }
 public function updateOrCreate(Request $request)
        {       
            $designation=Designation::updateOrCreate(['faculty_id' => $request->faculty_id],
                $request->all()
            );
            $state = $designation->wasRecentlyCreated?201:200;
            return response()->json($designation, $state);
        }
    public function save(Request $request)
        { 
            $designation=Designation::create ($request->all());
            return response()->json($designation, 200);
        }

    public function update(Request $request, Designation $designation)
        {
            $designation->update($request->all());
            return response()->json($designation, 201);
        }
    public function destroy(Designation $designation)
        {
            $designation->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $designation->update();
            return response()->json(array('success'=>true));
        }
   
    
}
