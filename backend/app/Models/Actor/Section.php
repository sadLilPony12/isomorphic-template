<?php

namespace App\Models\Actor;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;
use App\Models\Actor\School;
use App\Models\Actor\Student;
use App\Models\Actor\Level;
use App\Models\Actor\Batch;
use App\Models\Classroom\Advisory;
use MongoDB\BSON\ObjectId;
use App\Models\Headquarter\Academic\Specialization;

class Section extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;

    protected $fillable = [
        '_id',
        'user_id',
        'level_id',
        'school_id',
        'specialization_id',
        'name',
        'studentsArr',
        'trackStrand',
        'accumulate',
        'category',
        'status',
        'major',
        'activity',
      ];

    protected $casts = [
        'accumulate' => 'integer',
        ];

    protected $appends = [
        'fullname',
        // 'yr_level',
        // 'registered',
        'num_of_students',
        'adviser',
        'status',
    ];

    public function getNumOfStudentsAttribute()
        {
            if ($this->studentsArr) {
                $student = $this->studentsArr;
            return '(' .count($student). '/' .$this->accumulate. ')';
            }
        }
    public function getFullnameAttribute()
        {
            $level=Level::where('_id','like',(int)$this->level_id)->first();
            if ($level) {
            return $level->fullname. '-' .$this->name.' '.$this->num_of_students;            
            }
            return null;
        }
    public function getRegisteredAttribute()
        {
            return $this->register()->count();
        }
    public function getAdviserAttribute()
        {
            $adviser=$this->user?$this->user->fullname:null;
            return $adviser;
        }
    public function getStatusAttribute(){
        if($this->num_of_students > $this->accumulate){
            return "Over Populated";
        }else if($this->num_of_students < $this->accumulate){
            return "Open";
        }else{
            return "Closed";
        }
    }
    // Relationship
    public function user(){return $this->belongsTo(User::class);}
    public function level(){return $this->belongsTo(Level::class);}
    public function student(){return $this->belongsTo(Student::class);}
    public function batch(){return $this->belongsTo(Batch::class);}
    public function register(){return $this->hasMany(Advisory::class);}
    public function registry(){return $this->hasMany(Registry::class);}
    // public function specialization(){return $this->belongsTo(Specialization::class,'specialization_id');}
}
