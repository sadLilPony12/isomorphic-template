<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\User;
use App\Models\Actor\Guardian;
use App\Models\Actor\level;
use App\Models\Actor\School;
use App\Models\Actor\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\http\Requests\UserValidate;
use Auth;
use Redirect,Response;
use Carbon\Carbon;
use File;

use App\Http\Controllers\Controller;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            $users = User::whereNull('deleted_at')
                            ->where('role_id','!=','6028f7713e320000f40026bd')
                            // ->whereSchoolId($request->school)
                            // ->whereNotNull('position')
                            ->where(function ($q) use ($request){
                                if($request->key){
                                    $q->Where('fname', 'like', "%{$request->key}%");
                                }
                            })
                            ->whereHas('lastname', function ($lastname) use ($request){
                                if($request->lname){
                                    $lastname->Where('name', 'like', "%{$request->lname}%");
                                }
                            })
                            ->get();
            return response()->json($users);
        }

    public function promotion(Request $request)
        {
            $users = User::whereNull('deleted_at')
                            ->whereNotIn('role_id',['6028f7713e320000f40026be','6028f7713e320000f40026bd'])
                            ->get();
            return response()->json($users);
        }        

    public function superadmin(Request $request)
        {
            $users = User::whereNull('deleted_at')
                            ->whereRoleId('6028f7713e320000f40026be')
                            ->get();
            return response()->json($users);
        }        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            $levels=Level::all();
            return Response::json($user, $levels);
        }
    public function list(Request $request)
        {
            $users=User::whereNull('deleted_at')
                        ->whereNull('role_id')
                        ->get();
            return response()->json($users);  
        }

    public function department(Request $request)
        {
            $users=User::whereNull('deleted_at')
                        ->where('position','like',"%{$request->position}%")
                        ->get();
            return response()->json($users);  
        }

    public function faculty(Request $request)
        {
            $users=Faculty::whereNull('deleted_at')
                        // ->whereSchoolId($request->school)
                        ->whereRoleId('6028f7713e320000f40026c1')
                        ->get();
            return response()->json($users);  
        }
    public function designation(Request $request)
        {
            $users=User::whereNull('deleted_at')
                        ->whereRoleId('6028f7713e320000f40026c1')
                        ->whereDoesntHave('designation')
                        ->get();
            return response()->json($users);  
        }
    public function staff(Request $request)
        {
            $users=User::whereNull('deleted_at')
                        ->whereSchoolId($request->school)
                        ->whereRoleId('6028f7713e320000f40026c2')
                        ->get();
            return response()->json($users);  
        }
    public function representative(Request $request)
        {
            $users=User::whereNull('deleted_at')
                        ->whereRoleId('6028f7713e320000f40026c0')
                        ->get();
            return response()->json($users);  
        }
    public function save(Request $request)
        {
            $users=User::find($request->user_id);
            $users->update([
                'role_id' =>'6028f7713e320000f40026be',
                'school_id' =>'60264978b22e00009a006436'
            ]);
            return response()->json($users, 201);
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserValidate $validate)
        {
            if($request->hasFile('avatar')){
                $image = $request->file('avatar');
                $filename = 'voter/' . date('DdFY') . '/' .$request['first_name'].'.'.$image->getClientOriginalExtension();
                $image->move(public_path("/storage/voter/" . date('DdFY'). '/'), $filename);

                $request->avatar = $filename;
            };

           $user=User::create([
                'level' => $request->level_id,
                'avatar' => $request->avatar,
                'email' => $request->email,
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'DOB' => $request->DOB,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            return Response::json($user);
        }

    public function photobooth(Request $request)
        {   
            $entry = User::find($request->serving_id);
            $gender = $entry->is_male?'/MALE/':'/FEMALE/';
            $path=public_path("/storage/images/" . $request->acronyms . "/Staff/".date('DYFd') .$gender);

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($request->hasFile('std_photo')){
                $image = $request->file('std_photo');
                $filename = $entry->fullname.'.'.$image->getClientOriginalExtension();
                $image->move($path, $filename);
              
                $entry->has_image=date('DYFd');
                $entry->save();
                return Response::json('Successfully save');
            }elseif($request['mydata']){
                $encoded_file = $request['mydata'];
                $filename = $entry->fullname.'.jpg';

                $image = str_replace('data:image/png;base64,', '', $encoded_file);
                $image = str_replace(' ', '+', $image);
                \Image::make($encoded_file)->save($path.$filename);

                $entry->has_image=date('DYFd');
                $entry->save();
                return Response::json('Successfully save it...');
            };

            return Response::json('No image attached!!');
        }
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
        {
            return Response::json($user);
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
            return Response::json(array('user'=>$user, 'levels'=>$levels));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
        {
            // return $user;
            if($request->hasFile('avatar')){
                $image = $request->file('avatar');
                $filename = 'voter/' . date('DdFY') . '/' .$request['fname'].'.'.$image->getClientOriginalExtension();
                $image->move(public_path("/storage/voter/" . date('DdFY'). '/'), $filename);

                $request->avatar = $filename;
            };

            // $user->update([
            //  'currentApp'   => $request->currentApp,
            //      'level'   => $request->level_id,
            //      'avatar'  => $request->avatar,
            //      'email'   => $request->email,
            //      'fname'   => $request->fname,
            //      'mname'   => $request->mname,
            //      'lname'   => $request->lname,
            //      'DOB'     => $request->DOB,
            //      'is_male' => $request->gender,
            //      'phone'   => $request->phone,
            //  ]);

            $user->update($request->all());
            return Response::json($user);        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
        {
            $user->delete();
            return response()->json(null, 204);
        }

    public function changePassword(Request $request)
        {
            $this->validate($request, [
                'current' => 'required',
                'password' => 'required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required'
            ]);

            $user = Auth::user();

            if (!Hash::check($request->current, $user->password)) {
                return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
            }

            $user->password = Hash::make($request->password);
            $user->save();

        // User role
        $role = Auth::user()->role;
        }
    public function resetPassword($id)
        {
            $user = User::find($id);
            $user->update(["password" => Hash::make('password')]);
            return redirect()->back()->with('msg', 'Succesfully Change');
        }
  
    public function register()
        {
            $school=School::all();
            return view('auth.register', compact('school'));
        }
    public function visit(Request $request){
            $user=User::find($request->id);
            $user->update([
                    'school_id'=>$request->school
                ]);
            $user->save();
            $school=School::find($request->school);
            return Response::json($school);
        }
    public function import(Request $request)
        {
            $datas = Excel::toCollection(new UserImport(), $request->file('import_file'));
            //    return $datas;
            $count=0;
            $users=null;
            foreach($datas[0] as $key =>$data){
                if(is_numeric($data[0]) && !is_Null($data[3])){
                    // Get the value
                    $users[$count]['role']      = $data[1];
                    $users[$count]['empNum']    = $data[2];
                    $users[$count]['fname']     = $data[3];
                    $users[$count]['mname']     = rtrim($data[4],'.');
                    $users[$count]['lname']     = $data[5];
                    $users[$count]['suffix']    = $data[6];
                    $users[$count]['major']     = $data[7];
                    $users[$count]['course']    = $data[8];
                    $users[$count]['year']      = $data[9];
                    $users[$count]['section']   = $data[10];
                    $users[$count]['trackStrand'] = $data[11];
                    $users[$count]['is_male']   = strtoupper($data[12]);
                    $users[$count]['ePhone']    = $this->phone_viewning( $data[13]);
                    $users[$count]['email']    = $data[14];
                    
                    try{
                        if(is_numeric($data[15])){
                            $dob=\Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($data[15]));
                        }else{
                            $dob=Carbon::createFromFormat('m-d-Y', $data[15]);
                        }
                    } 
                    catch(\Exception $e){
                        $dob=$this->StringDate($data[15]);
                    }  

                    $users[$count]['DOB']       = $dob;
                    $users[$count]['address']   = $data[16];
                    // Contact person
                    if(!$data[17]){
                        $users[$count]['CP']['last']   = null;
                        $users[$count]['CP']['given']  = null;
                        $users[$count]['CP']['suffix'] = null;
                        $users[$count]['CP']['middle'] = null;
                    }else{
                        $cp = $this->fullname_spliter($data[17]);
                        $users[$count]['CP']['last']   = $cp[0];
                        $users[$count]['CP']['given']  = $cp[1];
                        $users[$count]['CP']['suffix'] = $cp[2];
                        $users[$count]['CP']['middle'] = rtrim($cp[3],'.');
                    }
                    $users[$count]['relationship']= strtoupper($data[18]);
                    $users[$count]['rPhone']    = $this->phone_viewning($data[19]);

                    $rules = array('empNum' => 'unique:users,empNum');
                    $validator = Validator::make($users[$count], $rules);
                    $users[$count]['validate-empNum']=  $validator->fails();
                    $count ++;
                } 
            }
            //  return $users;
            return view('users.import', compact('users'));
        }

    public function massStore(Request $request)
        { 
        // return $request;
            foreach($request->data as $key =>$detail){
                $guardian=is_null($detail['Guardian']['last'])?null:$this->store_guardian($detail['Guardian']);
                $user=$this->store_user($detail, $request->school, $guardian);
                if($user->role==="Adviser"){ $this->store_Level($detail['level'], $user->id, $request->batch); }
            }
        return redirect()->route('users');
        }
    public function store_guardian($guardian)
        {
            $guardianArray=array("FATHER","BROTHER","UNCLE","GRANDFATHER");
            $address = explode(',', trim($guardian['address'])); 
            if( array_key_exists($guardian['relationship'], $guardianArray)){
                $is_male =1;
            }
            else{
                $is_male =0;
            }
            $guardian=Guardian::updateOrCreate([
                'lname' => $guardian['last'],
                'fname' =>$guardian['given'],
                'suffix' => $guardian['suffix'],
                'mname' => $guardian['middle'],                  
                'province' => $address[2]
            ],
            [
                'lname'    => $guardian['last'],
                'fname'    => $guardian['given'],
                'suffix'   => $guardian['suffix'],
                'mname'    => $guardian['middle'],
                'is_male'=> $is_male, 
                'relationship' => $guardian['relationship'],
                'phone'    => $this->phone_cleaning($guardian['phone']),
                'brgy'     => $address[0],
                'muni'     => $address[1],
                'province' => $address[2]
            ]);
            return $guardian->fresh();
        }
    public function store_user($user, $school, $guardian)
        {
            $is_male = $user['is_male']==='MALE'?1:0;
            $guardian=!$guardian?null:$guardian->id;
            $users=User::updateOrCreate(
                    [
                        'email'     => $user['email'],
                        'empNum'    => $user['empNum'],
                        'fname'     => $user['fname'],
                        'school_id' => $school
                    ],
                    [
                        'school_id'=> $school,
                        'email'    => $user['email'],
                        'role'     => $user['role'],
                        'empNum'   => $user['empNum'],
                        'fname'    => $user['fname'],
                        'mname'    => $user['mname'],
                        'lname'    => $user['lname'],
                        'suffix'   => $user['suffix'],
                        'phone'    => $this->phone_cleaning($user['ePhone']),
                        'DOB'      => $user['DOB'],
                        'is_male'  => $is_male,
                        'password' => Hash::make('password'),
                        'guardian_id' => $guardian,
                    ]
            );
            return $users->fresh();
        }
    public function store_Level($level, $user, $batch)
        {
            $level=Level::updateOrCreate(
                [
                    'major'   => $level['major'],
                    'level'   => $level['level'],
                    'section' => $level['section']
                ],
                [
                    'major'        => $level['major'],
                    'level'        => $level['level'],
                    'section'      => $level['section'], 
                    'course'       => $level['course'],
                    'trackStrand'  => $level['trackStrand'],
                    'user_id'      => $user,
                    'batch_id'     => $batch
                ]
            );
            return $level->fresh();
        }
    public function fullname_spliter($fullname)
        {
            $fn=explode(',', trim($fullname));
            $fn[0]=trim($fn[0]);
            switch  (count($fn)){
                case 4:
                    $fn=$this->cleaning_Name($fullname);
                    break;
                case 3: // Pajarillaga, Tomas, Jr. || Pajarillaga, Thomas Emmanuel, R. || Pajarillaga, Thomas Emmanuel III, R.
                    if(!$this->is_Suffix($fn[2])){
                        $fn[3]=$fn[2];
                        $fn[2]=null;
                    }
                    break;
                case 2: // Pajarillaga, Tomas || Pajarillaga, Thomas Emmanuel R. || Pajarillaga, Thomas Emmanuel III
                    $fn[2]= null;
                    $fn[3]= null;
                    $fn[1]=trim($fn[1]);
                    $name=explode(' ', $fn[1]);
                    //one name
                    if(count($name)===1){  
                        $fn[1]= trim($fn[1]);
                     }else if(substr($fn[1], -1)==='.'){
                        $fn[1]=rtrim($fn[1],'.');
                        $name=explode(' ', trim($fn[1])); //new
                        $fn[1]= null;
                        $test= array_pop($name);
                        $is_suffix = $this->is_Suffix($test);
                        if($is_suffix){
                            $fn[2]=$test;
                        }else{
                            $fn[3]=$test;
                        }
                        foreach ($name as $value){
                            $fn[1].=trim($value).' ';
                        }
                    }else{
                        $test= array_pop($name);
                        $is_suffix = $this->is_Suffix($test);
                        if($is_suffix){
                            $fn[2]=$test;
                        }else
                            $is_ln = $this->is_LastName($test);
                            $is_mn = $this->is_MiddleName($test);
                            if($is_ln){ $fn[3]= $test; }
                            if($is_mn){ $fn[3]= $test; }
            
                            if(!$is_ln || !$is_mn){
                                if(count($name)===3){
                                    $test=array_pop($name).' '.$test;
                                    $is_ln = $this->is_LastName($test);
                                    $is_mn = $this->is_MiddleName($test);
                                    // if($is_ln){ $fn[3]= $test; }
                                    // if($is_mn){ $fn[3]= $test; }
                                    //return to name
                                    // if(!$is_ln || !$is_mn){ array_push($test, $name); }
                            }
                        }
                    }
                    break;
                case 1: //Thomas B. Pajarillaga Jr
                    $fn= $this->standard_name_spliter($fullname);
            }   
            return $fn;

            // $fn=explode(',', trim($fullname));
            // if(count($fn)===3){
            //     if(!$this->is_Suffix($fn[2])){
            //         $fn[3]=$fn[2];
            //         $fn[2]=null;
            //     }
            // }else if(count($fn)===2){
            //     $name=explode(' ', trim($fn[1]));
            //     if(count($name)===1){
            //         $fn[2]=null;
            //         $fn[3]= null;
            //     }else{
            //         $x['mname'] = last($name);
            //         if($this->is_Suffix($x['mname'])){
            //             $fn[1] = null;
            //             $fn[2] = array_pop($name);
            //             $fn[3] = null;
            //             foreach ($name as $value){
            //                 $fn[1].=$value.' ';
            //             }
            //         }
            //         else if($this->is_LastName($x['mname'])){
            //             //Found on Last name
            //             $fn[1] = null;
            //             $fn[2] = null;
            //             $fn[3] = array_pop($name);
                        
            //             foreach ($name as $value){
            //                 $fn[1].= $value.' ';
            //             }
            //         }else if($this->is_MiddleName($x['mname'])){
            //             //Found on Middle name
            //             $fn[1] = null;
            //             $fn[2] = null;
            //             $fn[3] = array_pop($name);
            //             foreach ($name as $value){
            //                 $fn[1].=$value.' ';
            //             }   
            //         }else{
            //             $fn[1] = null;
            //             $fn[2] = null;
            //             $fn[3] = null;
            //             foreach ($name as $value){
            //                 $fn[1].=$value.' ';
            //             }   
            //         }
            //     }  
            // }
            // $fn[0]= trim($fn[0]);
            // $fn[1]= trim($fn[1]);
            // $fn[2]= trim($fn[2]);
            // $fn[3]= trim($fn[3]);
            // return $fn;
        }
    public function cleaning_Name($fullname)
        {
            $fn=explode(',', trim($fullname));
            $fn[0] = trim($fn[0]);
            $fn[1] = trim($fn[1]);
            $fn[2] = trim($fn[2]);
            $fn[2] = rtrim($fn[2],'.');
            $is_suffix=$this->is_Suffix($fn[2]);
            if($is_suffix){
                $fn[3] = trim($fn[3]);
                $fn[3] = rtrim($fn[3],'.');
            }else{
                $fn[3]=$fn[2];
                $fn[2]=null;
            }
            return $fn;
        }
    public function standard_name_spliter($fullname) //Thomas Emmanuel B. Pajarillaga Jr.
        {
            $fn=explode('.', trim($fullname));
            if(count($fn)===2){
                $fn[2]= null;  //suffix
                $fn[3]= null;  //middlename
                if(substr($fn[1], -1)==='.'){
                    $fn[1]=rtrim($fn[1],'.');
                    $name=explode(' ', trim($fn[1])); //new
                    $fn[1]= null;
                    $test= array_pop($name);
                    $is_suffix = $this->is_Suffix($test);
                    if($is_suffix){
                        $fn[2]=$test;
                    }else{
                        $fn[3]=$test;
                    }
                    foreach ($name as $value){
                        $fn[1].=trim($value).' ';
                    }
                } 
            }

    
            return $fn;
        }
    public function is_LastName($middlename)
        {
            $x['mname'] = $middlename;
            $rules = array('mname'=> 'unique:students,lname');
            $validator = Validator::make($x, $rules);
            if($validator->fails()){
                return true;  
            }else{
                return false;
            }
        }
    public function is_MiddleName($middlename)
        {
            $x['mname'] = $middlename;
            $rules = array('mname'=> 'unique:students,mname');
            $validator = Validator::make($x, $rules);
            if($validator->fails()){
                return true;  
            }else{
                return false;
            }
        }
    public function is_Suffix($suffix)
        {
            $suffixArray=array("SR","Sr.","JR","Jr","Jr.","III", "IV", "V", "VI");
            if(array_key_exists(trim($suffix), $suffixArray)){
                    return true;
            }else{
                return false;
            }
        }

    public function imageTransfer(Request $request)
        {   

            if ($file = $request->file('file')) {
                //set filename
               $filename = $request['fullname'] . '.' . $file->getClientOriginalExtension();
               //set folder path
               $path = 'app/public/images/bicos/staff/rough/';
               //move image to folder path(first parameter) and rename the file (second parameter)
               $file->move(storage_path($path), $filename);
            }
           
        }
    
     
}
