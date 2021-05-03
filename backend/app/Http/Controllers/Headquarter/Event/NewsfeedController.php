<?php

namespace App\Http\Controllers\Headquarter\Event;

use App\Models\Headquarter\Event\Newsfeed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class NewsfeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index(Request $request)
        {
            $newsfeeds=Newsfeed::whereNull('deleted_at')
                        ->whereBatchId($request->batch)
                        ->orderBy('created_at', 'desc')
                        ->get();
            return response()->json($newsfeeds);
        }

   public function list(Request $request)
        {
            $newsfeeds=Newsfeed::whereNull('deleted_at')->get();
            return response()->json($newsfeeds);  
        }

    public function save(Request $request)
        {
            $newsfeed=Newsfeed::create ($request->all());
            return response()->json($newsfeed, 200);
        }

    public function update(Request $request, Newsfeed $newsfeed)
        {
            $newsfeed->update($request->all());
            return response()->json($newsfeed, 201);
        }
    public function destroy(Newsfeed $newsfeed)
        {
            $newsfeed->deleted_at =new \MongoDB\BSON\UTCDateTime(new \DateTime('now'));
            $newsfeed->update();
            return response()->json(array('success'=>true));
        }
    public function upload(Request $request)
        {
            // return $request;

            $path=public_path("/storage/newsfeed/{$request->url}/{$request->email}");
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
    public function multiple(Request $request)
    {
        return $request;
    }
}
