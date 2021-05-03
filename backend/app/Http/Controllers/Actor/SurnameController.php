<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Surname;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurnameController extends Controller
{
    public function index()
        {
            $surnames = Surname::all();
            return $surnames;
        }

    public function save(Request $request)
        {
            $surname = new Surname();
            $surname->nextpk(); // auto-increment
            $surname->name = $request->name; 
            $surname->save();

            return $surname;
        }
    public function destroy(ModlesActorSurname $modlesActorSurname)
        {
            //
        }
    public function list()
        {
            $surnames=Surname::whereNull('deleted_at')->get();
            return response()->json($surnames);  
        }
}
