<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\BSON\UTCDateTime;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $rooms= Room::whereNull('deleted_at')->get();
            return response()->json($rooms);              
        }
    public function find(Request $request, $school)
        {
            $rooms= Room::whereNull('deleted_at')
                                ->whereSchoolId($school)
                                ->whereLevelId((int)$request->level)
                                ->first();
            if($rooms){return response()->json($rooms); }
            return null;              
        }
    public function list(Request $school)
        {
            $rooms=Room::whereNull('deleted_at')
                            ->whereSchoolId($school)
                            ->orderBy('level_id')
                            ->get();
            return response()->json($rooms);  
        }
    public function levels(Request $request) 
        {
            $levels=Room::whereNull('deleted_at')
                            ->with('level')
                            ->whereSchoolId($request->school)
                            ->orderBy('level_id')
                            ->get();
            return response()->json($levels);  
        }
    public function save(Request $request)
        {
            $id = Room::max('_id');
            $room=Room::create([
                '_id'       => $id+1,
                'level_id'  => $request->level_id,
                'school_id' => $request->school_id,
                'slots'     => $request->slots
                ]);
            return response()->json($room, 200);
        }

   public function update(Request $request, $room)
        {
            $room=Room::where('_id','like',(int)$room)->first();
            $room->update($request->all());
            return response()->json($room, 201);
        }
    public function destroy($room)
        {
            $room=Room::where('_id','like',(int)$room)->first();
            $room->deleted_at =new UTCDateTime(new \DateTime('now'));
            $room->update();
            return response()->json(array('success'=>true));
        }
}
