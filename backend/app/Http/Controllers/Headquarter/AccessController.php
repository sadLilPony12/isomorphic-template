<?php

namespace App\Http\Controllers\Headquarter;

use App\Models\Headquarter\Access;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index(Request $request)
        {
            $accesses=Access::whereNull('deleted_at')
                        ->get();
            return response()->json($accesses);
        }

   public function list(Request $request)
        {
            $accesses=Access::whereNull('deleted_at')->get();
            return response()->json($accesses);  
        }

    public function save(Request $request)
        {
            $access=Access::create ($request->all());
            return response()->json($access, 200);
        }

    public function update(Request $request, Access $access)
        {
            $access->update($request->all());
            return response()->json($access, 201);
        }
    public function destroy(Access $access)
        {
            $access->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $access->update();
            return response()->json(array('success'=>true));
        }
}
