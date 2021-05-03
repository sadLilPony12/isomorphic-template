<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Enrollment\Application;
use App\Models\Headquarter\Batch;
use App\Models\Actor\Student;
use App\Models\Actor\File201;
use App\Models\Actor\Pds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actor\User;
use File;
use App\Models\Admission\Admission;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            $applications=Application::whereNull('deleted_at')
                        ->whereStudentId($request->student)
                        ->whereNotIn('status', ['denied', 'approved'])
                        ->where(function ($q) use ($request){
                                if($request->key){
                                    $q->where('name', 'like', "%{$request->key}%")
                                    ->orWhere('display_name', 'like', "%{$request->key}%");
                                }
                        })                                
                        ->orderBy('name', 'asc')
                        ->limit(12)
                        ->get();

            return response()->json($applications);
        }
    public function admission(Request $request)
        {
            $applications=Application::whereNull('deleted_at')
                            ->whereSchoolId($request->school)
                            ->where(function($q) use($request){
                                if($request->status==='submitted'){
                                    $q->whereStatus('submitted');
                                }else{
                                    $q->whereNotIn('status', ['submitted']);
                                }
                            })
                            ->WhereHas('student', function ($student) use ($request){
                                if($request->key){
                                    $student->where('fname', 'like', "%{$request->key}%")
                                    ->orWhereHas('lastname', function ($lastname) use ($request){
                                        $lastname->where('name', 'like', "%{$request->key}%");
                                    });
                                }
                            })   
                            ->orderBy('created_at', 'desc')                             
                            ->orderBy('name', 'asc')
                            ->limit(12)
                            ->get();
            return response()->json($applications);  
        }

    public function takers(Request $request)
        {
            $applications=Application::whereNull('deleted_at')
                            ->whereSchoolId($request->school)
                            ->whereStatus($request->status)
                            ->WhereHas('student', function ($student) use ($request){
                                if($request->key){
                                    $student->where('fname', 'like', "%{$request->key}%")
                                    ->orWhereHas('lastname', function ($lastname) use ($request){
                                        $lastname->where('name', 'like', "%{$request->key}%");
                                    });
                                }
                            })   
                            ->orderBy('created_at', 'desc')                             
                            ->orderBy('name', 'asc')
                            ->limit(12)
                            ->get();
            return response()->json($applications);  
        }

    public function student(Request $request)
        {
            $applications=Application::whereNull('deleted_at')
                        ->whereStudentId($request->student)                            
                        ->get();
            return response()->json($applications);
        }

    public function list(Request $request)
        {
            $applications=Application::whereNull('deleted_at')->get();
            return response()->json($applications);  
        }

    public function find($user)
        {
            $application=Application::whereNull('deleted_at')        
                        -> with('batch')
                        -> whereStudentId($user)
                        -> latest()
                        -> first();
            return response()->json($application, 200);
        }
    public function save(Request $request)
        {
            $application=Application::create($request->all());
            
            $file201=File201::firstOrCreate(
                ['user_id'=>$request->student_id],
                [
                    'user_id'=>$request->student_id,
                    'children'=>$request->children,
                    'husband'=>$request->husband,
                ]
                );
            $pds=Pds::firstOrCreate(
                ['user_id'=>$request->student_id],
                [
                    'user_id'=>$request->student_id,
                    'details'=>$request->details,
                    'parents'=>$request->parents,
                ]
                );
            return response()->json($application, 200);
        }

    public function update(Request $request, Application $application)
        {
            // $application->update([
            //     'recomendation'=>$request->recomendation,
            //     'issues' => $request->issue,
            //     'status' => $request->status
            // ]);
            if ($request->status==='halt') {
              $admission=Admission::create($request->all());
            }elseif ($request->score) {
                $admission=Admission::find($request->student_id);
                 $admission->update([
                'status'=> 'Passed'
            ]);
            }
            $application->update($request->all());
            return response()->json($application, 201);
        }
    public function destroy(Request $request, Application $application)
        {
            $application->update([
                'issue' => $request->issue,
                'status'=> 'denied'
            ]);
            return response()->json(array('success'=>true));
        }

    public function upload(Request $request, User $user)
        {
            $path=public_path("/storage/{$request->url}");
            if(!File::isDirectory($path)){ File::makeDirectory($path, 0777, true, true); }  
       
            $encoded_file=$request->file_base64;
            $pieces = explode(",", $encoded_file);
            // $datatype = explode("/", $pieces[0]);
            // $fileext = explode(";", $datatype[1]);
            $file = str_replace(' ', '+', $pieces[1]);
            $decode_file   = base64_decode($file);
            $filename = "{$request->name}.{$request->ext}";

            file_put_contents("{$path}/{$filename}", $decode_file);

            // $user->update(["fileExt"=>$fileext[0]]);

            return $filename;
        }
}
