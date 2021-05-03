<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\User;
use App\Models\Actor\Student;
use App\Models\Actor\level;
use App\Models\Classroom\Advisory;
use Illuminate\Http\Request;
use App\Http\Request\UserValidate;
use Auth, Session, Redirect, Response;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AdviserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $advisers=User::with('level')
                            ->whereRole(\Request::get('role'))
                            ->whereSchoolId(\Request::get('school'))
                            ->where(function($q) {
                                $q ->where('fname', 'like', '%'.\Request::get('key').'%')
                                ->orWhere('lname', 'like', '%'.\Request::get('key').'%');
                            })

                            ->get();
            return Response::json($advisers);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            //
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            return redirect('/advisers');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        {
            $students=Student::all();
            $section=Student::find($id)->level_id;
            return $student=Student::whereLevelId($section)->get();
            return response()->json($user);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {
            $user=User::find($id);
            $levels=Level::all();
            return response()->json($user);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
        {
            $user=User::find($id); 
            if($request->hasFile('avatar')){
                $image = $request->file('avatar');
                $filename = 'adviser/' . date('DdFY') . '/' .$request['first_name'].'.'.$image->getClientOriginalExtension();
                $image->move(public_path("/storage/adviser/" . date('DdFY'). '/'), $filename);

                $request->avatar = $filename;
            };
            $user->update([
                'level' => $request->level_id,
                'avatar'=> $request->avatar,
                'email' => $request->email,
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'ename' => $request->ename,
                'DOB'   => $request->DOB,
                'gender'=> $request->gender,
                'phone' => $request->phone
            ]);
            return response()->json($user);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
        {
            return redirect('/advisers');
        }
}
