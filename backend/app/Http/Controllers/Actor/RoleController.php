<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Role;
use Illuminate\Http\Request;
use MongoDB\BSON\UTCDateTime;
use App\Http\Controllers\Controller;
use Responce;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * initCaps
     * allCaps
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            $roles=Role::whereNull('deleted_at')
                        ->Where('name', '!=', 'dev')
                        ->where(function ($q) use ($request){
                                if($request->key){
                                    $q->Where('name', 'like', "%{$request->key}%");
                                }
                            })
                        ->orderBy('name')
                        ->get();
            return response()->json($roles);
        }

   public function list(Request $request)
        {
            $pk=['dev','superadmin'];
            $roles=Role::whereNull('deleted_at')->WhereNotIn('name',  $pk)->get();
            return response()->json($roles);  
        }

    public function save(Request $request)
        {
            $role=Role::create ($request->all());
            return response()->json($role, 200);
        }

    public function update(Request $request, Role $role)
        {
            $role->update($request->all());
            return response()->json($role, 201);
        }
    public function destroy(Role $role)
        {
            $role->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $role->update();
            return response()->json(array('success'=>true));
        }
}
