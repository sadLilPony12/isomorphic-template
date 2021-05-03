<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Department;
use App\Models\Actor\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $department=Department::whereNull('deleted_at')
                                // ->whereSchoolId($request->school)
                                // ->limit(8)
                                ->orderBy('created_at', 'desc')
                                ->get();
        return response()->json($department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $department=Department::whereNull('deleted_at')
                                ->get();
        return response()->json($department);
    }
    public function look(Request $request)
        {
            $department=Department::find($request->department);
            if ($department->master_id === $request->user) {
                return 'master';
            }else if($department->head_id === $request->user){
                return 'head';
            }else{
                return 'adviser';
            }
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $dep=Department::create($request->all());
        return Response::json($dep);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking\Departmentx  $departmentx
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking\Departmentx  $departmentx
     * @return \Illuminate\Http\Response
     */
    public function edit(Departmentx $departmentx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking\Departmentx  $departmentx
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->update($request->all());
        if ($request->head_id) {
        $head=User::find($request->head_id);
        $head->update([
            'role_id'  =>'607eeb9da6730000f2006c9c'
        ]);
        }
        if($request->master_id){
        $master=User::find($request->master_id);
        $master->update([
            'role_id'  =>'607eeb9da6730000f2006c9d'
        ]);
        }
        return Response::json($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking\Departmentx  $departmentx
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departmentx $departmentx)
    {
        //
    }
}
