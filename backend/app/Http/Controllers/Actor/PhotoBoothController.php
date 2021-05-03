<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Student;
use App\Models\Actor\Level;
use App\Models\Advisory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhotoBoothExport;

class PhotoBoothController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            // return $request;
            $students=Advisory::whereLevelId( $request->key)
                            ->whereHas('student', function($student) use($request){
                                $student->whereIsMale($request->gender);
                            })
                            ->where(function($q) use($request){
                                if($request->status != 'all'){
                                    $q->whereHasImage($request->status);
                                }
                            })
                            ->with('guardian')
                            ->with('student')
                            ->get();

            return Response::json($students);
        }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
        {
            $level = Level::with('user')
                    ->with('register')
                    ->whereBatchId($request->batch)
                    ->orderBy('level')
                    ->orderBy('section')
                    ->get();
            return $level;
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {   
            $entry = Advisory::find($request->serving_id);
            $yrSection=!$entry->level->level?$entry->level->major:$entry->level->major.'-'.$entry->level->level;
            $path="/storage/images/" . $request->acronyms . "/Batch_". $request->syBatch . "/rough/".$yrSection.'/'.$entry->level->section.'/';

            if(!File::isDirectory(public_path($path))){
                File::makeDirectory(public_path($path), 0777, true, true);
            }

            if($request->hasFile('std_photo')){
                $image = $request->file('std_photo');
                $filename = $entry->fullname.'.'.$image->getClientOriginalExtension();
                $image->move(public_path($path), $filename);
              
                $entry->has_image=true;
                $entry->save();
                return Response::json('Successfully save');
            }elseif($request['mydata']){
                $encoded_file = $request['mydata'];
                $filename = $entry->fullname.'.jpg';

                $image = str_replace('data:image/png;base64,', '', $encoded_file);
                $image = str_replace(' ', '+', $image);
                \Image::make($encoded_file)->save(\public_path($path).$filename);

                $entry->has_image=true;
                $entry->save();
                return Response::json('Successfully save it...');
            };

            return Response::json('No image attached!!');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
        {
            //
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
        {
            //
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
        {
            
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
        {
            //
        }
    public function export($id)
        { 
            $booth= new PhotoBoothExport($id);
            return Excel::download($booth, 'Schedule info.xlsx');
        }
}
