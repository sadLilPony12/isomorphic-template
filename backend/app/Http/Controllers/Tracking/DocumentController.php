<?php

namespace App\Http\Controllers\Tracking;

use App\Models\Tracking\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
     public function index(Request $request)
        {            
            $key = explode(',',$request->status);
            $documents=Document::whereNull('deleted_at')
                        ->whereBatchId($request->batch)
                        ->where(function ($q) use ($request,$key){
                            if ($request->rolename==='principal') {
                                $q->whereIn('status',$key);  
                            }elseif($request->user){
                                $q->whereUserId($request->user);
                            }else{
                                $q->whereDepartmentId($request->department)
                                    ->whereIn('status',$key);  
                            }
                        })
                        ->get();
            return response()->json($documents);
        }

   public function list(Request $request)
        {
            $documents=Document::whereNull('deleted_at')->get();
            return response()->json($documents);  
        }
    public function modules(Request $request)
        {
            $documents=Document::whereUserId($request->user)->whereStatus('noted')->whereNotNull('deadline_at')->get();
            return response()->json($documents);  
        }
    public function save(Request $request)
        {
            $document=Document::create ($request->all());
            return response()->json($document, 200);
        }

    public function update(Request $request, Document $document)
        {
            $document->update($request->all());
            return response()->json($document, 201);
        }
    public function destroy(Document $document)
        {
            $document->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $document->update();
            return response()->json(array('success'=>true));
        }
}
