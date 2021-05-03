<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Level;
use App\Models\Actor\Student;
use Illuminate\Http\Request;
use App\Models\Advisory;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Redirect,Response;
use Carbon\Carbon;
use MongoDB\BSON\UTCDateTime;

class LevelController extends Controller
{
    public function index()
        {
            $levels=Level::whereNull('deleted_at')
                        ->whereBatchId(\Request::get('batch'))
                        ->where( function ($q){
                            $q->where('course', 'like', '%'.\Request::get('key').'%')
                            ->orwhere('level', '==', \Request::get('key'))
                            ->orwhere('section', 'like', '%'.\Request::get('key').'%')
                            ->orwhere('yrlvl', '=', \Request::get('key'));
                        })
                        ->orderBy('level')
                        ->orderBy('section')
                        ->get();
            return Response::json($levels);
        }
    public function list(Request $request)
        {
            $levels=Level::whereNull('deleted_at')
                                 ->get();
            return Response::json($levels);
        }
    // public function list(Request $request)
    //     {
    //         $key = explode(',',$request->key);
    //         $levels=Level::whereNull('deleted_at')
    //                         ->whereIn('name', $key)
    //                         ->orderBy('id')
    //                         ->get();
    //         return response()->json($levels);  
    //     }
    public function year($id)
        {
        $levels=Level::selectRaw('major, level')
                            ->whereHas('batch', function($batch) use($id){
                                $batch->whereSchoolId('300789')->where('SY','=',$id);
                            })
                            ->groupBy('major')
                            ->groupBy('level')
                            ->get(); 
            return Response::json($levels);
        }

    public function sections(Request $request)
        {
            // return Session::get('enrollment');

            $levels=Level::whereHas('batch', function($batch) use($request){
                                $batch->whereSchoolId('300789')->where('SY','=',$request->batch);
                            })
                            ->where( function ($q) use($request){
                                if($request->level==='null'){
                                    $q->whereNull('level');
                                }else{
                                    $q->whereLevel($request->level);
                                }
                            })
                            ->get();
                            
            return Response::json($levels);
        }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {       
            $level=Level::updateOrCreate(['id' => $request->lid],[
                'batch_id'=>$request->batch_id,
                'major'=>$request->major,
                'level'    =>$request->level,
                'trackStrand'=>$request->trackStrand,
                'section'  =>$request->section,
                'course'   =>$request->course,
                'user_id'  =>$request->user_id,
            ]);
            $state = $level->wasRecentlyCreated?201:200;
            return response()->json($level, $state);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        {
            $user=Auth::user();
            $user->update([
                'level_id'=>$id
            ]);
            return view('actors.levels.index', compact('id')); 
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function find($id)
        {
            $level=Level::with('register')->find($id);
            // return Response::json($level); 
            return view('actors.levels.advisory', compact('level')); 
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Level $level)
    //     {
    //         $$level=Level::updateOrCreate(['id' => $request->id],[
    //             'enrollment_id'=>$request->enrollment_id,
    //             'user_id'  =>$request->user_id,
    //             'course'   =>$request->course,
    //             'level'    =>$request->level,
    //             'section'  =>$request->section,
    //             'students'=>$request->students,
    //             'major'=>$request->major,
    //             'trackStrand'=>$request->trackStrand,
    //             'enrollment_id'=>$request->enrollment_id,
    //         ]);
    //         $state = $level->wasRecentlyCreated?201:200;
    //         return response()->json($level, $state);
    //     }
    public function save(Request $request)
        {
            $id = Level::max('_id');
            $level=Level::create([
                '_id'       => $id+1,
                'name'  => $request->name,
                'stage' => $request->stage,
                'lvl' => $request->lvl,
                'description'     => $request->description
                ]);
            return response()->json($level, 200);
        }

   public function update(Request $request, $level)
        {
            $level=Level::where('_id','like',(int)$level)->first();
            $level->update($request->all());
            return response()->json($level, 201);
        }
    public function destroy( $level)
        {
            
            $level=Level::where('_id','like',(int)$level)->first();
            $level->deleted_at =new UTCDateTime(new \DateTime('now'));
            $level->update();
            return response()->json(array('success'=>true));
        }
    public function advisory(Level $level)
        {
            return view('Advisory', compact('level')); 
        }  
    public function rfid($id)
        {
            $level=Level::whereId($id)->with('User')->first();
            $advisory=Advisory::whereLevelId($level->id)
                                ->whereHas('student', function($student){
                                    $student->orderBy('is_male');
                                })
                                ->get();
            return view('levels.rfid', compact('advisory', 'level'));
        }
        
    public function schedules()
        {
            $sched = [
                        "8:30", "8:45", 
                        "9:00","9:15","9:30", "9:45", 
                        "10:00","10:15","10:30", "10:45", 
                        "11:00","11:15","11:30", "11:45", 
                        "1:00","1:15","1:30", "1:45", 
                        "2:00","2:15","2:30", "2:45", 
                        "3:00","3:15","3:30", "3:45", 
                        "4:00","4:15","4:30", "4:45"
                    ];
             
            $levels=Level::with('user')
                        ->whereBatchId(\Request::get('batch'))
                        ->whereNotNull('Students')
                        ->get();
            foreach($levels as $key=>$level){
                $level->setAttribute('time', $sched[$key]);
            }
            return Response::json($levels);
        }
}
