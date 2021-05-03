<?php

namespace App\Models\Actor;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Classroom\Advisory;
use App\Models\Classroom\Accessload;
use App\Models\Actor\Surname;
use App\Models\Enrollment\Designation;
use Carbon\Carbon;
use App\Models\Actor\Department;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract {
    use Notifiable, HasFactory, HasApiTokens, AuthenticatableTrait;
    protected $connection = 'mongodb';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attachments',
        'department_id',
        'school_id',
        'role_id',
        'lrn',
        'ern',
        'profile',
        'address',
        'name',
        'fname',
        'mname_id',
        'lname_id',
        'suffix',
        'is_male',
        'contact',
        'dob',
        'pob',
        'email', 
        'email_verified_at',
        'password',
        'session_id',
        'platforms',
        'sessionArray',
        'section_id',
        'currentApp'
        ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob'          => 'date:M d, Y',
        'is_male'      => 'boolean',
        'sessionArray' => 'array',
        'has_image'    => 'boolean',
        'is_active'    => 'boolean',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        ];
    
    protected $appends = [
        'fullname',
        'rolename', 
        'roledisplayname',
        'schoolname',
        'gender',
        'age',
    ];

    public function getFullnameAttribute()
        {
            $fn=$this->fname.' '.  $this->lastname->name;
            if($this->mname_id !=Null or $this->mname_id !='')  {
                $stringExp = explode(' ', $this->middlename->name);
                $shortCode = '';
                for($i = 0; $i < count($stringExp); $i++):
                    $shortCode .= substr($stringExp[$i], 0, 1);
                endfor;

                $fn =$this->fname . ' ' . $shortCode  . '. ' . $this->lastname->name ;
            }
            return  strtoupper(trim($fn.' '. $this->suffix));
        }
    public function getAgeAttribute()
        {
            if ($this->dob) { return Carbon::parse($this->attributes['dob'])->age; };
        }
    public function getRolenameAttribute()
        { 
            if($this->role){
                return $this->role->name;
            }
        }
    public function getRoledisplaynameAttribute()
        { 
            if($this->role){
                return $this->role->display_name;
            }
        }
    public function getSchoolnameAttribute()
        {
            if($this->school){return $this->school->name;}
        }
    public function getGenderAttribute()
        { 
            return $this->is_male?'Male':'Female';
        }    
    // Relationship
    public function role(){return $this->belongsTo(Role::class);} 
    public function middlename(){return $this->belongsTo(Surname::class, 'mname_id');}
    public function lastname(){return $this->belongsTo(Surname::class, 'lname_id');}
    public function school(){return $this->belongsTo(School::class);}  
    public function loads(){return $this->hasMany(Load::class, 'prof_id');}    
    public function designation(){return $this->hasOne(Designation::class,'faculty_id');}       
    public function advisories(){return $this->hasMany(Advisories::class, 'student_id');}       
    public function registry(){return $this->hasMany(Registry::class, 'student_id');}   
}
