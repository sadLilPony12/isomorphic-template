<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response, File;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $schools=School::all();
        return Response::json($schools);
    }
    
    public function save(Request $request)
    {
       $schools=School::create($request->all());
        return Response::json($schools);
    }
    
    public function store(Request $request)
    {
        $school=School::updateOrCreate(['id' => $request->sid],
        [
            'name'     => $request->name,
            'acronyms' => $request->acronym,
            'district' => $request->district,
            'division' => $request->division,
            'region'   => $request->region,
                ]); 
                $state = $school->wasRecentlyCreated?201:200;
                return response()->json($school, $state);
    }

    public function osave(Request $request)
        {
            try{
                $validator = Validator::make($request->all(), [
                    'code' => 'required|unique:schools',
                ]);

                if ($validator->fails()) {
                    return response([
                        'message' => 'ERROR 401:Something went wrong.'
                    ], 401);
                }else{
                   $school=School::create ($request->all());
                    return response()->json($school, 200);
                }
            } catch (Exception $exception){
                return response([
                    'message' => $exception->getMessage()
                ], 400);
            }
        
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
        {
            return response()->json($school);
        }
    public function list(Request $request)
        {
            $schools=School::whereNull('deleted_at')->get();
            return response()->json($schools);  
        }
    public function officer(Request $request)
        {
            $schools=School::whereNull('deleted_at')->find($request->school);
            return response()->json($schools);  
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function find(School $school)
    {
        return Response::json($school);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
        {
            // $school->update(['id' => $request->sid],
            // [
            //     'name'     => $request->name,
            //     'acronyms' => $request->acronym,
            //     'district' => $request->district,
            //     'division' => $request->division,
            //     'region'   => $request->region,
            //     ]);
                // $state = $school->wasRecentlyCreated?201:200;
                // return response()->json($school);
            $school->update($request->all());
            return response()->json($school, 201);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
        return response()->json(null, 204);
    }
    
    public function upload(Request $request, School $school)
        {
            $path=public_path("/storage/school/{$request->url}");
            if(!File::isDirectory($path)){ File::makeDirectory($path, 0777, true, true); }  
       
            $encoded_file=$request->file_base64;
            $pieces = explode(",", $encoded_file);
            // $datatype = explode("/", $pieces[0]);
            // $fileext = explode(";", $datatype[1]);
            $file = str_replace(' ', '+', $pieces[1]);
            $decode_file   = base64_decode($file);
            $filename = "{$request->name}.{$request->ext}";

            file_put_contents("{$path}/{$filename}", $decode_file);

            // $school->update([$request->name=> $filename]);

            return $filename;
        }
}
