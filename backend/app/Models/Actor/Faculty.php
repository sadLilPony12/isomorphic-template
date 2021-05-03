<?php

namespace App\Models\Actor;

use App\Models\Actor\Surname;
// use App\Models\Classroom\Accessload;
use App\Models\Classroom\Classroom;
use App\Models\Enrollment\Load;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'users';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '_id',
        'department_id',
        'school_id',
        'role_id',
        'classroom_id',
        'phone',
        'image_ext',
        'password',
        'stages',
        ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob'          => 'date:M d, Y',
        'is_male'      => 'boolean',
        'sessionArray' => 'array',
        'has_image'    => 'boolean',
        'is_active'    => 'boolean'
        ];
    protected $hidden = [
        'password',
        'remember_token',
        ];

    protected $appends = [
        'fullname',
        'rolename',
        'roledisplayname',
        'appointed',
        'activeload',
        'subjects',
        'age',
        'handel',
    ];
    public function getAgeAttribute()
        {
            if ($this->dob) { return Carbon::parse($this->attributes['dob'])->age; };
        }
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
    public function getAppointedAttribute()
        {
            foreach ($this->designations as $designation) {
                if($designation->active === 'ongoing'){
                    return $designation;
                }
            }
        }
    public function getActiveloadAttribute()
        {
            foreach ($this->loads as $load) {
                if($load->active === 'ongoing'){
                    return $load;
                }
            }
        }
    public function getDepartmentNameAttribute()
        {
            if($this->department){
                return "{$this->department->acronym} Department";
            }
        }
    
    public function getSubjectsAttribute()
        {
            if($this->accessloads){return $this->accessloads->subjects;}
        }
   
     public function getHandelAttribute()
        {
            if ($this->department) {
                if ($this->department->master_id===$this->_id) {
                   return 'master';
                }elseif($this->department->head_id===$this->_id){
                    return 'head';
                }
                elseif($this->role_id==='6028f7713e320000f40026c0') {
                    return 'principal';
                }else {
                    return 'faculty';
                }
            }
            return null;
        }  
    // Relationship
    public function role(){return $this->belongsTo(Role::class);} 
    public function middlename(){return $this->belongsTo(Surname::class, 'mname_id');}
    public function lastname(){return $this->belongsTo(Surname::class, 'lname_id');}
    public function school(){return $this->belongsTo(School::class);}  
    public function designations(){return $this->hasMany(Classroom::class,'faculty_id');} // per school year
    public function loads(){return $this->hasMany(Load::class, 'prof_id');}  
    // public function accessloads(){return $this->hasOne(Accessload::class, 'prof_id');}
    public function department(){return $this->belongsTo(Department::class);}
    
}
