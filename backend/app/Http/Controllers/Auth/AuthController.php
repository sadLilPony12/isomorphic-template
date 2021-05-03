<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Actor\User;
use App\Models\Actor\Surname;
use Auth,File,Response,stdClass;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\ObjectID;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
        {     
            try{
                if(Auth::attempt(['email' => $request->email, 'password' =>$request->password ]) ||
                Auth::attempt(['contact' => $request->email, 'password' =>$request->password ]) ||
                Auth::attempt(['lrn' => $request->email, 'password' =>$request->password ]) ||
                Auth::attempt(['ern' => $request->email, 'password' =>$request->password ])){
                    /** @var User $user */
                    $user = Auth::user();
                    $token = $user->createToken('my-app-token')->plainTextToken;

                    return response([
                        'message' => 'success',
                        'token' => $token,
                        'user' => $user
                    ], 200);
                }
            }catch(\Exception $exception){
                return response([                    
                    'message' => $exception->getMessage()
                ], 400);
            }

            return response([
                'message' => 'Invalid Email/Password'
            ], 401);
        }
    public function csrf(Request $request)
        {
            $user = User::where('email', $request->email)->first();
                if ($user) {
                    return response([
                        'message' => 'success',
                        'token' => $token,
                        'user' => $user
                    ], 200);
                }
        }
    public function user()
        {
            return Auth::user();
        }

    public function register(Request $request)
        {
            $mname_id=$this->surnameConverter(strtoupper($request->mname));
            $lname_id=$this->surnameConverter(strtoupper($request->lname));
            $user = User::create([
                'attachments' => $request->attachments,
                'role_id' => $request->role_id,
                'profile' => $request->profile,
                'address' => $request->address,
                'fname'   => $request->fname,
                'mname_id' => $mname_id,
                'lname_id' => $lname_id,
                'contact'   => $request->contact,
                'suffix'  => $request->suffix,
                'is_male' => $request->is_male,
                'dob'     => $request->dob,
                'ern'     => $request->ern,
                'lrn'       => $request->lrn,
                'email'   => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return response()->json(['status' => 'success', 'user' => $user],  200);
        }
    // public function exist(Request $request){
    //     $contact='This mobile number is already used.';
    //     $email='E-mail address is already taken!';
    //     $lrn='Oops, this lrn has already been registered.';
    //     $ern='Oops, this ern has already been registered.';
    //     // $user=new stdClass();
    //     $user = User::where(function ($taken) use ($request){
    //                             $taken->where('email',$request->email)
    //                                     // ->orWhere('email', $request->email)
    //                                     // ->orWhere('lrn',$request->lrn)
    //                                     // ->orWhere('ern', $request->ern);
                                        
    //             })->first();
    //             return $user;
    //               if (!empty($user)) {
    //                 //   return($user->count());
    //             // return response(["sdf"=>$user]);
    //             return response([
    //                     'message' => $request->contact?$contact:($request->ern?$ern:($request->email?$email:($request->lrn?$lrn:false)))
    //                 ], 401);
    //             }
    //         }
    
    public function exist(Request $request)
        {
            if($request->email){
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    return response([
                        'message' => 'E-mail address is already taken!'
                    ], 401);
                }
            }else if ($request->contact) {
                $user = User::where('contact', $request->contact)->first();
                if ($user) {
                    return response([
                        'message' => 'This mobile number is already used.'
                    ], 401);
                }
            }else if($request->lrn){
                $user = User::where('lrn', $request->lrn)->first();
                if ($user) {
                    return response([
                        'message' => 'Oops, this code has already been registered.'
                    ], 401);
                }
            }else if($request->ern){
                $user = User::where('ern', $request->ern)->first();
                if ($user) {
                    return response([
                        'message' => 'Oops, this code has already been registered.'
                    ], 401);
                }
            }
            
        }
    public function surnameConverter($surname)
        {
             $id = Surname::max('_id');
             $surname=Surname::firstOrCreate(
                ['name' => $surname ],
               [
                'name' => $surname,
                '_id'   =>  $id+1
               ]
               );
               return  $surname->_id;
        }
    public function upload(Request $request)
        {
            $path=public_path("/storage/{$request->url}");
            if(!File::isDirectory($path)){ File::makeDirectory($path, 0777, true, true); }         
            $encoded_file=$request->file_base64;
            $pieces = explode(",", $encoded_file);
            $file = str_replace(' ', '+', $pieces[1]);
            $decode_file   = base64_decode($file);
            file_put_contents("{$path}/{$request->name}", $decode_file);
            return $request->name;
        } 
}
